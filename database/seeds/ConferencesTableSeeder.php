<?php

use Illuminate\Database\Seeder;

class ConferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete conferences table records
        DB::table('conferences')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');
        
        //insert some dummy records
        DB::table('conferences')->insert(array(
          array(
            'conference' => 'American',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'conference' => 'National',
            'created_at' => date("Y-m-d H:i:s"),
          ),
        ));
    }
}
