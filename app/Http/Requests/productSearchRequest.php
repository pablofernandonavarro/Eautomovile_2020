<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;

class productSearchRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Product $product)
    {
        return [
            'year'                            => 'required',
            'category_id'                     => 'required',
            'pattern_id'                      => 'required',
        ];
    }
    public function messages()
    {
        return[
            'year.required'        => "Selecione año de fabricaion del vehículo !!!",
            'category_id.required' => "Selecione una categoria !!!",
            'pattern_id.required'  => "Seleccione un modelo !!!",
        ];
    }
}
