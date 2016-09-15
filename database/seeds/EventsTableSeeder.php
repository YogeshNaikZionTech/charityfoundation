<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
	    $Faker = Faker::create( 'App\Event' );
	    for ( $i = 0; $i < 25; $i ++ ) {
		    DB::table( 'events' )->insert( [


			    'eventTitle'       => $Faker->sentence,
			    'eventDescription' => $Faker->paragraph( 2 ),
			    'eventDate'        => \Carbon\Carbon::today(),
			    'eventStartTime'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),

			    'eventEndTime' => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'created_at'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'updated_at'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'eventimage'   => '/public/images/event.jpg',
			    'eventStatus'  => 'current',
			    'Category'     => 'Educational',

		    ] );
	    }
    }
}
