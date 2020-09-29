<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Pattern;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function brand($id){
         
         return Pattern::findOrFail($id)->brand->toJson();
    }
}
