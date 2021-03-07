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
// Chung thuc nguoi dung (user, admin)
Auth::routes();
Route::resources([
    'loaicongthucs' => 'LoaiCongThucsController',
    'congthucs' => 'CongThucsController',
    'users' => 'UserController',
    'admins' => 'AdminController',
    'binhluans' => 'BinhLuansController',
]);

// Trang chu
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

// Route cho user
Route::get('/list_recipe','CongThucsController@list_recipe')->middleware('auth');
Route::get('/list_recipe/{id}','CongThucsController@recipe_detail')->middleware('auth');
Route::get('/user/profile','UserController@display_user')->name('user.profile')->middleware('auth');
Route::put('/user/edit_profile','UserController@edit_user')->name('user.edit_profile')->middleware('auth');
Route::get('/user/edit_profile','UserController@edit_user')->name('user.edit_profile')->middleware('auth');
Route::put('/user/upload_image','UserController@upload_image')->middleware('auth');
Route::put('/user/upload_profile','UserController@upload_profile')->middleware('auth');
Route::delete('/user/delete_account','UserController@delete_account')->middleware('auth');

Route::get('/register/user/','UserController@register_user');
//Route::post('/register/user/','UserController@register_user_create')->name('register.user');

Route::get('/login/user','Auth\LoginController@form_login_user')->name('form.login.user');
Route::post('/login/user','Auth\LoginController@login_user')->name('login.user');
// Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');


Route::get('/login/admin', 'Auth\LoginController@form_login_admin');
Route::post('/login/admin', 'Auth\LoginController@login_admin')->name('login.admin');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/home/admin', function (){
        return view('home');
    });
    // Route của admin
    Route::get('/admin/type-product/index', 'LoaiCongThucsController@index')->name('type.index');
    Route::get('/admin/product/index', 'CongThucsController@index');
    Route::get('/admin', 'AdminController@display');
    Route::get('/admin/list_account', 'AdminController@display');
    Route::put('/admin/upload_image','AdminController@upload_image');
    Route::put('/admin/upload_profile','AdminController@upload_profile');
    Route::delete('/admin/delete_account','AdminController@delete_account');
    Route::get('admin/list_admin','AdminController@list_admin')->name('admin.list_admin');
});