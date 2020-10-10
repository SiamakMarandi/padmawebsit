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


/*Route::get('/', function () {

    return view('welcome');
});*/

use App\post;
use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/contact', 'HomeController@contact');
Route::get('/about', 'HomeController@about_us');
Route::get('/schedule', 'HomeController@time_schedule')->name('class-schedule');
Route::get('/post/{id}/{slug}', 'HomeController@post')->name('home-post');
Route::get('/sport/{id}/{sport}', 'HomeController@sport')->name('sport-page');



/*Route::get('/', function(){
    $posts = Post::all();
    return view('padma.layout.index', compact('posts'));
});*/


Route::group(['middleware' => 'Admin'], function () {

    Route::get('/admin', 'AdminController@index')->name('user-admin');

    Route::resource('admin/posts', 'AdminPostsController');
    Route::get('/admin/posts', 'AdminPostsController@index')->name('post-list');
    Route::get('/admin/posts/create', 'AdminPostsController@create')->name('post-create');
    Route::get('/admin/posts/{post}/edit', 'AdminPostsController@edit')->name('post-edit');
    Route::patch('/admin/post/status/{post}', 'AdminPostsController@postStatus')->name('post-status');
    Route::delete('/admin/posts/{post}', 'AdminPostsController@destroyPost')->name('post-delete');
    Route::patch('/admin/posts/update/{post}', 'AdminPostsController@update')->name('post-update');
    Route::patch('/admin/post/delete', 'AdminPostsController@deletePost')->name('posts-delete');
    Route::delete('/admin/posts/destroy/{post}', 'AdminPostsController@destroy')->name('post-destroy');


    Route::resource('admin/users', 'AdminUsersController');
    Route::get('/admin/users', 'AdminUsersController@index')->name('user-list');
    Route::match(['get', 'post'], '/admin/users/create', 'AdminUsersController@create')->name('user-create');
    Route::get('/admin/users/{user}/edit', 'AdminUsersController@edit')->name('user-edit');
    Route::post('/admin/users/store', 'AdminUsersController@store')->name('user-store');
    Route::post('/admin/medias/store', 'AdminMediasController@store')->name('media-store');
    Route::delete('/admin/user/delete', 'AdminUsersController@deleteUser')->name('user-delete');


    Route::resource('admin/sports', 'AdminSportsController');
    Route::get('/admin/sports', 'AdminSportsController@index')->name('sport-admin');
    Route::get('/admin/sports/{sport}/edit', 'AdminSportsController@edit')->name('sport-edit');
    Route::post('/admin/sports/create', 'AdminSportsController@create')->name('sport-create');
    Route::delete('/admin/sports/destroy/{sport}', 'AdminSportsController@destroySport')->name('sport-destroy');

    Route::resource('admin/teachers', 'AdminTeachersController');
    Route::get('/admin/teachers', 'AdminTeachersController@index')->name('teacher-admin');
    Route::match(['get', 'post'], '/admin/teachers/create', 'AdminTeachersController@create')->name('teacher-create');
    Route::get('/admin/teachers/{teacher}/edit', 'AdminTeachersController@edit')->name('teacher-edit');
    Route::delete('/admin/teachers/destroy/{teacher}', 'AdminTeachersController@destroyTeacher')->name('teacher-destroy');





    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::get('/admin/categories', 'AdminCategoriesController@index')->name('category-admin');
    Route::get('/admin/categories/{category}/edit', 'AdminCategoriesController@edit')->name('category-edit');
    Route::delete('/admin/categories/destroy/{category}', 'AdminCategoriesController@destroyCategory')->name('category-destroy');


    Route::resource('admin/medias', 'AdminMediasController');


    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');
    Route::get('/admin/medias', 'AdminMediasController@index')->name('media-list');
    Route::get('/admin/medias/create', 'AdminMediasController@create')->name('media-upload');

    Route::get('/admin/comments', 'PostCommentsController@index')->name('comments');
    Route::post('comments/replies/{id}', 'CommentRepliesController@show')->name('reply-show');
    Route::get('/comments/{edit}/edit', 'PostCommentsController@edit')->name('comment-edit');
    Route::patch('/admin/comments/{comments}', 'PostCommentsController@updateComment')->name('comment-update');
    Route::patch('/admin/comment/delete', 'PostCommentsController@deleteComment')->name('comment-delete');

    Route::get('/admin/replies', 'CommentRepliesController@index')->name('replies');
    Route::get('/replies/{edit}/edit', 'CommentRepliesController@edit')->name('reply-edit');
    Route::patch('/admin/replies/{replies}', 'CommentRepliesController@updateReply')->name('comment-update');
    Route::patch('/admin/reply/delete', 'CommentRepliesController@deleteReply')->name('comment-update');
    //Route::post('/admin/users/{user}', 'AdminUsersController@update')->name('user-update');

    Route::resource('admin/roles', 'AdminRolesController');
    Route::get('/admin/roles', 'AdminRolesController@index')->name('role-list');
    Route::get('/admin/roles/{role}/edit', 'AdminRolesController@edit')->name('role-edit');
    Route::delete('/admin/roles/destroy/{role}', 'AdminRolesController@destroyRole')->name('role-destroy');


    Route::resource('admin/classes', 'AdminClassesController');
    Route::get('/admin/classes', 'AdminClassesController@index')->name('class-list');
    Route::get('/admin/classes/create', 'AdminClassesController@create')->name('class-create');
    Route::get('/admin/classes/{class}/edit', 'AdminClassesController@edit')->name('class-edit');
    Route::delete('/admin/classes/destroy/{class}', 'AdminClassesController@destroyClass')->name('class-destroy');

    Route::resource('admin/levels', 'AdminLevelsController');
    Route::get('/admin/levels', 'AdminLevelsController@index')->name('level-admin');
    Route::get('/admin/levels/{level}/edit', 'AdminLevelsController@edit')->name('level-edit');
    Route::delete('/admin/levels/destroy/{level}', 'AdminLevelsController@destroyLevel')->name('level-destroy');


});

Route::group(['middleware' => 'user'], function () {


    Route::resource('comments', 'PostCommentsController');
    Route::resource('comments/replies', 'CommentRepliesController');
    Route::post('comments/reply', 'CommentRepliesController@createReply');
    Route::post('comments/{id}', 'CommentRepliesController@showComment')->name('showComment');

    //Route::resource('comments/show/{show}', 'PostCommentsController@show')->name('comments-show');


});





