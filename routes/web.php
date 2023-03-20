<?php

use Inertia\Inertia;
use App\Models\kategori;
use App\Models\groupstudent;
use App\Http\Controllers\article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\student\User;
use Illuminate\Foundation\Application;
use App\Http\Controllers\student\student;
use App\Http\Controllers\student\schedule;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\latihan\PostController;
use App\Http\Controllers\student\GroupController;
use App\Http\Controllers\student\LessonController;
use App\Http\Controllers\student\AbsensiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\student\student_quiz;

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

Route::get('/dashboard', [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','admin'])->group(function () {
    //Students
    Route::controller(student::class)->group( function(){
    Route::get('/student/index','index');
    Route::post('student/Create','create');
    Route::get('/student/edit/{id}','edit');
    Route::post('/Update','update');
    Route::post('/student/remove/','delete');
    Route::get('/student/add','add');
    // Add USer
    Route::post('/user/new','adduser');
    });
    Route::get('/user', [User::class,'index']);
    Route::get('/user/edit/{edit}', [User::class,'edit']);
    Route::get('/user/add',function(){
        return view('student.useradd',['group'=>groupstudent::all()]);
    });
    Route::controller(GroupController::class)->group(function(){
    Route::get('/group','index');
    Route::get('/group/delete/{delete}','delete');
    Route::get('/group/add','add');
    Route::get('/group/edit/{edit}','edit');
    Route::post('/group/create','create');
    Route::post('/group/update','update');
    Route::post('/group/add_member','add_member');
    Route::get('/group/{id}','group');
    Route::get('/group/quiz/{group}','quiz');
    });
    // Route::get('/group/tambah',[GroupController::class,'index']);

  Route::controller(schedule::class)->group(function(){
    Route::get('/schedule','index');
    Route::get('/schedule/add','add');
    Route::get('/schedule/edit/{edit}','edit');
    Route::get('/schedule/delete/{del}','delete');
    Route::post('/schedule/create','create');
    Route::post('/schedule/update','update');
  });
Route::resource('presence',AbsensiController::class)->except(['show','edit']);
Route::get('/presence/lesson/{absensi:schedule_id}',[AbsensiController::class,'lesson']);
Route::get('/presence/edit/{absensi}',[AbsensiController::class,'Edit']);
Route::resource('lesson',LessonController::class)->except(['destroy']);
Route::post('/lesson/delete',[LessonController::class,'delete']);
//  article
Route::controller(article::class)->group( function(){
    Route::get('/article/index','index');
    Route::post('article/create','create');
    Route::get('/article/edit/{id}','edit');
    Route::post('/article/update','update');
    Route::get('/article/remove/{delete}','delete');
    Route::get('/article/add','add');
    });

    // exam
Route::resource('topic/topic', 'App\\Http\Controllers\topic\TopicController');
Route::resource('exam/exam', 'App\Http\Controllers\exam\ExamController');
Route::resource('quiz/quiz', 'App\Http\Controllers\student\QuizController');
Route::get('/quiz/test/{group}', ['App\Http\Controllers\student\QuizController','quiztest']);
Route::get('/exam/score/{exam}','App\Http\Controllers\exam\ExamController@score');
// Route::get('/quiz/{group}/start/{id}', ['App\Http\Controllers\student\QuizController','quizstart']);
// Route::post('/quiz/reply',['App\Http\Controllers\student\QuizController','reply']);
    // login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','student'])->group(function(){
    Route::get('/dashboard/student',[student_quiz::class,'index']);
    Route::get('/student/exam',[student_quiz::class,'exam']);
    Route::get('/exam/{id}/prepare',[student_quiz::class,'prepare']);
    Route::post('/token/check',[student_quiz::class,'token']);
    Route::get('/quiz/{group}/{topic}/start/{id}', [student_quiz::class,'quizstart']);
    Route::post('/quiz/reply',[student_quiz::class,'reply']);
});

Route::get('/survey', [App\Http\Controllers\SurveyController::class,'index']);
Route::post('/surveys', [App\Http\Controllers\SurveyController::class,'insert']);



require __DIR__.'/auth.php';

Route::get('/post', [PostController::class,'index']);

//Dengan route model binding
Route::get('/post/{post:slug}', [PostController::class,'show']);
Route::get('/category/{category:slug}', function(kategori $category){
    return view('/latihan/category', [
        'category'=>$category->name,
        'posts'=>$category->post,
        'title'=>$category->name
    ]);
});
