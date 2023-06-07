<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete divisions table records
        DB::table('divisions')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');
        
        //insert some dummy records
        DB::table('divisions')->insert(array(
          array(
            'division' => 'North',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'division' => 'South',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'division' => 'West',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'division' => 'East',
            'created_at' => date("Y-m-d H:i:s"),
          ),
        ));
    }
}
