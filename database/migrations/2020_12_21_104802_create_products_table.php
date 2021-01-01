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
            $table->integer('subcategory_id'); 
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->float('product_price');
            $table->float('product_bundle');
            $table->string('product_packing');
            $table->string('product_color');
            $table->string('url');
            $table->float('product_weight')->nullable();
            $table->string('main_image')->nullable();
            $table->text('description')->nullable();
            $table->enum('is_featured',['No','Yes']);
            $table->tinyInteger('status');
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
