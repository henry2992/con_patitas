<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    //

    public function __constructor(){

    	$this->middleware('auth:web');
    }

    public function show($type,$page=1,$order="id-asc",$searchedData=""){

    	//check if the user's membership is upgraded.

//    	if(!Auth::guard('web')->check()){
//    		return redirect(url('login'));
//    	}

//    	$userLevel = Auth::user()->membership;

    	//if($userLevel !=1){
    	//	return redirect(url('cart/account'));
    	//}
    	// define action type to show to client.

    	if($searchedData==""){
    	
	    	$orders=explode("-", $order);
	        $data = Product::orderBy($orders[0],$orders[1])->skip(($page-1)*20)->take(20)->get();
	        $total_page = ceil(Product::all()->count()/20);
	    }else{
	    	$data=$searchedData;
	    	$total_page = ceil(count($data)/20);
	    }
	        $pageCount = count($data);
   
    	return view('shop/view',array('data'=>$data,'page'=>$page,'pageCount'=>$pageCount,'totalPage'=>$total_page,'order'=>$order));
    }

    public function search(Request $request,$type){

           //put the search code here.
    }

    public function detail(Request $request,$id){

    	$product = Product::find($id);
        $data = $product;
        $product->is_view += 1;
        $product->save();

    	return view('shop/detail',array('data'=>$data));
    }

    public function markup(Request $request){

        $unique_key = $request->unique_key;

        $result = Product::where('unique_key',$unique_key)->first();
        $result->mark_up += 1;
        $result->save();

        return response(['status'=>'success']);
    }


}
