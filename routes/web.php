<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Mặc định vào trang là vào trang home
Route::redirect('/', '/home');
Route::get('/home', 'HomeController@index');