<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('activities')->insert([
            'act_id' => 1,
            'act_name' => '测试投票',
            'act_discription' => '这是测试投票的介绍。',
            'act_rule' => '这是测试投票的规则。',
            'act_prizes' => '这是测试投票的奖品简介。',
            'act_candidate_num' => 5,
            'act_vote_upto' => 3,
            'act_vote_atleast' => 2,
            'act_start_time' => '2016-04-20-14-25-30',
            'act_stop_time' => '2016-04-30-14-25-30',
            'act_view_statistics' => 0,
        ]);

        DB::table('admins')->insert([
			'admin_id' => 1,
			'admin_username' => 'admin',
			'admin_password' => 'password',
        ]);

        DB::table('candidates')->insert([
        	'can_id' => 1,
        	'act_id' => 1,
        	'can_name' => '冯定文',
        	'can_discription' => '这是冯定文的自我介绍，巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉。',
        ]);
        DB::table('candidates')->insert([
        	'can_id' => 2,
        	'act_id' => 1,
        	'can_name' => '朱思翰',
        	'can_discription' => '这是朱思翰的自我介绍，巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉。',
        ]);
        DB::table('candidates')->insert([
        	'can_id' => 3,
        	'act_id' => 1,
        	'can_name' => '高应磊',
        	'can_discription' => '这是高应磊的自我介绍，巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉。',
        ]);
        DB::table('candidates')->insert([
        	'can_id' => 4,
        	'act_id' => 1,
        	'can_name' => '石文凯',
        	'can_discription' => '这是石文凯的自我介绍，巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉。',
        ]);
        DB::table('candidates')->insert([
        	'can_id' => 5,
        	'act_id' => 1,
        	'can_name' => '张洁',
        	'can_discription' => '这是张洁的自我介绍，巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉巴拉。',
        ]);

        DB::table('accesstoken')->insert([
            'accesstoken_id' => 1,
            'access_token' => '',
        ]);                                                      
    }
}
