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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/1', function () {
    return view('admin.index');
});
Route::get('/2', function () {
    return view('layouts.user');
});
Route::get('/', function () {
    return view('loginuser.login');
});

Route::prefix('loginuser')->group(function(){
    Route::get('/', 'PageController@login');
    Route::get('/register', 'PageController@register');
    Route::get('/logout', 'PageController@logout');
    Route::post('/proses-login', 'PageController@proses_login');
    Route::post('/proses-register', 'PageController@proses_register');
});


Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', function () { return view('admin.index');});

    Route::prefix('menu')->group(function(){
    Route::get('/', 'MenuController@index');
    Route::get('/tambah', 'MenuController@tambah');
    Route::post('/add', 'MenuController@add');
    Route::get('/edit/{id}', 'MenuController@edit');
    Route::post('/update', 'MenuController@update');
    Route::get('/delete/{id}', 'MenuController@delete');
     });
});


Route::group(['middleware' => 'kasir'], function(){
    Route::get('/kasir', function () { return view('kasir.index');});


});


Route::group(['middleware' => 'waiter'], function(){
    Route::get('/waiter', function () { return view('waiter.index');});


});


Route::group(['middleware' => 'owner'], function(){
    Route::get('/owner', function () { return view('owner.index');});


});


Route::group(['middleware' => 'pelanggan'], function(){
    Route::get('/pelanggan', function () { return view('pelanggan.index');});


});