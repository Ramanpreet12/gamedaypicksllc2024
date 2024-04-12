<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_results', function (Blueprint $table) {
            $table->id();

            $table->string('team1_id');
            $table->string('team2_id');
            $table->string('team1_score');
            $table->string('team2_score');
            $table->string('win')->nullable();
            $table->string('loss')->nullable();
            $table->enum('status' , ['active' , 'inactive']);
            $table->enum('result_status' , ['win' , 'loss']);
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
        Schema::dropIfExists('team_results');
    }
}
