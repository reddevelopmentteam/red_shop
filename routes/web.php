<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home', 301);
Route::livewire('/home', 'pages::home')->name('home');
