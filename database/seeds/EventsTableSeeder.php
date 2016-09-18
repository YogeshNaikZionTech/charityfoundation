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
	    for ( $i = 0; $i < 10; $i ++ ) {
		    DB::table( 'event' )->insert( [


			    'event_Title'       => $Faker->sentence,
			    'event_Description' => $Faker->paragraph( 2 ),
			    'event_Date'        => \Carbon\Carbon::today(),
			    'event_StartTime'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),

			    'event_EndTime' => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'created_at'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'updated_at'   => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'event_Image'   => 'colorfull.jpg',
			    'event_Status'  => 'future',
			    'Category_ID'     => '1',

		    ] );
	    }
    }
}
