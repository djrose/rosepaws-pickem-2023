<?php

use Illuminate\Database\Seeder;

class LiveFeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		Eloquent::unguard();
	   	// if( App::environment() === 'production' ) {
	        //delete games table records
	        DB::table('livefeeds')->delete();

	        DB::unprepared('SET @@auto_increment_increment=10;');
			DB::unprepared('SET @@auto_increment_offset=2;');



return redirect()->action('LiveFeedController@index');
			
dd("here at livefeeds");

	    //     //insert production records
	    //     DB::table('Livefeed')->insert(array(
	    //       array(        // Chiefs vs Patriots
	    //         'week_id' => '2', 'hometeam_id' => '152', 'awayteam_id' => '112', 'game_start' => '2017-09-07 17:30:00',
	    //         'home_score' => 27, 'away_score' => 42, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"), 
	    //       ),
	    //       array(       // Jets vs Bills
	    //         'week_id' => '2', 'hometeam_id' => '132', 'awayteam_id' => '142', 'game_start' => '2017-09-10 10:00:00',
	    //         'home_score' => 21, 'away_score' => 12, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"), 
	    //       ),

	    //    ));
	}
}
