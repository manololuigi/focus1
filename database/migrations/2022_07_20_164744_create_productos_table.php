<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique()->nullable();
            $table->string('producto');
            $table->string('descripcion')->nullable();

            $table->foreignId('idcategoria')
            ->nullable()
           ->constrained('categorias')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->string('subcategoria');
            $table->integer('cantidad');
            $table->decimal('costo_dolares')->nullable();
            $table->decimal('traida_lps')->nullable();
            $table->decimal('totalCosto_lps')->nullable();
            $table->decimal('venta')->nullable();
            $table->decimal('desc5')->nullable();
            $table->decimal('desc10')->nullable();
            $table->decimal('desc15')->nullable();
            $table->decimal('desc20')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
