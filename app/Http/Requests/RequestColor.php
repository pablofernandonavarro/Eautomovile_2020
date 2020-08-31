<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestColor extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'color_name' => 'required|unique:colors'
        ];
    }
    public function messages()
    {
        return [
            'color_name.required'        => 'El color es requerido ',
            'color_name.unique' => 'Ya existe ese color por favor verifique sus datos'
            
        ];
    }
}
