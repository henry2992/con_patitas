<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function savePost(Request $request){

        $text = $request->get('text');
        $user_id = Auth::user()->id;
        $avatar = $request->get('avatarPath');


        $validate = $this->validator($request->all());
        if($validate->passes()){
            $data = [
                'user_id' => $user_id,
                'text' =>$text,
                'avatar' => $avatar
            ];
            $result = Blog::create($data);

            return redirect()->back()->with('status','Posted successfully ! Thank you.');
        }
            return redirect()->back()->withInput($request->all())->withErrors($validate);
    }

    public function validator($data){

        return Validator::make($data,[

            'text' =>'required|string|min:50'
        ]);
    }
}
