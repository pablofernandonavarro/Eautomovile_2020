<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation():void {
        $this->merge([
            'slug'=> Str::slug($this->input('sku'))
             ]);
    }

    public function rules()
    {
        return [
            'slug' => 'required|unique:products'
        ];
    }
    public function messages()
    {
        return [
            'slug.required'        => 'El color es requerido ',
            'slug.unique' => 'Ya existe ese SKU por favor verifique sus datos'
            
        ];
    }
}
