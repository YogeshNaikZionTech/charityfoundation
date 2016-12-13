<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class EventsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
			DB::table( 'event' )->insert( [
				'event_Title'       => 'Elementary Skills Contests',
				'event_Description' => 'We conduct quizzes in various fields of science and math to promote students’ interest and inspire them to excel. They are designed to challenge the students and encourage an open and flexible approach to problem solving.',
				'event_Date'        => \Carbon\Carbon::today(),
				'event_StartTime'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				'event_Location'    => 'Cherlapalem, Andhra Pradesh',
				'event_EndTime'     => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				'event_Image'       => 'event1.png',
				'event_Status'      => 'future',
			    'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			] );
				DB::table( 'event' )->insert( [
				'event_Title'       => 'Extempore Speech Competition',
				'event_Description' => 'We conduct competitions where a student gives a speech on a topic which is given on the spot and with only a few minutes of preparation time. Unlike a formally prepared speech, this requires the child to gather and organize their thoughts quickly and aims to encourage them to speak their minds. ',
				'event_Date'        => \Carbon\Carbon::today(),
				'event_StartTime'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				'event_Location'    => 'Warangal District, Telangana',
				'event_EndTime'     => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				'event_Image'       => 'event2.jpg',
				'event_Status'      => 'future',
			    'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),

			] );

			DB::table( 'event' )->insert( [
				'event_Title'       => 'Colloquiums for School Children',
				'event_Description' => 'We conduct seminars on various topics for children and parents alike in order to educate them about the present trends and improve societal awareness. ',
				'event_Date'        => \Carbon\Carbon::today(),
				'event_StartTime'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				'event_Location'    => 'Hyderabad, India',
				'event_EndTime'     => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				'event_Image'       => 'event3.png',
				'event_Status'      => 'future',
			    'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			] );
	}
}