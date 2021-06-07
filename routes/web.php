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

//********   Route App ********* ///


Route::get('users/{id}/basicDataUsers','userController@Edit_basicdata')->name('users.basicDataUsers');
Route::put('users/{id}/basicDataUsers','userController@Update_basicdata')->name('users.Update_basicdata');
Route::resource('users', 'UserController',['except' =>'show']);

Route::get('/api-brands/{id}', 'ApiController@brand');

Route::get('/','indexController@view_user');
Route::get('/index','indexController@view_user');
Route::get('/index','indexController@productSearch')->name('productSearch');
Route::get('/nosotros','indexController@view_nosotros')->name('nosotros');
Route::get('/currier','indexController@view_currier')->name('currier');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//********   /Route App ********* ///


//********   Route Admin ********* ///


Route::prefix('admin')->middleware('admin')->name('admin.')->group( function(){
   
    Route::get('dashboard','DashboardController@index');
    Route::get('importProductExcel','importProductExcelController@importExcel');
    Route::post('importProductExcel','importProductExcelController@importExcel');
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
    Route::resource('purchaseorders','PurchaseOrdercontroller');
    Route::resource('purchaseorderdetails', 'PurchaseOrderDetailcontroller');

   
});



//********   /Route Admin ********* ///



//********   Route Images ********* ///

Route::delete('/deletepicture/{id}', 'PictureController@image')->name('deletepicture');


//********   /Route Images ********* ///



//********   Route Import/excel ********* ///

Route::post('import-products-list-excel','ProductController@importExcel')->name('products.import.excel');
Route::get('import-products-list-excel','ProductController@importExcel')->name('products.import.excel');

//********   /Route Import/excel ********* ///


//********   Route Product ********* ///


Route::get('productShowApp/{id}','ProductController@productShow')->name('productShowApp');


//********   Route Product ********* ///

//********   /Route cart_shopping ********* ///

Route::get('/cart-add/{product}','CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cart.index','CartController@index')->name('cart.index')->middleware('auth');
Route::post('/cart-clear','CartController@clear')->name('cart.clear');
Route::post('/cart-removeItem','CartController@removeItem')->name('cart.removeItem');
Route::get('/checkoutthanks', 'Cartcontroller@checkoutThanks')->name('checkout.thanks');
   


//********   /Route cart_shopping ********* ///





Route::post('/procesarPago',  'CartController@pagar')->name('procesarPago');
Route::get('checkoutMercadoPago/checkout','CartController@checkout')->name('checkoutMercadoPago.checkout')->middleware('auth');
Route::get('checkoutMercadoPago/checkoutSuccess','CartController@checkoutSuccess')->name('checkoutMercadoPago.checkoutSuccess')->middleware('auth');;

