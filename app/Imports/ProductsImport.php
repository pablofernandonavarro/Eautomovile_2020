<?php

namespace App\Imports;

use App\Product;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
class ProductsImport implements   ToModel
{

     use Importable;

    public function model(array $row){





        return new Product([


            "id"                      => $row[0],
            "sku"                    => $row[1],
            "slug"                   => $row[2],
            "description_short"      => $row[3],
            "description_large"      => $row[4],
            "data_interest"          => $row[5],
            "spec"                   => $row[6],
            "brand_id"               => $row[7],
            "pattern_id"             => $row[8],
            "category_id"            => $row[9],
            // "colour_id"          => $row[10],
            "supplier_id"            => $row[10],
             "date_start"             => $row[11],
             "date_finish"           => $row[12],
             "quantity"               => $row[13],
             "price"                  => $row[14],
             "active"                 => $row[15],
             "visit"                  => $row[16],
             "count_sale"             => $row[17],
             "slider"                 => $row[18],
             "supplier_price_list"    => $row[19],
             "supplier_discount"      => $row[20],
             'supplier_product_code'  => $row[21],
             "cost"                   => $row[22],
             "utility"                => $row[23],
             "price_discount"         => $row[24],
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
