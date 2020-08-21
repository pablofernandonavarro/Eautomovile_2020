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
            $table->string('email')->unique();
            $table->string('domicilio')->nullable($value = true);
            $table->string('localidad')->nullable($value = true);
            $table->string('provincia')->nullable($value = true);
            $table->string('codigopostal')->nullable($value = true);
            $table->string('url_avatar')->default('default.gif');;
            $table->string('telefono')->nullable($value = true);;
            $table->string('razonsocial')->nullable($value = true);;  
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
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
