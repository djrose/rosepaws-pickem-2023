<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete teams table records
        DB::table('teams')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');

        //insert some dummy records
        DB::table('teams')->insert(array(
          array('owner_id'=>'2','name'=>'Rosepaws', 'created_at' => date('Y-m-d H:i:s')),
          array('owner_id'=>'12','name'=>'Rose Family', 'created_at' => date('Y-m-d H:i:s')),

          array('owner_id'=>'32','name'=>'Evans Family', 'created_at' => date('Y-m-d H:i:s')),
        ));
    }
}
