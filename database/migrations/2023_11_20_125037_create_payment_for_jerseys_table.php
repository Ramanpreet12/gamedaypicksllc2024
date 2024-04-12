<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentForJerseysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_for_jerseys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('season_id');
            $table->string('name');
            $table->text('address');
            $table->string('city');
            $table->string('zipcode');
            $table->string('country');
            $table->string('amount');
            $table->string('transaction_id');
            $table->string('payment_method');
            $table->string('status');
            $table->string('currency');
            $table->string('clover_payment_created_timestamp');
            $table->string('ref_num');
            $table->string('exp_month_card');
            $table->string('first6_digit_of_card');
            $table->string('last4_digit_of_card');
            $table->string('clover_payment_intiation_id');
            $table->string('exp_year_card');
          
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
        Schema::dropIfExists('payment_for_jerseys');
    }
}
