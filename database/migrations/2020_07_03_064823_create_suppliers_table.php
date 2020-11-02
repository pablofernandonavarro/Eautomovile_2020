<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
   
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_code')->unique();
            $table->string('supplier_businessName')->nullable();
            $table->string('supplier_email')->nullable();
            $table->string('supplier_phone')->nullable();
            $table->string('supplier_address')->nullable();
            $table->string('supplier_address_location')->nullable();
            $table->string('supplier_address_province')->nullable();
            $table->string('supplier_address_postalCode')->nullable();
            $table->string('supplier_web')->nullable();
       
            $table->string('supplier_cuit')->unique()->nullable();
            $table->string('supplier_ivaType')->nullable();
            $table->string('supplier_ivaExclusion')->nullable();
            $table->string('supplier_ibRegiment')->nullable();
            $table->string('supplier_ibNumber')->nullable();
            $table->string('supplier_ibProvince')->nullable();
            
           
            $table->string('supplier_delivery_Address')->nullable();
            $table->string('supplier_delivery_AddressLocation')->nullable();
            $table->string('supplier_delivery_AddressProvince')->nullable();
            $table->string('supplier_delivery_AddressPostalCode')->nullable();

            $table->float('supplier_discount');
            $table->float('supplier_extra_discount');
           
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
