<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'name'		=> 'Super Admin',
        	'guard'		=> 'admin'
        ]);

        DB::table('roles')->insert([
        	'name'		=> 'Admin',
        	'guard'		=> 'admin'
        ]);
    }
}
