<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders_details', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('purchase_orders_id')->unsigned();
            $table
            ->foreign('purchase_orders_id')
            ->references('id')
            ->on('purchase_orders')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('color')->nullable();
            $table->string('quantity')->nullable();
            $table->integer('price_unit')->nullable();
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
