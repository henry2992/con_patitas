<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class QrtagController extends Controller
{
    //
    public function __constructor(){

    	$this->middleware('auth:admin');
    }

    public function viewFrom($page=1,$order="id-asc",$searchedData=""){

    	if($searchedData==""){
	    	$orders=explode("-", $order);
	        $data = Tag::orderBy($orders[0],$orders[1])->skip(($page-1)*5)->take(5)->get();
	        $total_page = ceil(Tag::all()->count()/5);
	    }else{
	    	$data=$searchedData;
	    	$total_page = ceil(count($data)/5);
	    }
	        $pageCount = count($data);
   
    	return view('admin/qrtag/view',array('data'=>$data,'page'=>$page,'pageCount'=>$pageCount,'totalPage'=>$total_page,'order'=>$order));
    }

    public function generation(Request $request) {

    	$count = $request->get('count');

		switch ($count) {
			case '500':
				$count = 500;
				break;
			case '1500':
				$count = 1500;
				break;
			case '5000':
				$count = 5000;
				break;	
			default:
				$count = 0;
				break;
		}

		if($count == 0){
			return response(['status'=>'error']);
		}

		for($i=0;$i<$count;$i++){ 
			$randomTag = strtoupper(str_random(6));
			$insert[]=array('tag'=>$randomTag);
		}

		$result = Tag::insert($insert);

		if($result){
			return response(['status'=>'success' ]);
		}
    	return response(['status'=>'error']);
    }

    public function delete(Request $request,$id){

    	$result = Tag::where('tag',$id)->delete();

		return redirect(url('admin/qrtag/view/1/id-asc'));
    	
    }

    public function search(Request $request,$keyword){

    	$result = Tag::where("tag" ,'Like','%'.$keyword.'%')->get();
    	$request->session()->flash('tag_keyword', $keyword);
    	
    	return $this->viewFrom(1,'id-asc',$result);
    }
}
