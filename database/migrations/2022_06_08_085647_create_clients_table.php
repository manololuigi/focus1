<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono', 20)->unique();
            $table->string('ciudad', 40)->nullable();
            $table->string('dir_1')->nullable();
            $table->string('dir_2')->nullable();
            $table->string('email',50)->nullable();
            $table->string('ct_alterno',50)->nullable();
            $table->string('observaciones', 100)->nullable();
            $table->string('identidad',20)->nullable();
            $table->string('rtn', 20)->nullable();
            $table->json('products')->nullable();
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
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
        Schema::dropIfExists('clients');
    }
}
