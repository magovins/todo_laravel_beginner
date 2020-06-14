<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


// updates user image profile (avatar)

Route::post('/upload', 'UserController@uploadAvatar');


// all the following routes can be replaced with:
// Route::resource('/todos','TodoController');

Route::get('/todos', 'TodoController@index')->name('todo.index');
Route::get('/todos/create', 'TodoController@create')->name('todo.create');
Route::post('/todos/create', 'TodoController@store')->name('todo.store');
Route::get('/todos/{todo}', 'TodoController@show')->name('todo.show');
Route::get('/todos/{todo}/edit', 'TodoController@edit')->name('todo.edit');
Route::patch('/todos/{todo}/update', 'TodoController@update')->name('todo.update');
Route::delete('/todos/{todo}/delete', 'TodoController@delete')->name('todo.delete');
Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
Route::delete('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');