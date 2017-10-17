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
        //
        DB::table('users')->insert([
           'name' => 'Meir',
           'role_id'=>'1',
           'is_active'=>'1',
           'email' => 'meir@gmail.com',
           'password' => bcrypt('123456')
       ]);
       DB::table('users')->insert([
        'name' => 'Shlomo',
        'role_id'=>'1',
        'is_active'=>'1',
        'email' => 'shlomo@gmail.com',
        'password' => bcrypt('123456')
      ]);
    }
}
