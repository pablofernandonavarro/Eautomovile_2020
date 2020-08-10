<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;


//  ROUTE ADMIN

Route::get('dashboard', function(){
    return View('admin.dashboard');
});

Route::resource('notes', 'NoteController',['except' =>'show','create','edit']);


//  /ROUTE ADMIN

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', 'productController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
