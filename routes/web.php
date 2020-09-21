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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//controllers
Route::resource('users', 'UsersController')->middleware('role:admin,manager');

Route::resource('roles', 'RolesController')->middleware('role:admin,manager');
Route::resource('posts', 'PostsController')->middleware('role:admin,manager,supplier');
