<?php

use Illuminate\Database\Seeder;

class RankingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if( App::environment() === 'production' ) {} else {
          //////////////////////////////////////////////////////
          //  The following is DEVELOPMENT data 
          /////////////////////////////////////////////////////
          //delete rankings table records
          DB::table('rankings')->delete();

          DB::unprepared('SET @@auto_increment_increment=10;');
          DB::unprepared('SET @@auto_increment_offset=2;');
        
          Eloquent::unguard();
          //insert some dummy records
          DB::table('rankings')->insert(array(
            array(
                'user_id' => '2',
                'week_id' => '2',
                'correct' => 10,
                'diff' => 3,
                'created_at' => date("Y-m-d H:i:s"),
            ),
            array(
                'user_id' => '2',
                'week_id' => '12',
                'correct' => 12,
                'diff' => 7,
                'created_at' => date("Y-m-d H:i:s"),
            ),
            array(
                'user_id' => '12',
                'week_id' => '2',
                'correct' => 14,
                'diff' => 6,
                'created_at' => date("Y-m-d H:i:s"),
            ),
            array(
                'user_id' => '12',
                'week_id' => '12',
                'correct' => 10,
                'diff' => 3,
                'created_at' => date("Y-m-d H:i:s"),
            ),
            array(
                'user_id' => '22',
                'week_id' => '2',
                'correct' => 6,
                'diff' => 10,
                'created_at' => date("Y-m-d H:i:s"),
            ),
            array(
                'user_id' => '22',
                'week_id' => '12',
                'correct' => 9,
                'diff' => 13,
                'created_at' => date("Y-m-d H:i:s"),
            ),
          ));
      }
    }
}
