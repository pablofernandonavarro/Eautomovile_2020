<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;


class ProductsImport implements ToModel
{

    public function model(array $row){

        if (isset($row[11])) {
            return null;
        }

        return new Product([

            "sku"                => $row[1],
            "slug"               => $row[2],
            "description_short"  => $row[3],
            "description_large"  => $row[4],
            "data_interest"      => $row[5],
            "spec"               => $row[6],
            "brand_id"           => $row[7],
            "pattern_id"         => $row[8],
            "category_id"        => $row[9],
            "colour_id"          => $row[10],
            // "supplier_id"        => $row[11],
            "date_start"         => $row[12],
            "date_finish"        => $row[13],
            "quantity"           => $row[14],
            "price"              => $row[15],
            "active"             => $row[16],
            "visit"              => $row[17],
            "count_sale"         => $row[18],
            "slider"             => $row[19],
            "supplier_price_list"=> $row[20],
            "supplier_discount"  => $row[21],
            "cost"               => $row[22],
            "utility"            => $row[23],
            "price_discount"     => $row[24],
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
