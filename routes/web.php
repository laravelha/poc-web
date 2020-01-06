<?php

Route::get('/categories/data', 'CategoryController@data')->name('categories.data');
Route::get('/categories/{category}/delete', 'CategoryController@delete')->name('categories.delete');
Route::resource('categories', 'CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IndexController@index')->name('index');

Route::get('/posts/data', 'PostController@data')->name('posts.data');
Route::get('/posts/{post}/delete', 'PostController@delete')->name('posts.delete');
Route::resource('posts', 'PostController');
