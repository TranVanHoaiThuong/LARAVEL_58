<?php
use Illuminate\Support\Facades\Route;

// Mặc định vào trang là vào trang home
Route::redirect('/', '/home');
Route::get('/home', 'HomeController@index');

// Đăng ký tài khoản
Route::get('/register', 'Auth\RegisterController@loadFormRegister');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// Đăng nhập tài khoản
Route::get('/login', 'Auth\LoginController@loadLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');