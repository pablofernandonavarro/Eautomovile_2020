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
use App\Picture;
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
    Route::get('supplier_crud','DashboardController@view_supplier');
    Route::get('supplier/price','DashboardController@price_supplier');
    Route::resource('notes', 'NoteController',['except' =>'show','create','edit']);
    Route::resource('colors', 'ColorController',['except' =>'show','create','edit']);
    Route::resource('categories', 'CategoryController',['except' =>'show','create','edit']);
    Route::resource('brands', 'BrandController',['except' =>'show','create','edit']);
    Route::resource('patterns', 'PatternController',['except' =>'show','create','edit']);
    Route::resource('suppliers', 'SupplierController',['except' =>'show','create','edit']);
    Route::resource('pictures', 'PictureController');
    Route::resource('products', 'ProductController');
<<<<<<< HEAD
    
   
=======
    Route::post('import-products-list-cost','ProductController@importExcel')->name('products.import.excel');
>>>>>>> f120cb4716fe63008e594be8d2e9737c065276ea
    
});

Route::resource('users', 'UserController');
Route::get('/api-brands/{id}', 'ApiController@brand');

Route::get('/test', function(){
    $pictures =Picture::find(4)->get();
    return $pictures;
 
});
   






//  /ROUTE ADMIN











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::delete('/deletepicture/{id}', 'PictureController@image')->name('deletepicture');