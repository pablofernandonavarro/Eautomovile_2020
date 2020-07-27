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
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->string('description_short');
            $table->string('description_large');
            $table->string('data_interest');
            $table->string('spec');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->cascadeOnDelete('set null');
            $table->foreignId('pattern_id')->nullable()->constrained('patterns')->cascadeOnDelete('set null');
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete('set null');
            $table->foreignId('colour_id')->nullable()->constrained('colours')->cascadeOnDelete('set null');
            $table->date('date_start');
            $table->date('date_finish');
            $table->bigInteger('quantity')->unsigned()->default(0);  
            $table->decimal('price',12,2)->default(0);
            $table->integer('discount_rate')->unsigned()->default(0);
            $table->char('active',2);
            $table->integer('visit')->unsigned()->default(0);
            $table->integer('count_sale')->unsigned()->default(0);
            $table->char('slider',2);

            
            
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
