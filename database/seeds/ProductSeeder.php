<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('products')->insert([
            'sku'                     => 10,

            'slug'                    => 
            'p-habitaculo-corsa-del-nbsp-01-01-1994-al-01-01-2016-p',

            'description_short'       => 
            '<p>Habitaculo corsa del&nbsp; 01/01/1994 al 01/01/2016</p>',

            'description_large'       =>
           '<p>Cubre alfombra Habitaculo Chevrolet corsa entre&nbsp; 01/01/1994 al 01/01/2016</p>',

            'data_interest'           => 
            '<h1>Datos de interes:</h1>

            <p>&nbsp;</p>
            
            <ol>
                <li>Hechas a medida.</li>
                <li>material pvc</li>
                <li>varios.</li>
            </ol>',

            'spec'                    => 
            '<h1>Especificaciones:</h1>

            <ul>
                <li>Juego completo de cubre alfombras Vapren de excelente calidad y dise&ntilde;o</li>
                <li>Garantizadas por 3 a&ntilde;os por la f&aacute;brica</li>
                <li>Disponibles para todas las marcas y modelos</li>
                <li>Posee sistema antideslizante que impide que se desplacen de su lugar</li>
                <li>Al ser confeccionadas a medida para cada veh&iacute;culo le garantizan un calce preciso</li>
                <li>Disponibles para habit&aacute;culos, ba&uacute;les y cajas de camionetas</li>
            </ul>',

            'brand_id'                => 2,
            'pattern_id'              => 2,
            'category_id'             => 4,
            'supplier_id'             => 1,
            'date_start'              => '1994-01-02',
            'date_finish'             => '2016-01-12',
            'quantity'                => '10',
            'price'                   => 1000,
            'active'                  => 'on',
            'visit'                   => 10,
            'count_sale'              => 10,
            'slider'                  => 'on',
            'supplier_price_list'     => 1000.00,
            'supplier_discount'       => 24.70,
            'supplier_product_code'   => 10,
            'cost'                    => 753,
            'utility'                 => 20,
            
        ]);

    }
}
