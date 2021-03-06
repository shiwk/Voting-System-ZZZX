<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('create table votes(
                        user_openid varchar(255) references users(user_openid) on update cascade,
                        can_id bigint unsigned,
                        act_id bigint unsigned,
                        foreign key (can_id) references candidates(can_id) on update cascade,
                        foreign key (act_id) references activities(act_id) on update cascade,                                             
                        constraint primary key (user_openid, can_id, act_id)
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
        Schema::drop('votes');
    }
}
