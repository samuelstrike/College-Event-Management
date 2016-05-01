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
        DB::table('users')->insert([
            'username' => 'samuel',
            'email' =>'user@example.org',
            'password' => bcrypt('samuel'),
        ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'email' =>'admin@example.org',
            'password' => bcrypt('admin'),
        ]);
    }
}
