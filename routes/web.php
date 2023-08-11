<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//simple routes link
Route::get('/', function () {
    return view('welcome');
});

//Routes with group controller 
Route::controller(UserController::class)->group(function(){
    Route::get('/','home');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::get('/supervisor','supervisor')->middleware('auth');
});


//Routes with group middleware 
Route::middleware('admin')->group(function(){
    Route::get('admin/post/create',[AdminController::class,'create']);
    Route::post('admin/store',[AdminController::class,'store']);
});



//simple routes with send array
Route::get('post', function () {
    return view('welcome',[
        'post' => 'Arjhen'
    ]);
});


//simple routes with wildcard
Route::get('post/{wildcard}', function ($wildcard) {
    return view('welcome',[
        'post' => 'Arjhen'
    ]);
});


//Routes with connect to controller
Route::get('/get/{wildcard}', [UserController::class, 'index']);


//Routes with connect to controller
Route::get('/get/{wildcard}', [UserController::class, 'index']);


//Routes with if you don't want to find using id 
Route::get('/posts/{name:name}',function(User $name){
    return view('index');
});

//Routes with send data
Route::get('/posts',function(){
    $posts = Post::all();
    return view('home',['posts' => $posts]);
});

// if you want to return back
return back();

// if you want to redirect in other link
return redirect('/other link');

// if you want to send message
return view('/otherlink')->with('message','Created Successfully');

