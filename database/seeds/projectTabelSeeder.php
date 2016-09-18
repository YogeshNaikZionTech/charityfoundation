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

				    'project_Title'       => $Faker->sentence,
				    'project_Description' => $Faker->paragraph(100),
				    'project_Date'        => \Carbon\Carbon::today(),
				    'project_StartTime'  => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				        'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'project_Image'   => 'charity.jpg',
				    'project_Status'  => 'future',
				    'Category_ID'        => '1',

			    ] );
		    }

    }
}
