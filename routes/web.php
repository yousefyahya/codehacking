<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
} // Solves "count(): Parameter must be an array or an object that implements Countable"

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::auth();


Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);


Route::group(['middleware'=>'admin'], function () {

    Route::get('/admin', function () {
        return view('admin.index');
    });


    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'edit' => 'admin.users.edit',
        'store' => 'admin.users.store'
    ]]);


    Route::resource('/admin/posts', 'AdminPostsController', ['names'=>[
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'edit' => 'admin.posts.edit',
        'store' => 'admin.posts.store'
    ]]);


    Route::resource('/admin/categories', 'AdminCategoriesController', ['names'=>[
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'edit' => 'admin.categories.edit',
        'store' => 'admin.categories.store'
    ]]);


    Route::resource('/admin/media', 'AdminMediaController', ['names'=>[
        'index' => 'admin.media.index',
        'create' => 'admin.media.create',
        'edit' => 'admin.media.edit',
        'store' => 'admin.media.store'
    ]]);


    Route::resource('/admin/comments', 'PostCommentsController',['names'=>[
        'index' => 'admin.comments.index',
        'show' => 'admin.comments.show',
        'create' => 'admin.comments.create',
        'edit' => 'admin.comments.edit',
        'store' => 'admin.comments.store'
    ]]);


    Route::resource('/admin/comment/replies', 'CommentRepliesController', ['names'=>[
        'index' => 'admin.comment.replies.index',
        'show' => 'admin.comment.replies.show',
        'create' => 'admin.comment.replies.create',
        'edit' => 'admin.comment.replies.edit',
        'store' => 'admin.comment.replies.store'
    ]]);
});


Route::group(['middleware'=>'auth'], function () {
    Route::post('comment/reply', 'CommentRepliesController@createReply');
});