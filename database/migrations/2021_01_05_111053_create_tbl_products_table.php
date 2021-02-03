<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('products_id'); 
            $table->string('products_name'); 
            $table->integer('category_id'); 
            $table->integer('brands_id'); 
            $table->longText('products_short_description'); 
            $table->longText('products_long_description'); 
            $table->float('products_price'); 
            $table->string('products_image'); 
            $table->string('products_size'); 
            $table->string('products_color'); 
            $table->integer('products_status');
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
        Schema::dropIfExists('tbl_products');
    }
}
