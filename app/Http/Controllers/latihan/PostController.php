<?php

namespace App\Http\Controllers\latihan;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\post2;
use Illuminate\Routing\Controller as BaseController;
class PostController extends BaseController
{
    public function index(){
        return view('latihan/post', [
        "title" => "post",
        "posts"=> post2::all()
        //post::all() adalah model yang memanggil method/fungsi all()
    ]);
    }
        //dengan cara manual atau data harus di query dahulu untuk mencari data yang sesuai

    // public function show($slug){
    //     return view('latihan/post_single', [
    //         "title"=>"single post",
    //         "post"=> post2::find($slug)
    //         //post::find($slug) adalah sebuah model yang mengambil method/fungsi find dgn parameter $slug find($slug)
    //       ]);
    // }

    //Dengan cara Route model binding
    public function show(post2 $post){
                        //Models , variabel yang dikirim
        return view('latihan/post_single', [
            "title"=>"single post",
            "post"=> $post
            //post::find($slug) adalah sebuah model yang mengambil method/fungsi find dgn parameter $slug find($slug)
          ]);
    }
}
