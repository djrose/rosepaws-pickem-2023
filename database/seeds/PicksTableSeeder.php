<?php

use Illuminate\Database\Seeder;

class PicksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete picks table records
        DB::table('picks')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');

      if( App::environment() === 'production' ) {
      } else {
        /////////////////////////////////////////////////////////
        //  The following is DEVELOPMENT data
        ////////////////////////////////////////////////////////
        Eloquent::unguard();
        //insert some dummy records
        DB::table('picks')->insert(array(
          array(
            'user_id' => '2',
            'game_id' => '2',
            'club_id' => '112',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '2',
            'game_id' => '12',
            'club_id' => '142',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '2',
            'game_id' => '22',
            'club_id' => '72',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '12',
            'game_id' => '32',
            'club_id' => '2',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '12',
            'game_id' => '42',
            'club_id' => '242',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '12',
            'game_id' => '52',
            'club_id' => '232',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '22',
            'game_id' => '62',
            'club_id' => '222',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '22',
            'game_id' => '72',
            'club_id' => '82',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '22',
            'game_id' => '82',
            'club_id' => '12',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '32',
            'game_id' => '92',
            'club_id' => '302',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '32',
            'game_id' => '102',
            'club_id' => '42',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '32',
            'game_id' => '112',
            'club_id' => '202',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '32',
            'game_id' => '122',
            'club_id' => '272',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '42',
            'game_id' => '132',
            'club_id' => '292',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '42',
            'game_id' => '142',
            'club_id' => '212',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '42',
            'game_id' => '152',
            'club_id' => '102',
            'points' => '21',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '52',
            'game_id' => '2',
            'club_id' => '152',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '52',
            'game_id' => '12',
            'club_id' => '132',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '52',
            'game_id' => '22',
            'club_id' => '52',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '62',
            'game_id' => '32',
            'club_id' => '32',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '62',
            'game_id' => '42',
            'club_id' => '182',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '62',
            'game_id' => '52',
            'club_id' => '122',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '72',
            'game_id' => '62',
            'club_id' => '172',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '72',
            'game_id' => '72',
            'club_id' => '62',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '72',
            'game_id' => '82',
            'club_id' => '22',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '82',
            'game_id' => '102',
            'club_id' => '252',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '82',
            'game_id' => '112',
            'club_id' => '262',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '82',
            'game_id' => '152',
            'club_id' => '92',
            'points' => 24,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '92',
            'game_id' => '142',
            'club_id' => '192',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '92',
            'game_id' => '152',
            'club_id' => '92',
            'points' => '35',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '102',
            'game_id' => '2',
            'club_id' => '152',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '102',
            'game_id' => '12',
            'club_id' => '142',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '102',
            'game_id' => '82',
            'club_id' => '22',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '102',
            'game_id' => '152',
            'club_id' => '92',
            'points' => '45',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '132',
            'game_id' => '2',
            'club_id' => '152',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '132',
            'game_id' => '12',
            'club_id' => '142',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '132',
            'game_id' => '82',
            'club_id' => '22',
            'points' => null,
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'user_id' => '132',
            'game_id' => '152',
            'club_id' => '92',
            'points' => '24',
            'created_at' => date("Y-m-d H:i:s"),
          ),
       ));
      }
    }
}
