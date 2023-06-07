<?php

use Illuminate\Database\Seeder;

class WeeksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete weeks table records
        DB::table('weeks')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');

        //insert some dummy records
        DB::table('weeks')->insert(array(
          array(
            'season_id' => '2',
            'week_number' => '1',
            'start_timestamp' => date("2017-9-7 17:30:00"),
            'end_timestamp' => date("2017-9-11 19:20:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '2',
            'start_timestamp' => date("2017-9-14 17:25:00"),
            'end_timestamp' => date("2017-9-18 17:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '3',
            'start_timestamp' => date("2017-9-21 17:25:00"),
            'end_timestamp' => date("2017-9-25 17:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '4',
            'start_timestamp' => date("2017-9-28 17:25:00"),
            'end_timestamp' => date("2017-10-2 17:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '5',
            'start_timestamp' => date("2017-10-5 17:25:00"),
            'end_timestamp' => date("2017-10-9 17:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '6',
            'start_timestamp' => date("2017-10-12 17:25:00"),
            'end_timestamp' => date("2017-10-16 17:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '7',
            'start_timestamp' => date("2017-10-19 17:25:00"),
            'end_timestamp' => date("2017-10-23 17:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '8',
            'start_timestamp' => date("2017-10-26 17:25:00"),
            'end_timestamp' => date("2017-10-30 17:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '9',
            'start_timestamp' => date("2017-11-2 17:25:00"),
            'end_timestamp' => date("2017-11-6 18:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '10',
            'start_timestamp' => date("2017-11-9 18:25:00"),
            'end_timestamp' => date("2017-11-13 18:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '11',
            'start_timestamp' => date("2017-11-16 18:25:00"),
            'end_timestamp' => date("2017-11-20 18:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '12',
            'start_timestamp' => date("2017-11-23 10:30:00"),
            'end_timestamp' => date("2017-11-27 18:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '13',
            'start_timestamp' => date("2017-11-30 18:25:00"),
            'end_timestamp' => date("2017-12-4 18:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '14',
            'start_timestamp' => date("2017-12-7 18:25:00"),
            'end_timestamp' => date("2017-12-11 18:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '15',
            'start_timestamp' => date("2017-12-14 18:25:00"),
            'end_timestamp' => date("2017-12-18 18:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '16',
            'start_timestamp' => date("2017-12-23 14:30:00"),
            'end_timestamp' => date("2017-12-25 18:30:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'season_id' => '2',
            'week_number' => '17',
            'start_timestamp' => date("2017-12-31 11:00:00"),
            'end_timestamp' => date("2017-12-31 14:25:00"),
            'created_at' => date("Y-m-d H:i:s"),
          ),
        ));
    }
}
