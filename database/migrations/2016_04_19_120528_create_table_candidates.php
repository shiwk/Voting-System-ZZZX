<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('candidates', function (Blueprint $table) {
        //     $table->bigIncrements('can_id');
        //     $table->bigInteger('act_id');
        //     $table->dropPrimary('can_id');
        //     $table->primary(['can_id','act_id']);
        //     $table->foreign('act_id')->references('act_id')->on('activites')->onUpdate('cascade');
        //     $table->binary('can_discription');
        //     $table->string('can_name');
        //     $table->binary('can_imgge_url');
        //     $table->string('can_school');
        //     $table->string('can_student_id');
        // });

        DB::statement('create table candidates(
                        can_id bigint unsigned auto_increment not null,
                        act_id bigint unsigned not null,
                        can_discription blob,
                        can_name varchar(255) not null,
                        can_image_url varchar(255),
                        can_school varchar(255),
                        can_student_id varchar(255),
                        foreign key (act_id) references activities(act_id) on update cascade,
                        constraint primary key (can_id, act_id)
                        );'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('candidates');
    }
}
