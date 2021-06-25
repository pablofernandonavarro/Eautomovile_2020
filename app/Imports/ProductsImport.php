<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;


class ProductsImport implements ToModel
{
   
    public function model(array $row){

        if (!isset($row[0])) {
            return null;
        }
      dd($row);
        return new Product([
                    'sku'                   => $row['1'],
                    'supplier_price_list'   => $row['0'],
                    'supplier_discount'     => $row['0'],
                    'cost'                  => $row['0'],
                    'utility'               => $row['0'],
                    'price'                 => $row['0'],
                    'supplier_id'           => $row['0'],
                    'brand_id'              => $row['0'],
                    'pattern_id'            => $row['0'],
                    'category_id'           => $row['0'],
                ]);
            }
        
    }





    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row) {
    //         if (!isset($row['sku'])) {
    //             return null;
    //         }

    //         Product::updateOrCreate([
    //             'sku'                   => $row['sku'],
               
                
                
    //         ], [
    //             'sku'                   => $row['sku'],
    //             'supplier_price_list'   => $row['precio_lista_proveedor'],
    //             'supplier_discount'     => $row['descuento_del_proveedor'],
    //             'cost'                  => $row['costo'],
    //             'utility'               => $row['utilidad_en_porcentaje'],
    //             'price'                 => $row['precio_de_venta'],
    //             'supplier_id'           => $row['proveedor'],
    //             'brand_id'              => $row['marca'],
    //             'pattern_id'            => $row['modelo'],
    //             'category_id'           => $row['categoria'],
    //         ]);
    //     }
    // }
