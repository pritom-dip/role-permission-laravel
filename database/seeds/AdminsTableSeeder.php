<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'name'		=> 'Admin User',
        	'username'	=> 'Admin',
        	'role_id'	=> '1',
        	'email'		=> 'admin@gmail.com',
        	'password'	=> bcrypt('12345678'),
        	'mobile'	=> '1234567890',
        	'address'   => 'Sylhet',
        	'image'		=> 'default.png',
        	'block'		=> false,
        	'status'	=> 'a'
        ]);
    }
}
