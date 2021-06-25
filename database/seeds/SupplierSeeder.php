<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([

            
            'supplier_code'                      =>'1',
            'supplier_businessName'              =>'Vapren',
            'supplier_email'                     => 'vapren@vapren.com',
            'supplier_phone'                     => '1213124412',
            'supplier_address'                   => '3 de febrero 797',
            'supplier_address_location'          => 'tres de febrero',
            'supplier_address_province'          => 'Buenos Aires',
            'supplier_address_postalCode'        => '1650',
            'supplier_web'                       => 'vapren.com.ar',

            'supplier_cuit'                      => '20-12121-1212',
            'supplier_ivaType'                   => 'responsable inscripto',
            'supplier_ivaExclusion'              => 'no',
            'supplier_ibRegiment'                => 'multilateral',
            'supplier_ibNumber'                  => '904-1212121-1',
            'supplier_ibProvince'                => 'buenos aires',
    

            'supplier_delivery_Address'          => '3 de febreo 12912',
            'supplier_delivery_AddressLocation'  => 'san martin',
            'supplier_delivery_AddressProvince'  => 'buenos aires',
            'supplier_delivery_AddressPostalCode' => '1680',

            'supplier_discount'                   => 24.7,
            'supplier_extra_discount'             => '0',
        ]);
    }
}
