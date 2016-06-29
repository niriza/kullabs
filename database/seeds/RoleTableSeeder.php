<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
     	DB::table('roles')->insert([
     		['role_name'     => 'Super Admin'],
     		['role_name'     => 'Data Entry'],
     		['role_name'     => 'School Admin'],
     		['role_name'     => 'Sponser'],
     		['role_name'     => 'Marketing Team'],
     		['role_name'     => 'View Auth Only']
	    ]);
    }
}
