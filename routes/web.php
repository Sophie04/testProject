<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Models\Post;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', function(){
// 	return view('home', [
// 		'posts'=>App\Models\Post::latest('updated_at')->get()
// 	]);	
// });

Route::group(['middleware' => 'auth'], function(){
	Route::get('/profile', 'App\Http\Controllers\ShowProfile@viewProfile')->name('profile');

	Route::get('/posts', 'App\Http\Controllers\PostsController@showAll')->name('posts');
	Route::post('/posts', 'App\Http\Controllers\PostsController@store');
	Route::get('/posts/create', 'App\Http\Controllers\PostsController@create');
	Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');
	Route::get('/posts/{post}/edit', 'App\Http\Controllers\PostsController@edit');
	Route::get('/posts/{post}/delete', 'App\Http\Controllers\PostsController@destroy');
	Route::post('/posts/{post}', 'App\Http\Controllers\PostsController@update');

	Route::get('/posts/{post}/comments', 'App\Http\Controllers\CommentsController@showAll');
	Route::post('/posts/{post}/comments', 'App\Http\Controllers\CommentsController@store');
	Route::get('/posts/{post}/comments/create', 'App\Http\Controllers\CommentsController@create');
	Route::get('/posts/{post}/comments/{comment}/edit', 'App\Http\Controllers\CommentsController@edit');
	Route::get('/posts/{post}/comments/{comment}/delete', 'App\Http\Controllers\CommentsController@destroy');
	// Route::post('/posts/{post}/comments', 'App\Http\Controllers\CommentsController@update');
	
});