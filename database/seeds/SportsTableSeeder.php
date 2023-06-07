<?php

use Illuminate\Database\Seeder;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete sports table records
        DB::table('sports')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');
        
        //insert some dummy records
        DB::table('sports')->insert(array(
          array(
            'sport' => 'Football',
            'created_at' => date("Y-m-d H:i:s"),
          ),
        ));
    }
}
