<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Routing\Controller as BaseController;
class PostController extends BaseController
{
    public function index(){
        return view('latihan/post', [
        "title" => "post",
        "posts"=> post::all()
        //post::all() adalah model yang memanggil method/fungsi all()
    ]);
    }

    public function show($slug){
        return view('latihan/post_single', [
            "title"=>"single post",
            "post"=> post::find($slug)
            //post::find($slug) adalah sebuah model yang mengambil method/fungsi find dgn parameter $slug find($slug)
          ]);
    }
}
