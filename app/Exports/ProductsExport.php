<?php

namespace App\Exports;

use App\Product;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            '#',
            'sku',
            'slug',
            'description_short',
            'description_large',
            'data_interest',
            'spec',
            'brand_id',
            'pattern_id',
            'category_id',
            'colour_id',
            // 'supplier_id',
            'date_start',
            'date_finish',
            'quantity',
            'price',
            'active',
            'visit',
            'count_sale',
            'slider',
            'supplier_price_list',
            'supplier_discount',
            'cost',
            'utility',
            'price_discount',
        ];
    }

    public function collection()
    {

        return Product::all();
    }
}
