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
        DB::table('users')->delete();
     	DB::table('users')->insert([	
	        'name'     => 'Nirija Shrestha',
	        'username' => 'nirija',
	        'email'    => 'nirija.stha@gmail.com',
	        'password' => Hash::make('nirija'),
	    ]);
    }
}
