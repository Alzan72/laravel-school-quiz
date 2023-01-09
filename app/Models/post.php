<?php
//default
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class post extends Model
// {
//     use HasFactory;
// }
namespace App\Models;

class post 
{
   private static $blog_post=[
        [
            "title"=>"Post pertama",
            "slug"=>"post-pertama",
            "author" => "Fulan",
            "body"=>"
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi laborum modi reiciendis distinctio tempore sint, blanditiis adipisci, officia aperiam ea ullam qui atque possimus totam consequuntur quia magnam sapiente vel.
            "
        ],
        [
            "title"=>"Post kedua",
            "slug"=>"post-kedua",
            "author" => "Fulanah",
            "body"=>"
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quod velit laudantium nihil! Dicta totam iusto minima. Exercitationem rem molestias autem voluptate deserunt excepturi repudiandae dolore, inventore quas tempore, veniam itaque assumenda corporis sapiente dicta beatae magnam libero quaerat quibusdam!
            "
        ],
        ];

        public static function all(){
            return collect(self::$blog_post);
            //return self::$blog_post; tanpa collect, collect adalah fungsi untuk merubah array agar bisa dipanggil banyak fungsi lain
        }
        
        public static function find($slug){
        $posts= self::all();
   
        // $post=[];
        // foreach ($posts as $content) {
        //     if ($content["slug"]===$slug) {
        //         $post=$content;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
        // ->firstWhere adalah salah satu fungsi untuk mencari data pertama yang ditemukan dengan syarat ('slug', $slug); yaitu slug yang sama
        }
}



