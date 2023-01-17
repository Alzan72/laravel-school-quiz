<?php


use App\Models\post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabelController;
use App\Http\Controllers\latihan\PostController;
use App\Http\Controllers\latihan\Siswa;
use App\Http\Controllers\student\student;
use Illuminate\Routing\Route as RoutingRoute;

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

//Denga route model binding
Route::get('/post/{post:slug}', [PostController::class,'show']);

//Cara manual
// Route::get('/post/{slug}', [PostController::class,'show']);
                        //nama controller, fungsi/method

Route::get('/latihan/tabel', [TabelController::class, 'index']);

// Siswa
Route::get('/siswa/siswa', [Siswa::class, 'index']);
Route::get('/siswa/edit/{id}', [Siswa::class, 'edit']);
Route::post('/siswa/EditAction/{post}', [Siswa::class, 'update']);
Route::get('/siswa/create', [Siswa::class, 'create']);
Route::post('/siswa/CreateAction', [Siswa::class, 'input']);
Route::get('/siswa/delete/{id}',[Siswa::class, 'delete']);

// Student
Route::get('student/index',[student::class,'index']);
Route::get('student/add',function(){
    return view('student/insert');
});
Route::post('student/Create',[student::class,'create']);
Route::get('/student/edit/{id}', [student::class,'edit']);
Route::post('/Update', [student::class,'update']);
Route::get('/student/remove/{delete}', [student::class,'delete']);


