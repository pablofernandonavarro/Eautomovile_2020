<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;







Auth::routes();
Route::get('/', 'HomeController@index')->name('home');



//  ROUTE ADMIN

Route::get('dashboard', function(){
    return View('admin.dashboard');
});

Route::resource('notes', 'NoteController',['except' =>'show','create','edit']);


//  /ROUTE ADMIN


Route::resource('products', 'productController');







