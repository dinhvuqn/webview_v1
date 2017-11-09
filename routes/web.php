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
//view
Route::get('/',                         			'WebviewHomeController@index');
Route::resource('/dangnhap',                    	'WebviewLoginController');
Route::resource('/dangky',                 			'WebviewRegisterController');
Route::resource('/account',                 		'AccountHomeController');
Route::resource('/account/profile',          		'AccountAccountController');

//admin
Auth::routes();
Route::group(['prefix' => 'admin',     				'middleware' => 'auth'],function(){
Route::resource('',          					'admin\HomeController');

/*--------------------------------------------------------------------*/
    /* Loại dịch vụ
    /*--------------------------------------------------------------------*/
Route::resource('/loaidv',          				'admin\LoaiDVController');
Route::resource('/kieudv',          				'admin\KieuDVController');
Route::resource('/dichvu',          				'admin\DVController');
Route::resource('/soluong',          				'admin\SoLuongController');
Route::post('order/searchsl',						'admin\OrderController@displaySoluong');
Route::post('order/thanhtien',						'admin\OrderController@thanhtien');
Route::resource('/order',          					'admin\OrderController');
Route::resource('/status',          					'admin\StatusOrderController');
Route::resource('/user',          					'admin\UserController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
