<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class projectTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		    $Faker = Faker::create( 'App\Project' );
		    for ( $i = 0; $i < 10; $i ++ ) {
			    DB::table( 'project' )->insert( [

				    'project_Title'       => 'Education for a region',
				    'project_Description' => $Faker->paragraph(15),
				    'project_Date'        => \Carbon\Carbon::today(),
				    'project_Location'     => 'barbodos',
				    'project_StartTime'  => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				        'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'project_Image'   => 'charity.jpg',
				    'project_Status'  => 'Current',


			    ] );
		    }

	    for ( $i = 0; $i < 10; $i ++ ) {
		    DB::table( 'project' )->insert( [

			    'project_Title'       => $Faker->sentence,
			    'project_Description' => $Faker->paragraph(15),
			    'project_Date'        => \Carbon\Carbon::today(),
			     'project_Location'     => 'wyodin',
			    'project_StartTime'  => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'project_Image'   => 'upcoming.jpg',
			    'project_Status'  => 'future',
			    

		    ] );
	    }
	    for ( $i = 0; $i < 10; $i ++ ) {
		    DB::table( 'project' )->insert( [

			    'project_Title'       => $Faker->sentence,
			    'project_Description' => $Faker->paragraph(15),
			    'project_Date'        => \Carbon\Carbon::today(),
			    'project_Location'     => 'uchin',
			    'project_StartTime'  => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
			    'project_Image'   => 'Charity.jpg',
			    'project_Status'  => 'completed',
			    

		    ] );
	    }

    }
}
