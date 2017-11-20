<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ShopController extends Controller
{
    //
    public function __constructor(){

    	$this->middleware('auth:admin');
    }

    public function view($page=1,$order="id-asc",$searchedData=""){

    	if($searchedData==""){
	    	$orders=explode("-", $order);
	        $data = Product::orderBy($orders[0],$orders[1])->skip(($page-1)*5)->take(5)->get();
	        $total_page = ceil(Product::all()->count()/5);
	    }else{
	    	$data=$searchedData;
	    	$total_page = ceil(count($data)/5);
	    }
	        $pageCount = count($data);
   
    	return view('admin/shop/view',array('data'=>$data,'page'=>$page,'pageCount'=>$pageCount,'totalPage'=>$total_page,'order'=>$order));
    }

   public function add(Request $request){

   		$name=$request->name;
      $description = $request->description;
   		$price = $request->price;
   		$type = $request->type;
   		$image = $request->images;
   		$uniqueKey = str_random(10);
   		$insertData = array('name'=>$name,'images'=>$image,'unique_key'=>$uniqueKey,'price'=>$price,'type'=>$type,'descriptions'=>$description);
   		$result = Product::create($insertData);

   		if($result){
   			return response()->json(array('status'=>'success'));
   		}
   			return response()->json(array('status'=>'error'));
   }

   public function delete(Request $request,$id){

   	$result=Product::where('id',$id)->delete();

   	return redirect()->back();
   }

    public function search(Request $request,$keyword){

    	$result = Product::where("name" ,'Like','%'.$keyword.'%')->orWhere("price" ,'Like',$keyword)->get();
    	$request->session()->flash('keyword', $keyword);
    	return $this->view(1,'id-asc',$result);
    }
}
