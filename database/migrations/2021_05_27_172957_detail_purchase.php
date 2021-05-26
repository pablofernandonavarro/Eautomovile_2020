<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_purchase', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('purchase_orders_id')->unsigned();
            // $table->bigInteger('detail_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->string('color')->nulable();
            $table->integer('quantity');
            $table->integer('price_unit');
            $table->bigInteger('purchase_ordres_details_id')->unsigned();
            $table
                ->foreign('purchase_orders_id')
                ->references('id')
                ->on('purchase_orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table 
                ->foreign('purchase_ordres_details_id')
                ->references('id')
                ->on('purchase_orders_details')
                ->onDelete('cascade')
                ->onUpdate('cascade');
          
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
        Schema::dropIfExists('detail_purchase');
    }
}
