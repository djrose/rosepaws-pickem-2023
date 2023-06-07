<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TeamUsersTableSeeder::class);
        $this->call(SportsTableSeeder::class);
        $this->call(ConferencesTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(ClubsTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);
        $this->call(WeeksTableSeeder::class);
        $this->call(GamesTableSeeder::class);
        $this->call(PicksTableSeeder::class);
        $this->call(CalculationsTableSeeder::class);
        $this->call(RankingsTableSeeder::class);
        $this->call(LiveFeedsTableSeeder::class);    
    }
}
