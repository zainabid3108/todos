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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('get-todos', "TodoController@todos")->name('get-todos');
Route::post('store-todo', "TodoController@store")->name('store-todo');
Route::post('update-todo/{id}', "TodoController@updateTodo")->name('update-todo');
Route::get('delete-todo/{id}', "TodoController@deleteTodo")->name('delete-todo');
