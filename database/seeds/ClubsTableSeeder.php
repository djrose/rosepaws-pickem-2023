<?php

use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete clubs table records
        DB::table('clubs')->delete();

        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');

        //insert some dummy records
        DB::table('clubs')->insert(array(
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '2',
            'team' => 'Steelers',
            'initials' => 'PIT',
            'city' => 'Pittsburgh',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '2',
            'team' => 'Ravens',
            'initials' => 'BAL',
            'city' => 'Baltimore',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '2',
            'team' => 'Bengals',
            'initials' => 'CIN',
            'city' => 'Cincinnati',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '2',
            'team' => 'Browns',
            'initials' => 'CLE',
            'city' => 'Cleveland',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '12',
            'team' => 'Colts',
            'initials' => 'IND',
            'city' => 'Indianapolis',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '12',
            'team' => 'Texans',
            'initials' => 'HOU',
            'city' => 'Houston',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '12',
            'team' => 'Titans',
            'initials' => 'TEN',
            'city' => 'Tennessee',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '12',
            'team' => 'Jaguars',
            'initials' => 'JAX',
            'city' => 'Jacksonville',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '22',
            'team' => 'Raiders',
            'initials' => 'OAK',
            'city' => 'Oakland',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '22',
            'team' => 'Broncos',
            'initials' => 'DEN',
            'city' => 'Denver',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '22',
            'team' => 'Chargers',
            'initials' => 'LAC',
            'city' => 'Los Angeles',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '22',
            'team' => 'Chiefs',
            'initials' => 'KC',
            'city' => 'Kansas City',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '32',
            'team' => 'Dolphins',
            'initials' => 'MIA',
            'city' => 'Miami',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '32',
            'team' => 'Bills',
            'initials' => 'BUF',
            'city' => 'Buffalo',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '32',
            'team' => 'Jets',
            'initials' => 'NYJ',
            'city' => 'New York',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '2',
            'division_id' => '32',
            'team' => 'Patriots',
            'initials' => 'NE',
            'city' => 'New England',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '2',
            'team' => 'Packers',
            'initials' => 'GB',
            'city' => 'Green Bay',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '2',
            'team' => 'Bears',
            'initials' => 'CHI',
            'city' => 'Chicago',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '2',
            'team' => 'Lions',
            'initials' => 'DET',
            'city' => 'Detroit',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '2',
            'team' => 'Vikings',
            'initials' => 'MIN',
            'city' => 'Minnesota',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '12',
            'team' => 'Panthers',
            'initials' => 'CAR',
            'city' => 'Carolina',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '12',
            'team' => 'Saints',
            'initials' => 'NO',
            'city' => 'New Orleans',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '12',
            'team' => 'Falcons',
            'initials' => 'ATL',
            'city' => 'Atlanta',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '12',
            'team' => 'Buccaneers',
            'initials' => 'TB',
            'city' => 'Tampa Bay',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '22',
            'team' => 'Cardinals',
            'initials' => 'ARI',
            'city' => 'Arizona',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '22',
            'team' => 'Rams',
            'initials' => 'LAR',
            'city' => 'Los Angeles',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '22',
            'team' => '49ers',
            'initials' => 'SF',
            'city' => 'San Francisco',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '22',
            'team' => 'Seahawks',
            'initials' => 'SEA',
            'city' => 'Seattle',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '32',
            'team' => 'Redskins',
            'initials' => 'WAS',
            'city' => 'Washington',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '32',
            'team' => 'Giants',
            'initials' => 'NYG',
            'city' => 'New York',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '32',
            'team' => 'Eagles',
            'initials' => 'PHI',
            'city' => 'Philadelphia',
            'created_at' => date("Y-m-d H:i:s"),
          ),
          array(
            'sport_id' => '2',
            'conference_id' => '12',
            'division_id' => '32',
            'team' => 'Cowboys',
            'initials' => 'DAL',
            'city' => 'Dallas',
            'created_at' => date("Y-m-d H:i:s"),
          ),
        ));
    }
}