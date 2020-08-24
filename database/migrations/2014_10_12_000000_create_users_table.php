<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_lastName')->nullable();
            $table->string('email')->unique();
            $table->string('user_cuit')->unique()->nullable();
            $table->string('user_businessName')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_ivaType')->nullable();
            $table->string('user_ivaExclusion')->nullable();
            $table->string('user_ibRegiment')->nullable();
            $table->string('user_ibNumber')->nullable();
            $table->string('user_ibProvince')->nullable();
            $table->string('user_deliveryAddress')->nullable();
            $table->string('user_deliveryAddressLocation')->nullable();
            $table->string('user_deliveryAddressProvince')->nullable();
            $table->string('user_deliveryAddressPostalCode')->nullable();
            $table->string('user_deliveryAddressRef')->nullable();
            $table->string('url_avatar')->default('public/avatars/default.png');
            $table->string('user_role')->default('user');
            $table->foreignId('card_id')->nullable()->constrained('cards')->cascadeOnDelete('set null');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
