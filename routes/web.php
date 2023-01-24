<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\student\student;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\latihan\PostController;
use App\Models\groupstudent;
use App\Models\kategori;
use App\Http\Controllers\student\Group;
use App\Http\Controllers\student\schedule;
use App\Http\Controllers\student\User;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //Students
    Route::controller(student::class)->group( function(){
    Route::get('/student/index','index');
    Route::post('student/Create','create');
    Route::get('/student/edit/{id}','edit');
    Route::post('/Update','update');
    Route::post('/student/remove/','delete');
    Route::get('/student/add','add');
    });
   
// user
    Route::get('/user', [User::class,'index']);
    Route::get('/user/add',function(){
        return view('student.useradd',['group'=>groupstudent::all()]);
    });
//group
    Route::get('/group',[Group::class,'index']);
    Route::get('/group/{id}',[Group::class,'group']);
  // schedule
    Route::get('/schedule',[schedule::class,'index']);

    // login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  
});

require __DIR__.'/auth.php';

Route::get('/post', [PostController::class,'index']);

//Denga route model binding
Route::get('/post/{post:slug}', [PostController::class,'show']);
Route::get('/category/{category:slug}', function(kategori $category){
    return view('/latihan/category', [
        'category'=>$category->name,
        'posts'=>$category->post,
        'title'=>$category->name
    ]); 
});