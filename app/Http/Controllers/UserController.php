<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class Usercontroller extends Controller
{
    public function edit($id)
    {
        $user= User::findOrfail($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user= User::FindOrFail($id);
       
        
    
        if ($request->hasFile('url_avatar')) {
            
            
            $user->url_avatar = $request->file('url_avatar')->store('public/avatars');
            
            $user->save($request->all());
        }
        $user->name                           = $request->name;
        $user->user_lastName                  = $request->user_lastName;
        $user->email                          = $request->email;
        $user->user_cuit                      = $request->user_cuit;
        $user->user_businessName              = $request->user_businessName;
        $user->user_phone                     = $request->user_phone;
        $user->user_ivaType                   = $request->user_ivaType;
        $user->user_ivaExclusion              = $request->user_ivaExclusion;
        $user->user_ibRegiment                = $request->user_ibRegiment;
        $user->user_ibNumber                  = $request->user_ibNumber;
        $user->user_ibProvince                = $request->user_ibProvince;
        $user->user_deliveryAddress           = $request->user_deliveryAddress;
        $user->user_deliveryAddressLocation   = $request->user_deliveryAddressLocation;
        $user->user_deliveryAddressProvince   = $request->user_deliveryAddressProvince;
        $user->user_deliveryAddressPostalCode = $request->user_deliveryAddressPostalCode;
        $user->user_deliveryAddressRef        = $request->user_deliveryAddressRef;
       
         $user->save();
          
           
            return redirect("index");
       
    }
}


  

   


  





    