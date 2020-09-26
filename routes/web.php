<?php

use App\Http\Controllers\DashboardController;
use App\Pattern;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;
use App\Brand;
use App\Http\Controllers\Productcontroller;
use Doctrine\Inflector\Rules\Patterns;
use App\Product;

Auth::routes();
Route::get('/','indexController@view_user');

Route::get('/index','indexController@view_user');


//  ROUTE ADMIN


Route::prefix('admin')->middleware('admin')->name('admin.')->group( function(){
   
    Route::get('dashboard','DashboardController@index');
    Route::get('note_crud','DashboardController@view_note');
    Route::get('color_crud','DashboardController@view_color');
    Route::get('category_crud','DashboardController@view_category');
    Route::get('brand_crud','DashboardController@view_brand');
    Route::get('pattern_crud','DashboardController@view_pattern');
    
    Route::resource('notes', 'NoteController',['except' =>'show','create','edit']);
    Route::resource('colors', 'ColorController',['except' =>'show','create','edit']);
    Route::resource('categories', 'CategoryController',['except' =>'show','create','edit']);
    Route::resource('brands', 'BrandController',['except' =>'show','create','edit']);
    Route::resource('patterns', 'PatternController',['except' =>'show','create','edit']);
    Route::resource('products', 'ProductController');
   
    
});

Route::resource('users', 'UserController');

Route::get('/test', function(){
    
    $products = Product::find(80);
    
    return $products->brand;
});
   






//  /ROUTE ADMIN











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
