<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
			'name'			=> 'sam',
			'email' 		=> 'user@gmail.com',
		]);
		 DB::table('members')->insert([
			'name'			=> 'Karma',
			'email' 		=> 'karma@gmail.com',
		]);
    }
}
