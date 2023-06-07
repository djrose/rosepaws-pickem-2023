<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete seasons table records
        DB::table('seasons')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');

        //insert some dummy records
        DB::table('seasons')->insert(array(
          array(
            'sport_id' => '2',
            'season_start' => date("2017-9-7 17:30:00"),
            'season_end' => date("2017-12-31 14:25:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
        ));
    }
}
