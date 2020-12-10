<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpParser\Node\Stmt\Return_;

class ProductsImport implements ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            
            'sku'                  => $row[3],
            'price'                 => $row[4],
           
            
        ]);
    }

    public function rules(): array

    {
        return [
            'sku' => ['sku','unique:products,sku']
        ];
    }
}
