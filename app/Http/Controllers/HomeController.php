<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function __construct()
    {

    }

    public function showBlogs(Request $request ,$page)
    {
        $data = Blog::orderBy('id',"DESC")->skip(($page-1)*5)->take(5)->get();
        $pageCount = count($data);
        $total_page = ceil(Blog::all()->count()/5);
       
        return view('news.view',array('data'=>$data,'page'=>$page,'pageCount'=>$pageCount,'totalPage'=>$total_page));
    }
}
