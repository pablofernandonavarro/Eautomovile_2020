<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers= Supplier::get();
        $user = Auth::user();

        return $suppliers ;
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
        
          
        
            ]);
        
        Supplier::create($request->all());
        
        return ;
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        
            ]);
        
        Supplier::find($id)->update($request->all());
        return;
    }
    public function destroy($id)
    {
        $suppliers = Supplier::findOrFail($id);
        $suppliers->delete();
        return $suppliers;
    }
}