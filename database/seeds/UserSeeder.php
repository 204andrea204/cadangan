<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'owner',
        	'email' => 'owner@gmail.com',
        	'password' => bcrypt('owner'),
        	'role' => '1'
        	]);
         DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => '2'
            ]);
        DB::table('users')->insert([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('kasir'),
            'role' => '3'
            ]);
        DB::table('users')->insert([
            'name' => 'waiter',
            'email' => 'waiter@gmail.com',
            'password' => bcrypt('waiter'),
            'role' => '4'
            ]);
        DB::table('users')->insert([
            'name' => 'pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => bcrypt('pelanggan'),
            'role' => '0'
            ]);

    }
}
