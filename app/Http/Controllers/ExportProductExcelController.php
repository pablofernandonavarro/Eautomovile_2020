<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class ExportProductExcelController extends Controller
{
    public function exportExcel(){

      
      
        return Excel::download(new ProductsExport, 'productos.xlsx');
        // $products    = Product::with('brand','pattern','category','suppliers')->get();
       
      
        // $user        =  Auth::user();
    
        // return view('admin.exportProductExcel', compact('products','user'));
        
      
       
          



      

           
       }
}
