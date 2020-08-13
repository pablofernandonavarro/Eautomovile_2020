<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;







Auth::routes();
Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');



//  ROUTE ADMIN


Route::prefix('admin')->middleware('admin')->name('admin')->group( function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::resource('/notes', 'NoteController',['except' =>'show','create','edit']);
    Route::resource('/products', 'productController');
});







//  /ROUTE ADMIN










