<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  //       $datetime = new DateTime('today');
		
  //       DB::table('events')->insert([
		// 	'name'			=> 'samuel',
		// 	'title' 		=> 'Meeting with VC ',
		// 	'start_time'	=> $datetime->setTime(10, 00)->format('Y-m-d H:i:s'),
		// 	'end_time'		=> $datetime->add(new DateInterval('PT1H'))->format('Y-m-d H:i:s'),
		// ]);
		

		$datetime = new DateTime('');
		
		DB::table('events')->insert([
			'name'			=> 'sam',
			'title' 		=> 'Workshop on media literacy',
			'start_time'	=> $datetime->setTime(09, 00)->format('Y-m-d H:i:s'),
			'end_time'		=> $datetime->add(new DateInterval('PT1H'))->format('Y-m-d H:i:s'),
			'location'		=> 'Multipurpose hall',
		]);
		
		
    }
}
