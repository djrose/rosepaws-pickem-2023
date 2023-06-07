<?php

use Illuminate\Database\Seeder;

class TeamUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete team_users table records
        DB::table('team_users')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');

        //insert some dummy records
        DB::table('team_users')->insert(array(
          array('team_id'=>'2','user_id'=>'2','role'=>'owner'),
          array('team_id'=>'12','user_id'=>'2','role'=>'member'),
          array('team_id'=>'22','user_id'=>'2','role'=>'member'),
          array('team_id'=>'22','user_id'=>'12','role'=>'owner'),
          array('team_id'=>'2','user_id'=>'12','role'=>'member'),
          array('team_id'=>'12','user_id'=>'12','role'=>'member'),
        ));
    }
}
