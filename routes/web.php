<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'MyController@login')->name('login');

Route::any('/register', 'MyController@register')->name('register');
Route::any('/loginCheck', 'MyController@loginCheck')->name('loginCheck');
Route::any('/add', 'MyController@add')->name('add');
Route::any('/loginSuccess', 'MyController@loginSuccess')->name('loginSuccess');
Route::any('/insert', 'MyController@insert')->name('insert');
Route::any('/insert_homepage', 'MyController@insert_homepage')->name('insert_homepage');
Route::any('/out', 'MyController@out')->name('out');
Route::any('/update_homepage', 'MyController@update_homepage')->name('update_homepage');
Route::any('/delete_homepage', 'MyController@delete_homepage')->name('delete_homepage');
Route::any('/accept', 'MyController@accept')->name('accept');
