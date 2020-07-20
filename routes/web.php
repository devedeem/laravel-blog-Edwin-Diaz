<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Route::get('/', 'HomeController@index')->name('/');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {

    Lfm::routes();
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('post/{id}','HomeController@post')->name('home.post');



Route::group(['middleware'=>'admin'],function (){

/*
| App Routes
*/

    Route::get('/admin','AdminController@index');

    Route::resource('admin/users','AdminUserController');
    //getting trash users
    Route::get('trash/users','AdminUserController@trash')->name('users.trash');
    Route::get('user/restore/{id}','AdminUserController@restore')->name('user.restore');
    Route::get('/error','AdminUserController@error')->name('/error');
    /*Posts*/
    Route::resource('admin/posts','AdminPostsController');
    Route::get('trash/posts','AdminPostsController@trash')->name('posts.trash');
    Route::get('post/restore/{id}','AdminPostsController@restore')->name('posts.restore');
    Route::get('/error', 'AdminPostsController@error')->name('/error');
    /*categories*/
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::get('trash/categories','AdminCategoriesController@trash')->name('categories.trash');
    Route::get('restore/categories/{id}', 'AdminCategoriesController@restore')->name('categories.restore');
    /*Media*/
    Route::resource('admin/media', 'AdminMediaController');
    Route::delete('admin/delete/media','AdminMediaController@deleteMedia');
    /*Comments*/
    Route::resource('admin/comments','PostCommentsController');
    /*Replies*/
    Route::resource('admin/comments/replies','CommentRepliesController');
});
Route::group(['middleware'=>'admin'],function (){
    /*working on Replies*/
    Route::post('comment/reply','CommentRepliesController@createReply');
    Route::get('trash/comments','TrashController@trashcomments')->name('trash.comments');
    Route::get('restore/comments/{id}','TrashController@restorecomment')->name('restore.comment');
});

















