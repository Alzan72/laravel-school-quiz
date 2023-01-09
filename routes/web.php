<?php


use App\Models\post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabelController;
use App\Http\Controllers\latihan\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// default menggunakan enclosure
Route::get('/', function () {
    return view('latihan/index', [
        "title" => "Beranda"
    ]);
});

Route::get('/pendaftaran', function () {
    return view('latihan/pendaftaran', [
        "title" => "Pendaftaran"
    ]);
});

Route::get('/kontak', function () {
    return view('latihan/kontak', [
        "title" => "Kontak" 
    ]);
});

//menggunakan controler
Route::get('/post', [PostController::class,'index']);
Route::get('/post/{slug}', [PostController::class,'show']);
                        //nama controller, fungsi/method
Route::get('/latihan/tabel', [TabelController::class, 'index']);
