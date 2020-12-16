<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    use importable;
    
  
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (!isset($row['sku'])) {
                return null;
            }

            Product::updateOrCreate([
                'sku' => $row['sku'],
                
            ], [
                'sku'         => $row['sku'],
                'price'       => $row['price'],
                'brand_id'    => $row['marca'],
                'pattern_id'  => $row['modelo'],
                'category_id' => $row['categoria'],
                'supplier_id' => $row['proveedor'],
            ]);
        }
    }
}
