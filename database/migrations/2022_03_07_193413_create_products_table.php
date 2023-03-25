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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('Subcategory_id');
            $table->integer('SubSubCategory_id');
            $table->string('product_name_en');
            $table->string('product_name_ar');
            $table->string('product_slug_en');
            $table->string('product_slug_ar');
            $table->string('product_code');
            $table->string('product_amount');
            $table->string('product_tags_en');
            $table->string('product_tags_ar');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_ar')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_ar')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_des_en');
            $table->string('short_des_ar');
            $table->string('long_des_en');
            $table->string('long_des_ar');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('speacial_offer')->nullable();
            $table->integer('speacial_deals')->nullable();
            $table->integer('status')->default(0);
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
