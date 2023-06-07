<?php

use Illuminate\Database\Seeder;

class CalculationsTableSeeder extends Seeder
{
	protected $attributes = array(
        'winning_users' => '{}'
    );


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( App::environment() === 'production' ) {} else {
            /////////////////////////////////////////////////////
            //  The following is DEVELOPMENT data
            ////////////////////////////////////////////////////
            //delete calculations table records
            DB::table('calculations')->delete();

            DB::unprepared('SET @@auto_increment_increment=10;');
            DB::unprepared('SET @@auto_increment_offset=2;');

            Eloquent::unguard();
        
            //insert some dummy records
            DB::table('calculations')->insert(array(
              array(
                'week_id' => '2',
                'correct' => '3',
                'winning_users' => '{"users": "82|132"}',
                'created_at' => date("Y-m-d H:i:s"),
              ),
              array(
                'week_id' => '12',
                'correct' => '4',
                'winning_users' => '{"users": "2"}',
                'created_at' => date("Y-m-d H:i:s"),
              ),
           ));
        }
    }
}
