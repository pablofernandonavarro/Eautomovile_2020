<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_details', function (Blueprint $table) {

            $table->id();
            $table->string('quantity')->nullable();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('purchase_order_id')->unsigned();
            $table
            ->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table
            ->foreign('purchase_order_id')
            ->references('id')
            ->on('purchase_orders')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('color')->nullable();
            $table->integer('price_unit')->nullable();
            $table->timestamps();
        });
       
    }


    public function down()
    {
        Schema::dropIfExists('purchase_order_details');
    }
}
