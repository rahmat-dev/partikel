<?php

use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'admin.dashboard');

// Data
Route::get('category/data', 'DataController@categories')->name('category.data');

// Category Routes
Route::resource('category', 'CategoryController');
