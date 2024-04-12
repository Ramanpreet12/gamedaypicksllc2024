<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreekOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greek_order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('greek_order_id');
            $table->integer('greek_store_id');
            $table->string('product_title');
            $table->string('product_size');
            $table->string('age_group');
            $table->integer('zipcode');
            $table->string('product_jersy_name');
            $table->string('product_chapter_name');
            $table->string('product_line_number');
            $table->string('product_university_name');
            $table->integer('product_qty');
            $table->string('gender');
            $table->float('product_price');
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
        Schema::dropIfExists('greek_order_items');
    }
}
