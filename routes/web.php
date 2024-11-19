<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('posts', 'posts')->name('posts');
Route::view('services', 'services')->name('services');
Route::view('{post}', 'show')->name('posts.show');
