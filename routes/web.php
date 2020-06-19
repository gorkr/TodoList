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

Route::get('/', 'MyController@login')->name('login');

Route::get('/login', 'MyController@login')->name('login');

Route::any('/logon', 'MyController@logon')->name('logon');
Route::any('/loginCheck', 'MyController@loginCheck')->name('loginCheck');
Route::any('/add', 'MyController@add')->name('add');
Route::any('/homepage', 'MyController@homepage')->name('homepage');
Route::any('/insert', 'MyController@insert')->name('insert');
Route::any('/insert_homepage', 'MyController@insert_homepage')->name('insert_homepage');
Route::any('/out', 'MyController@out')->name('out');
Route::any('/update_homepage', 'MyController@update_homepage')->name('update_homepage');
Route::any('/delete_homepage', 'MyController@delete_homepage')->name('delete_homepage');
Route::any('/accept', 'MyController@accept')->name('accept');
Route::any('/un_accept', 'MyController@un_accept')->name('un_accept');
Route::any('/todo', 'MyController@todo')->name('todo');
Route::any('/todolist', 'MyController@todolist')->name('todolist');
Route::any('/add_list','MyController@add_list');
Route::any('/add_list_op','MyController@add_list_op');
Route::any('/listall','MyController@listall');
Route::any('/ing','MyController@ing');
Route::any('/listend','MyController@listend');
Route::any('/dellistend','MyController@dellistend');
Route::any('/update_list','MyController@update_list');
Route::any('/update_list_op','MyController@update_list_op');
Route::any('/delete_list','MyController@delete_list');
Route::any('/add_friend','MyController@add_friend');
Route::any('/delete_friend','MyController@delete_friend');
