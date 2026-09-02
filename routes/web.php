<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home', 301);
Route::livewire('/home', 'pages::home')->name('home');
Route::livewire('/catalog', 'pages::catalog')->name('catalog');
Route::livewire('/product/{slug}', 'pages::product')->name('product');
Route::livewire('/contact', 'pages::contact')->name('contact');
