<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->string('sku',20)->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('description_short',100)->nullable();
            $table->string('description_large')->nullable();
            $table->string('data_interest')->nullable();
            $table->string('spec')->nullable();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->cascadeOnDelete('set null');
            $table->foreignId('pattern_id')->nullable()->constrained('patterns')->cascadeOnDelete('set null');
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete('set null');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->cascadeOnDelete('set null');
            $table->date('date_start')->nullable();
            $table->date('date_finish')->nullable();
            $table->bigInteger('quantity')->unsigned()->default(0)->nullable();  
            $table->decimal('price',12,2)->default(0)->nullable();
           
            $table->char('active',3)->nullable()->default('on')->nullable();
            $table->integer('visit')->unsigned()->default(0)->nullable();
            $table->integer('count_sale')->unsigned()->default(0)->nullable();
            $table->char('slider',3)->nullable()->default('on');
            $table->float('supplier_price_list')->nullable()->default(0);
            $table->float('supplier_discount')->nullable()->default(0);
            $table->string('supplier_product_code')->nullable();
            $table->float('cost')->nullable();
            $table->float('utility')->nullable()->default(0);
            $table->float('price_discount')->nullable();
            
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
        Schema::dropIfExists('products');
    }
}
