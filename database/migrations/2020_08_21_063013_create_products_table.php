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
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->decimal('price')->default(0);
            $table->decimal('sale_price', 12, 2)->default(0);
            $table->decimal('discound', 12, 2)->default(0); // tinh % 
            $table->string('image', 255)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_keyword')->nullable();
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
