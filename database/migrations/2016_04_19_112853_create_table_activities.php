<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('act_id');
            $table->string('act_name');
            $table->binary('act_discription')->nullable();
            $table->binary('act_rule')->nullable();
            $table->binary('act_prizes')->nullable();
            $table->integer('act_vote_upto');
            $table->integer('act_vote_atleast');
            $table->dateTime('act_start_time');
            $table->dateTime('act_stop_time');
            $table->integer('act_candidates_num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activities');
    }
}
