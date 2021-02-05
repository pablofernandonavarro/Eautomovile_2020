<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quantity')->unsigned()->default(0)->nullable();  
            $table->bigInteger('user_id')->unsigned();
            $table->string('picture_url')->nullable();
            $table->bigInteger('color_id')->unsigned();
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table
            ->foreign('color_id')
            ->references('id')
            ->on('colors')
            ->onDelete('cascade')
            ->onUpdate('cascade');    
            $table->string('guide_number')->nullable();
            $table->string('status')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
}
