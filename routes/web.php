<?php

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

Route::get('/', function() { 
	return redirect()->route('posts.index'); 
});

Route::resource('/posts', 'PostController');
Route::resource('/categories', 'CategoryController');

Route::get('/posts/{id}/comments', 'CommentController@getPostComments')->name('get.post.comments');
Route::post('/posts/{id}/comments', 'CommentController@savePostComment')->name('save.post.comment');

Route::get('/categories/{id}/comments', 'CommentController@getCategory')->name('get.category.comments');
Route::post('/categories/{id}/comments', 'CommentController@postCategory')->name('save.category.comment');

Route::get('/{type}/{id}/comments', 'CommentController@getComments');
Route::post('/{type}/{id}/comments', 'CommentController@postComment');
