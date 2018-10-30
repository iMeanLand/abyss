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

// ADMIN ROUTES

Route::get('/admin/addposts', function() {
    return view('/admin/addposts');
})->name('addposts');

Route::get('/admin/user-info', function() {
    return view('/admin/user-info');
})->name('user-info');

Route::get('admin/user-update', function () {
    return redirect('/admin/user-info');
})->name('redirect-userinfo');

Route::get('/admin/dashboard', function () {
    return view('/admin/admin-dashboard');
})->name('dashboard');

Route::get('/admin/posts', function () {
    return view('/admin/posts');
})->name('posts');

Route::get('/admin/pages', function () {
    return view('/admin/pages');
})->name('pages');

Route::get('/admin/edit-home', function () {
    return view('/admin/edit-home');
})->name('edit-home');

Route::post('/admin/edit-update', 'PagesController@pageEditPage');

Route::get('/admin/admin-settings', function () {
    return view('/admin/admin-settings');
})->name('admin-settings');

Route::get('/admin/post-categories', function () {
    return view('/admin/categories');
})->name('post-categories');

Route::get('/admin/edit-post/{id}', 'PostsController@postGetPostData');
Route::post('/admin/edit-post-updated/', 'PostsController@postEditPost');

Route::get('/admin/edit-posts', function () {
    return view('/admin/edit-posts');
})->name('edit-posts');

Route::get('/admin/footer-settings', function() {
    return view('/admin/footer-settings');
})->name('footer-settings');

Route::get('/admin/edit-category/{id}', 'PostsController@showCategoryForEdit');

// USER ROUTES

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('blog/post/{id}', 'PostsController@postViewSinglePost' );

Route::get('home', function () {
    return redirect('/');
})->name('redirect-home');

Route::get('/category/{category}' , [
    'uses' => 'PostsController@postsCategoryPost',
    'as' => 'category'
]);

Route::post('admin/addposts/addpost', 'PostsController@postCreatePost');
//Route::post('posts', 'PostsController@postShowPostsOnPage');
Route::get('admin/update/user-info', 'UpdateUserInfoController@ViewRegisteredUsers');
Route::post('admin/update/user-update', 'UpdateUserInfoController@UpdateUserInfo');
Route::get('blog', 'PostsController@postShowPosts')->name('blog');
Route::post('post-delete', 'PostsController@postDeletePost');
Route::post('image-upload', 'PostsController@upload');
Route::post('/admin/post-categories/add-category', 'PostsController@postsCreateCategory');
Route::post('/admin/post-categories', 'PostsController@postDeleteCategory');
Route::post('/admin/post-categories/update-category', 'PostsController@postEditCategory');
Route::post('/admin/user-info', 'UpdateUserInfoController@hash_test');

//Route::post('admin/update-page', 'PagesController@pageEditPage');

//Route::get('admin/update-page', function () {
//    return view('/admin/edit-home');
//});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
