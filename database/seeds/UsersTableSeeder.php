<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        if( App::environment() === 'production' ) {

          //delete users table records
          DB::table('users')->delete();

          DB::unprepared('SET @@auto_increment_increment=10;');
          DB::unprepared('SET @@auto_increment_offset=2;');

          //insert some dummy records
          DB::table('users')->insert(array(
            array('name'=>'Steven Rose','email'=>'StevenR511@gmail.com','password'=>bcrypt('Stanley#1'), 'created_at' => date('Y-m-d H:i:s'),
            ),
            array('name'=>'Jennifer Rose','email'=>'Jennifer.cannon.rose@gmail.com','password'=>bcrypt('Babyd0llcvt'), 'created_at' => date('Y-m-d H:i:s'),
            ),
            array('name'=>'Donna Rose','email'=>'djrose1176@gmail.com','password'=>bcrypt('m1n3m1n3'), 'created_at' => date('Y-m-d H:i:s'),
            ),

            array('name'=>'David Evans','email'=>'david.evans@bsstech.com','password'=>bcrypt('pars3cs'), 'created_at' => date('Y-m-d H:i:s'),
            ),
          )); 
        } else {

          DB::table('users')->delete();

          DB::unprepared('SET @@auto_increment_increment=10;');
          DB::unprepared('SET @@auto_increment_offset=2;');

          //insert some dummy records
          DB::table('users')->insert(array(
            array('name'=>'Steven Rose','email'=>'StevenR511@gmail.com','password'=>bcrypt('Stanley#1'), 'created_at' => date('Y-m-d H:i:s'),
            ),
            array('name'=>'Jennifer Rose','email'=>'Jennifer.cannon.rose@gmail.com','password'=>bcrypt('Babyd0llcvt'), 'created_at' => date('Y-m-d H:i:s'),
            ),
            array('name'=>'Donna Rose','email'=>'djrose1176@gmail.com','password'=>bcrypt('m1n3m1n3'), 'created_at' => date('Y-m-d H:i:s'),
            ),
            array('name'=>'David Evans','email'=>'david.evans@bsstech.com','password'=>bcrypt('pars3cs'), 'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
              'name' => 'user 42', 
              'email' => 'user42@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
            ),
            array(
              'name' => 'user 52', 
              'email' => 'user52@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
            ),
            array(
              'name' => 'user 62', 
              'email' => 'user62@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
            ),
            array(
              'name' => 'user 72', 
              'email' => 'user72@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
            ),
            array(
              'name' => 'user 82', 
              'email' => 'user82@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
            ),
            array(
              'name' => 'user 92', 
              'email' => 'user92@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
            ),
            array(
              'name' => 'user 102', 
              'email' => 'user102@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
              ),
            array(
              'name' => 'user 112', 
              'email' => 'user112@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
              ),
            array(
              'name' => 'user 122', 
              'email' => 'user122@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
              ),
            array(
              'name' => 'user 132', 
              'email' => 'user132@gmail.com',
              'password' => bcrypt('secret'),
              'created_at' => date('Y-m-d H:i:s'),
              ),
          )); 
        }
    }
}
