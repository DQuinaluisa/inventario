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
            $table->string('product_name')->comment('Nombre del producto');
            $table->string('product_code')->comment('Codigo del producto, aqui va el codigo de barras');
            $table->decimal('product_price', 5,2)->comment('Precio del producto');
            $table->integer('product_stock')->comment('Cantidad de productos');
            $table->string('product_lote')->comment('Lote del priducto');
            $table->foreignId('category_id')
            ->constrained('categories');
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
