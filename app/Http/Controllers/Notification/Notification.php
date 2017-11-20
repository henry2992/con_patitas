<?php

namespace App\Http\Controllers\Notification;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Notification extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function showNotification($id){

        $update = Message::where('id',$id)->update(['is_view'=>1]);

        $notification = Message::where('id',$id)->first();

        return view('notification.detail_view',array('data'=>$notification));
    }

    public function listNotification(Request $request , $page=1){

        $data = DB::table('location_messages')->where('user_id',Auth::user()->id)->orderBy('id',"DESC")->skip(($page-1)*5)->take(5)->get();
        $pageCount = count($data);
        $total_page = ceil(DB::table('location_messages')->where('user_id',Auth::user()->id)->get()->count()/5);
        return view('notification.view_notification',array('data'=>$data,'page'=>$page,'pageCount'=>$pageCount,'totalPage'=>$total_page));
    }

    public function deleteNotification(Request $request){

        $id = $request->get('id');

        $result = Message::where('id',$id)->delete();

        if($result){
            return response()->json('success');
        }else{
            return response()->json('fail');
        }
    }


}
