<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('posts', 'posts')->name('posts');
Route::view('services', 'services')->name('services');
Route::view('projects', 'projects')->name('projects');
Route::view('contact', 'contact')->name('contact');
Route::view('tools', 'tools')->name('tools');

Route::view('{post}', 'show')->name('posts.show');
