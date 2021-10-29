<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;


Route::group(['middleware' => 'auth'], function(){
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::resource('comments', CommentController::class);

    Route::group([
        'middleware' => 'isAdmin',
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function (){
        Route::resource('posts', AdminPostController::class);
    });
});

Route::resource('posts', PostController::class)->only(['index', 'show']);

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/email', function(){
//    Mail::to('utemuratov.yerik@gmail.com')->send(new WelcomeMail());
//    return new WelcomeMail();
//});
//
//Route::resource('posts', PostController::class);
//
//Route::resource('categories', CategoryController::class);
//
//Route::resource('comments', CommentController::class)->middleware('auth');
//

Route::get('/', function(){
   return redirect()->route('posts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
