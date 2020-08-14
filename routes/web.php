<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;







Auth::routes();
Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');



//  ROUTE ADMIN


Route::prefix('admin')->middleware('admin')->name('admin/')->group( function(){
    Route::get('dashboard', function (){return view('admin.dashboard');});
    Route::get('color_crud',function (){return view('admin.color_crud');});
    Route::get('category_crud',function (){return view('admin.category_crud');});
    Route::get('brand_crud',function (){return view('admin.brand_crud');});
    Route::resource('notes', 'NoteController',['except' =>'show','create','edit']);
    Route::resource('colors', 'ColorController',['except' =>'show','create','edit']);
    Route::resource('categories', 'CategoryController',['except' =>'show','create','edit']);
    Route::resource('brands', 'BrandController',['except' =>'show','create','edit']);
    Route::resource('products', 'productController');
    
    
});








//  /ROUTE ADMIN










