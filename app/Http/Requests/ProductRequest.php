<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Str;
use App\Product;

class ProductRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation():void {
        $this->merge([
            'slug'=> Str::slug($this->input('sku'))
             ]);
    }

    public function rules(Product $product)
    {  
       
        return [

            'visit'                  => 'required',
            'count_sale'             => 'required',
            'sku'                    => 'required',
            'sku'                    => 'unique:products,sku',
             'slug'                   => 'required',
            'color_id'               => 'required',
            'pattern_id'             => 'required',
            // 'brand_id'               => 'required',
            'category_id'            => 'required',
            'date_start'             => 'required|before_or_equal:date_finish',
            'date_finish'            => 'required||after_or_equal:date_start',
            'quantity'               => 'required|numeric|min:0|not_in:0',
            'price'                  => 'required|numeric|min:0|not_in:0',
            'description_short'      => 'required',
            'supplier_price_list'    => 'required',
            'supplier_discount'      => 'required|min:0|max:100',
            'quantity'               => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'sku.required'                  => 'El sku es requerido',
            'sku.unique'                    => 'El sku ingresado esta en uso',
            'sku.max'                      => 'El sku debe tener menos de 21 caracteres',
            'color_id.required'             => 'El color del producto es requerido',
            'pattern_id.required'           => 'El modelo del producto es requerido',
            // 'brand_id.required'             => 'La marca del producto es requerida',
            'category_id.required'          => 'La categoria de producto es requerida',
            'date_start.required'           => 'La fecha de incio de fabricacion del automotor es requerida',
            'date_finish.required'          => 'La fecha de finalizacion de fabricacion del automotor es requerida',
            'quantity.required'             => 'La cantidad en stock es requerida',
            'quantity.numeric'              => 'La cantidad debe ser un dato numerico y mayor a cero',
            'quantity.not_in'               => 'La cantidad debe ser un dato numerico y mayor a cero',
            'price.required'                => 'El precio es requerido',
            'price.numeric'                 => 'La cantidad debe ser un dato numerico y mayor a cero',
            'price.not_in'                  => 'El precio debe ser mayor a cero',
            'discount_rate.required'        => 'La descuento debe ser un dato numerico y mayor a cero',
            'description_short.required'    => 'La descripcion es requerida',
            'date_finish.after_or_equal'    => 'El dato tiene que ser posterior a la fecha de fabricacion del modelo',
            'date_start.before_or_equal'    => 'El dato tiene que ser anterior a la fecha de  finalizacion de fabricacion del modelo',
            'supplier_price_list.required'  => 'El dato es requerido de este depende PRECIO DE COSTO',
            'supplier_discount.required'    => 'Este valor no pude ser nenor a 0 no mayor a 100',
            'quantity.required'             => 'La cantidad es necesaria para llevar un stock real'
        ];
    }
}
