<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;


//  ROUTE ADMIN

Route::get('admin', function(){
    return View('admin.dashboard');
});



//  /ROUTE ADMIN

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', 'productController');

