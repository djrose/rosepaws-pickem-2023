<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
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
	        DB::table('games')->delete();

	        DB::unprepared('SET @@auto_increment_increment=10;');
	        DB::unprepared('SET @@auto_increment_offset=2;');

	        //insert production records
	        DB::table('games')->insert(array(
	          array(        // Chiefs vs Patriots
	            'week_id' => '2', 'hometeam_id' => '152', 'awayteam_id' => '112', 'game_start' => '2017-09-07 17:30:00',
	            'home_score' => 27, 'away_score' => 42, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"), 
	          ),
	          array(       // Jets vs Bills
	            'week_id' => '2', 'hometeam_id' => '132', 'awayteam_id' => '142', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 21, 'away_score' => 12, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"), 
	          ),
	          array(       // Jaguars vs Texans
	            'week_id' => '2', 'hometeam_id' => '52', 'awayteam_id' => '72', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 7, 'away_score' => 29, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Steelers vs Browns
	            'week_id' => '2', 'hometeam_id' => '32', 'awayteam_id' => '2', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 18, 'away_score' => 21, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Cardinals vs Lions
	            'week_id' => '2', 'hometeam_id' => '182', 'awayteam_id' => '242', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 35, 'away_score' => 23, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Buccaneers vs Dolphins
	            'week_id' => '2', 'hometeam_id' => '122', 'awayteam_id' => '232', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Falcons vs Bears
	            'week_id' => '2', 'hometeam_id' => '172', 'awayteam_id' => '222', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 17, 'away_score' => 23, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Raiders vs Titans
	            'week_id' => '2', 'hometeam_id' => '62', 'awayteam_id' => '82', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 16, 'away_score' => 26, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Ravens vs Bengals
	            'week_id' => '2', 'hometeam_id' => '22', 'awayteam_id' => '12', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 0, 'away_score' => 20, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Eagles vs Redskins
	            'week_id' => '2', 'hometeam_id' => '282', 'awayteam_id' => '302', 'game_start' => '2017-09-10 10:00:00',
	            'home_score' => 17, 'away_score' => 30, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Colts vs Rams
	            'week_id' => '2', 'hometeam_id' => '252', 'awayteam_id' => '42', 'game_start' => '2017-09-10 13:05:00',
	            'home_score' => 46, 'away_score' => 9, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Panthers vs 49ers
	            'week_id' => '2', 'hometeam_id' => '262', 'awayteam_id' => '202', 'game_start' => '2017-09-10 13:25:00',
	            'home_score' => 3, 'away_score' => 23, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Seahawks vs Packers
	            'week_id' => '2', 'hometeam_id' => '162', 'awayteam_id' => '272', 'game_start' => '2017-09-10 13:25:00',
	            'home_score' => 17, 'away_score' => 9, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Giants vs Cowboys
	            'week_id' => '2', 'hometeam_id' => '312', 'awayteam_id' => '292', 'game_start' => '2017-09-10 17:30:00',
	            'home_score' => 19, 'away_score' => 3, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Saints vs Vikings
	            'week_id' => '2', 'hometeam_id' => '192', 'awayteam_id' => '212', 'game_start' => '2017-09-11 16:10:00',
	            'home_score' => 29, 'away_score' => 19, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Chargers vs Broncos
	            'week_id' => '2', 'hometeam_id' => '92', 'awayteam_id' => '102', 'game_start' => '2017-09-11 19:20:00',
	            'home_score' => 24, 'away_score' => 21, 'tiebreaker' => 1, 'created_at' => date("Y-m-d H:i:s"),
	          ),

	          //---------------------------------------------
	          //  Week 2
	          //---------------------------------------------
	          array(      // Texans vs Bengals
	            'week_id' => '12', 'hometeam_id' => '22', 'awayteam_id' => '52', 'game_start' => '2017-09-14 17:25:00',
	            'home_score' => 9, 'away_score' => 13, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ), 
	          array(      // Bills vs Panthers
	            'week_id' => '12', 'hometeam_id' => '202', 'awayteam_id' => '132', 'game_start' => '2017-09-17 10:00:00',
	            'home_score' => 9, 'away_score' => 3, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),   
	          array(      // Bears vs Buccaneers
	            'week_id' => '12', 'hometeam_id' => '232', 'awayteam_id' => '172', 'game_start' => '2017-09-17 10:00:00',
	            'home_score' => 29, 'away_score' => 7, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),                    
	          array(      // Vikings vs Steelers
	            'week_id' => '12', 'hometeam_id' => '2', 'awayteam_id' => '192', 'game_start' => '2017-09-17 10:00:00',
	            'home_score' => 26, 'away_score' => 9, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),             
	          array(      // Cardinals vs Colts
	             'week_id' => '12', 'hometeam_id' => '42', 'awayteam_id' => '242', 'game_start' => '2017-09-17 10:00:00',
	             'home_score' => 13, 'away_score' => 16, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	           ),
	          array(      // Patriots vs Saints
	            'week_id' => '12', 'hometeam_id' => '212', 'awayteam_id' => '152', 'game_start' => '2017-09-17 10:00:00',
	            'home_score' => 20, 'away_score' => 36, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),              
	          array(      // Browns vs Ravens
	             'week_id' => '12', 'hometeam_id' => '12', 'awayteam_id' => '92', 'game_start' => '2017-09-17 10:00:00',
	             'home_score' => 24, 'away_score' => 10, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Eagles vs Chiefs
	              'week_id' => '12', 'hometeam_id' => '112', 'awayteam_id' => '302', 'game_start' => '2017-09-17 10:00:00',
	              'home_score' => 27, 'away_score' => 20, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ), 
	          array(      // Titans vs Jaguars
	              'week_id' => '12', 'hometeam_id' => '72', 'awayteam_id' => '62', 'game_start' => '2017-09-17 10:00:00',
	              'home_score' => 16, 'away_score' => 37, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),     
	          array(      // Jets vs Raiders
	              'week_id' => '12', 'hometeam_id' => '82', 'awayteam_id' => '142', 'game_start' => '2017-09-17 13:05:00',
	              'home_score' => 45, 'away_score' => 20, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Dolphins vs Chargers 
	              'week_id' => '12', 'hometeam_id' => '102', 'awayteam_id' => '122', 'game_start' => '2017-09-17 13:05:00',
	              'home_score' => 17, 'away_score' => 19, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),          
	          array(      // Cowboys vs Broncos
	              'week_id' => '12', 'hometeam_id' => '92', 'awayteam_id' => '312', 'game_start' => '2017-09-17 13:25:00',
	              'home_score' => 42, 'away_score' => 17, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // 49ers vs Seahawks
	              'week_id' => '12', 'hometeam_id' => '272', 'awayteam_id' => '262', 'game_start' => '2017-09-17 13:25:00',
	              'home_score' => 12, 'away_score' => 9, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),    
	          array(      // Redskins vs Rams
	              'week_id' => '12','hometeam_id' => '252','awayteam_id' => '282', 'game_start' => '2017-09-17 13:25:00',
	              'home_score' => 20, 'away_score' => 27, 'tiebreaker' => null,  'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Packers vs Falcons
	              'week_id' => '12', 'hometeam_id' => '222', 'awayteam_id' => '162', 'game_start' => '2017-09-17 17:30:00',
	              'home_score' => 34, 'away_score' => 23, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Lions vs Giants
	              'week_id' => '12', 'hometeam_id' => '292', 'awayteam_id' => '182', 'game_start' => '2017-09-18 17:30:00',
	              'home_score' => 10, 'away_score' => 24, 'tiebreaker' => 1, 'created_at' => date("Y-m-d H:i:s"),
	          ),

	          //---------------------------------------------
	          //  Week 3
	          //---------------------------------------------
	          array(      //  Rams vs 49ers
	            'week_id' => '22', 'hometeam_id' => '262', 'awayteam_id' => '252', 'game_start' => '2017-09-21 17:25:00',
	            'home_score' => 39, 'away_score' => 41, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Ravens vs Jaguars
	            'week_id' => '22', 'hometeam_id' => '72', 'awayteam_id' => '12', 'game_start' => '2017-09-24 06:30:00',
	            'home_score' => 44, 'away_score' => 7, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Browns vs Colts
	            'week_id' => '22', 'hometeam_id' => '42', 'awayteam_id' => '32', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 31, 'away_score' => 28, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Giants vs Eagles
	            'week_id' => '22', 'hometeam_id' => '302', 'awayteam_id' => '292', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 27, 'away_score' => 24, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Dolphins vs Jets
	            'week_id' => '22', 'hometeam_id' => '142', 'awayteam_id' => '122', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 20, 'away_score' => 6, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Broncos vs Bills
	            'week_id' => '22', 'hometeam_id' => '132', 'awayteam_id' => '92', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 26, 'away_score' => 16, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Saints vs Panthers
	            'week_id' => '22', 'hometeam_id' => '202', 'awayteam_id' => '212', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 13, 'away_score' => 34, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Steelers vs Bears
	            'week_id' => '22', 'hometeam_id' => '172', 'awayteam_id' => '2', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 23, 'away_score' => 17, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Falcons vs Lions
	            'week_id' => '22', 'hometeam_id' => '182', 'awayteam_id' => '222', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 26, 'away_score' => 30, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Bucs vs Vikings
	            'week_id' => '22', 'hometeam_id' => '192', 'awayteam_id' => '232', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 17, 'away_score' => 34, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Texans vs Patriots
	            'week_id' => '22', 'hometeam_id' => '152', 'awayteam_id' => '52', 'game_start' => '2017-09-24 10:00:00',
	            'home_score' => 36, 'away_score' => 33, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Seahawks vs Titans
	            'week_id' => '22', 'hometeam_id' => '62', 'awayteam_id' => '272', 'game_start' => '2017-09-24 13:05:00',
	            'home_score' => 33, 'away_score' => 27, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Bengals vs Packers
	            'week_id' => '22', 'hometeam_id' => '162', 'awayteam_id' => '22', 'game_start' => '2017-09-24 13:25:00',
	            'home_score' => 27, 'away_score' => 24, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Chiefs vs Chargers
	            'week_id' => '22', 'hometeam_id' => '102', 'awayteam_id' => '112', 'game_start' => '2017-09-24 13:25:00',
	            'home_score' => 10, 'away_score' => 24, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Raiders vs Redskins
	            'week_id' => '22', 'hometeam_id' => '282', 'awayteam_id' => '82', 'game_start' => '2017-09-24 17:30:00',
	            'home_score' => 27, 'away_score' => 10, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Cowboys vs Cardinals
	            'week_id' => '22', 'hometeam_id' => '242', 'awayteam_id' => '312', 'game_start' => '2017-09-25 17:30:00',
	            'home_score' => 17, 'away_score' => 28, 'tiebreaker' => 1, 'created_at' => date("Y-m-d H:i:s"),
	          ),

	          //---------------------------------------------
	          //  Week 4 
	          //---------------------------------------------
	          array(      //  Bears vs Packers
	            'week_id' => '32', 'hometeam_id' => '162', 'awayteam_id' => '172', 'game_start' => '2017-09-28 17:25:00',
	            'home_score' => 35, 'away_score' => 14, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Saints vs Dolphins
	            'week_id' => '32', 'hometeam_id' => '122', 'awayteam_id' => '212', 'game_start' => '2017-10-01 06:30:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Titans vs Texans
	            'week_id' => '32', 'hometeam_id' => '52', 'awayteam_id' => '62', 'game_start' => '2017-10-01 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Jaguars vs Jets
	            'week_id' => '32', 'hometeam_id' => '142', 'awayteam_id' => '72', 'game_start' => '2017-10-01 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Panthers vs Patriots
	            'week_id' => '32', 'hometeam_id' => '152', 'awayteam_id' => '202', 'game_start' => '2017-10-01 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Lions vs Vikings
	            'week_id' => '32', 'hometeam_id' => '192', 'awayteam_id' => '182', 'game_start' => '2017-10-01 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Bills vs Falcons
	            'week_id' => '32', 'hometeam_id' => '222', 'awayteam_id' => '132', 'game_start' => '2017-10-01 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Steelers vs Ravens
	            'week_id' => '32', 'hometeam_id' => '12', 'awayteam_id' => '2', 'game_start' => '2017-10-01 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Bengals vs Browns
	            'week_id' => '32', 'hometeam_id' => '32', 'awayteam_id' => '22', 'game_start' => '2017-10-01 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Rams vs Cowboys
	            'week_id' => '32', 'hometeam_id' => '312', 'awayteam_id' => '252', 'game_start' => '2017-10-01 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Eagles vs Chargers
	            'week_id' => '32', 'hometeam_id' => '102', 'awayteam_id' => '302', 'game_start' => '2017-10-01 13:05:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Giants vs Bucs
	            'week_id' => '32', 'hometeam_id' => '232', 'awayteam_id' => '292', 'game_start' => '2017-10-01 13:05:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // 49ers vs Cardinals
	            'week_id' => '32', 'hometeam_id' => '242', 'awayteam_id' => '262', 'game_start' => '2017-10-01 13:05:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Raiders vs Broncos
	            'week_id' => '32', 'hometeam_id' => '92', 'awayteam_id' => '82', 'game_start' => '2017-10-01 13:25:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Colts vs Seahawks
	            'week_id' => '32', 'hometeam_id' => '272', 'awayteam_id' => '42', 'game_start' => '2017-10-01 17:30:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Redskins vs Chiefs
	            'week_id' => '32', 'hometeam_id' => '112', 'awayteam_id' => '282', 'game_start' => '2017-10-02 17:30:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => 1, 'created_at' => date("Y-m-d H:i:s"),
	          ),

	          //---------------------------------------------
	          //  Week 5
	          //---------------------------------------------
	          array(      //  Patriots vs Bucs
	            'week_id' => '42', 'hometeam_id' => '232', 'awayteam_id' => '152', 'game_start' => '2017-10-05 17:25:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	         array(      // Jets vs Browns
	            'week_id' => '42', 'hometeam_id' => '32', 'awayteam_id' => '142', 'game_start' => '2017-10-08 06:30:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Panthers vs Lions
	            'week_id' => '42', 'hometeam_id' => '182', 'awayteam_id' => '202', 'game_start' => '2017-10-08 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // 49ers vs Colts
	            'week_id' => '42', 'hometeam_id' => '262', 'awayteam_id' => '42', 'game_start' => '2017-10-08 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Titans vs Dolphins
	            'week_id' => '42', 'hometeam_id' => '122', 'awayteam_id' => '62', 'game_start' => '2017-10-08 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Bills vs Bengals
	            'week_id' => '42', 'hometeam_id' => '22', 'awayteam_id' => '132', 'game_start' => '2017-10-08 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Chargers vs Giants
	            'week_id' => '42', 'hometeam_id' => '292', 'awayteam_id' => '102', 'game_start' => '2017-10-08 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Jaguars vs Steelers
	            'week_id' => '42', 'hometeam_id' => '2', 'awayteam_id' => '72', 'game_start' => '2017-10-08 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Cardinals vs Eagles
	            'week_id' => '42', 'hometeam_id' => '302', 'awayteam_id' => '242', 'game_start' => '2017-10-08 10:00:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Seahawks vs Rams
	            'week_id' => '42', 'hometeam_id' => '252', 'awayteam_id' => '272', 'game_start' => '2017-10-08 13:05:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Ravens vs Raiders
	            'week_id' => '42', 'hometeam_id' => '82', 'awayteam_id' => '12', 'game_start' => '2017-10-08 13:05:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Packers vs Cowboys
	            'week_id' => '42', 'hometeam_id' => '312', 'awayteam_id' => '162', 'game_start' => '2017-10-08 13:25:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Chiefs vs Texans
	            'week_id' => '42', 'hometeam_id' => '52', 'awayteam_id' => '112', 'game_start' => '2017-10-08 17:30:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Vikings vs Bears
	            'week_id' => '42', 'hometeam_id' => '172', 'awayteam_id' => '192', 'game_start' => '2017-10-09 17:30:00',
	            'home_score' => 0, 'away_score' => 0, 'tiebreaker' => 1, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          //---------------------------------------------
	          //  Week 17
	          //---------------------------------------------
	          array(      //  Green Bay vs Detroit
	            'week_id' => '162', 'hometeam_id' => '182', 'awayteam_id' => '162', 'game_start' => '2017-12-31 11:00:00',
	            'home_score' => 35, 'away_score' => 11, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	         array(      // Houston vs Indianapolis
	            'week_id' => '162', 'hometeam_id' => '42', 'awayteam_id' => '52', 'game_start' => '2017-12-31 11:00:00',
	            'home_score' => 22, 'away_score' => 13, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Chicago vs Minnesota
	            'week_id' => '162', 'hometeam_id' => '192', 'awayteam_id' => '172', 'game_start' => '2017-12-31 11:00:00',
	            'home_score' => 23, 'away_score' => 10, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // New York Jets vs New England
	            'week_id' => '162', 'hometeam_id' => '152', 'awayteam_id' => '142', 'game_start' => '2017-12-31 11:00:00',
	            'home_score' => 26, 'away_score' => 6, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Washington vs New York Giants
	            'week_id' => '162', 'hometeam_id' => '292', 'awayteam_id' => '282', 'game_start' => '2017-12-31 11:00:00',
	            'home_score' => 18, 'away_score' => 10, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Dallas vs Philadelphia
	            'week_id' => '162', 'hometeam_id' => '302', 'awayteam_id' => '312', 'game_start' => '2017-12-31 11:00:00',
	            'home_score' => 0, 'away_score' => 6, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Cleveland vs Pittsburgh
	            'week_id' => '162', 'hometeam_id' => '2', 'awayteam_id' => '32', 'game_start' => '2017-12-31 11:00:00',
	            'home_score' => 28, 'away_score' => 24, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Carolina vs Atlanta
	            'week_id' => '162', 'hometeam_id' => '222', 'awayteam_id' => '202', 'game_start' => '2017-12-31 11:00:00',
	            'home_score' => 22, 'away_score' => 10, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Kansas City vs Denver
	            'week_id' => '162', 'hometeam_id' => '92', 'awayteam_id' => '112', 'game_start' => '2017-12-31 14:25:00',
	            'home_score' => 24, 'away_score' => 27, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Jacksonville vs Tennessee
	            'week_id' => '162', 'hometeam_id' => '62', 'awayteam_id' => '72', 'game_start' => '2017-12-31 14:25:00',
	            'home_score' => 15, 'away_score' => 10, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // San Francisco vs Los Angeles Rams
	            'week_id' => '162', 'hometeam_id' => '252', 'awayteam_id' => '262', 'game_start' => '2017-12-31 14:25:00',
	            'home_score' => 13, 'away_score' => 34, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Buffalo vs Miami
	            'week_id' => '162', 'hometeam_id' => '122', 'awayteam_id' => '132', 'game_start' => '2017-12-31 14:25:00',
	            'home_score' => 16, 'away_score' => 22, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(       // Oakland vs Los Angeles Chargers
	            'week_id' => '162', 'hometeam_id' => '102', 'awayteam_id' => '82', 'game_start' => '2017-12-31 14:25:00',
	            'home_score' => 30, 'away_score' => 10, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Arizona vs Seattle
	            'week_id' => '162', 'hometeam_id' => '272', 'awayteam_id' => '242', 'game_start' => '2017-12-31 14:25:00',
	            'home_score' => 24, 'away_score' => 26, 'tiebreaker' => 1, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // New Orleans vs Tampa Bay
	            'week_id' => '162', 'hometeam_id' => '232', 'awayteam_id' => '212', 'game_start' => '2017-12-31 14:25:00',
	            'home_score' => 31, 'away_score' => 24, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	          array(      // Cincinnati vs Baltimore
	            'week_id' => '162', 'hometeam_id' => '12', 'awayteam_id' => '22', 'game_start' => '2017-12-31 14:25:00',
	            'home_score' => 27, 'away_score' => 31, 'tiebreaker' => null, 'created_at' => date("Y-m-d H:i:s"),
	          ),
	       ));
	}
}
