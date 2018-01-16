<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prices;
use App\Order;
use App\Product;
use App\User;
use App\Tag;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    //
    public function __constructor()
    {
        $this->middleware('auth');
    }

    private $price;
    private $type;

    public function upgradeAccount(Request $request)
    {

        $quantity = 1;
        $productName = 'Upgrade Account to Premium.';
        $price = 10;
        $msg = "You must upgrade to premium to buy QR tags first.";
        $data = $request->session()->get('item_' . Auth::user()->id);
        // $price = Prices::where('category',$category)->first()->price;
        $data[] = array('quantity' => $quantity, 'productName' => $productName, 'price' => $price, 'unique_key' => 'membership', 'image' => '#');
        $request->session()->put('item_' . Auth::user()->id, $data);

        return view('cart.view', array('warning' => $msg));
    }

    public function get()
    {

        $data = Product::all();

        return $data;
    }

    public function view()
    {

        return view('cart.view');
    }

    public function add(Request $request)
    {

        if (!Auth::guard('web')->check()) {
            return redirect(url('login'));
        }

        $product = $request->product;
        $count = $request->product_count;
        $db = Product::where('unique_key', $product)->first();
        $productName = $db->name;
        $price = $db->price;

        $price = 1.99;

        $image = $db->images;
        $unique_key = $db->unique_key;
        $data = $request->session()->get('item_' . Auth::user()->id);
        $subtotal = 0;
        $total = 0;
        if ($data != null) {
            foreach ($data as $key => $item) {
                if ($item['unique_key'] == $unique_key) {
                    return redirect()->back()->with('status', 'You have already ordered this product.');
                } else {
                    $subtotal = $count * $price;
                    $total = $total + $item['total'];

                }
            }
        } else {
            $subtotal = $count * $price;
            $total = $total + $subtotal;

        }

        $data[] = array('quantity' => $count, 'productName' => $productName, 'price' => $price, 'image' => $image, 'count' => $count, 'unique_key' => $unique_key, 'total' => $total, 'subtotal' => $subtotal);
        $request->session()->put('item_' . Auth::user()->id, $data);

        return redirect(url('cart/view'));
        // return view('cart.view',array('data' =>$data));
    }

    public function delete(Request $request)
    {

        $unique_key = $request->get('key');
        //get all session data/cart data
        $data = session('item_' . Auth::user()->id);

        foreach ($data as $key => $item) {
            if ($item['unique_key'] == $unique_key) {

                array_splice($data, $key, 1);

            }
        }
        $request->session()->put('item_' . Auth::user()->id, $data);
        // $request->session()->forget('item_'.Auth::user()->id);
        // session()->forget('item_'.Auth::user()->id);

        return redirect(url('cart/view'));

    }

    public function checkout(Request $request)
    {

        //define products' information.
        //confirmation to deliver to payment gateway.
        //


        $result = false;
        $datas = $request->get('product');
        $subtotal_amount = $request->get('subtotal_amount');
        $total_amount = $request->get('total_amount');
        $product_count = $request->get('product_count');
        $product_price = $request->get('product_price');
        $tags = array();
        $price = 1.99;
        $session_total = 0;
        $interval = "month";

        //Campos de xchange.ec
        $pay_user = $request->get('pay_user');
        $commerce = $request->get('commerce');
        $secret_key = $request->get('secret_key');
        $amount = $request->get('total_amount');
        
        foreach (session('item_' . Auth::user()->id) as $key => $item) {

            $session_total = $item['subtotal'] + $session_total;

        }
   // check session value is matched with passed value.
   
        if ($session_total != $total_amount) {
            return redirect()->route('product-client-view', ['type' => 'tag', 'page' => 1, 'order' => 'id-asc'])->with('status', 'Something Went wrong. Please check information');
        } 
        
        
        
        $key = 0;
        foreach ($datas as $item) {


            //  if($item == 'membership') {
            // integrate with payment gateway
            //  	$membership = User::where('id',Auth::user()->id)->update(array('membership'=>'1'));

            //   	if($membership){
            // send mail
            //    	  $data['email'] = Auth::user()->email;
            //    	  $data['firstname']= Auth::user()->firstname;
            //    	  $data['lastname'] = Auth::user()->lastname;
            //    	  Mail::send("mail.membership",$data, function($message) use($data){
            //                  $message->to($data['email']);
            //                  $message->subject("UPGRADE PREMIUM");

            //          });
            //          $result=true;
            //    	}
            //    } else {


            $product = Product::where('unique_key', $item)->first();

            $insertData = array(
                "product_id" => $product->id,
                "user_id" => Auth::user()->id,
                "count" => $product_count[$key],
                "price" => $price
            );

            $order = Order::create($insertData);
            if ($order) {
                $result = true;
                //$tag = Tag::where('is_ordered','0')->first();

                $tags[] = array(
                    "productName" => $product->name,
                    "subtotal" => $subtotal_amount[$key],
                    "count" => $product_count[$key],
                    "price" => $product_price[$key]
                );

                //$tags[] = array(
                //	"productName"=>$product->name,
                //	"tag"=>$tag->tag
                //);
                //Tag::where('tag',$tag->tag)->update(array('is_ordered'=>'1'));
            }
            //   }
            $key = $key + 1;
        }
        
       		        $data['products'] = $tags;
       		        $data['total'] = $total_amount;
           		$data['email'] = Auth::user()->email;
           		$data['firstname'] = Auth::user()->firstname;
           		$data['lastname'] = Auth::user()->lastname;
           		// send email
           		Mail::send("mail.product", $data, function ($message) use ($data) {
                    $message->to($data['email']);
                    $message->subject("Order Detail");

                });
                        
        if ($result) {

            //send email to admin
            $dataAdmim['admin'] = "soporte@conpatitas.com";
            $dataAdmim['email'] = Auth::user()->email;
            $dataAdmim['products'] = $tags;
            $dataAdmim['total'] = $total_amount;
            Mail::send("mail.sendToAdminForOrder", $dataAdmim, function ($message) use ($dataAdmim) {
                $message->to($dataAdmim['admin']);
                $message->subject("Hay un nuevo pedido.");

            });
            $request->session()->forget('item_' . Auth::user()->id);
            return redirect("https://paybox.xchange.ec/recurrent.php?api=".$secret_key."&account=".$commerce."&user=".$pay_user."&amount=".$amount."&interval=".$interval);
        } else {
            return redirect()->route('product-client-view', ['type' => 'tag', 'page' => 1, 'order' => 'id-asc'])->with('error', 'Algo salió mal.');
        }

    }
}
