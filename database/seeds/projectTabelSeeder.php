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

 DB::table( 'project' )->insert( [

				    'project_Title'       => 'Education Programs',
				    'project_Description' => 'We reach out to young minds and give them exposure to various topics in the field of science, math and language in an effort to introduce and inspire children to pursue a certain field. A survey was conducted in the villages where parents where asked what they think their children are missing out on. Majority of them wanted their children to learn to speak in the English language. We provide these schools with language teachers who teach the children how to speak in English.' ,
				    'project_Date'        => \Carbon\Carbon::today(),
				    'project_Location'     => 'Cherlapalem, Andhra Pradesh',
				    'project_StartTime'  => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				        'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'project_Image'   => 'project1.png',
				    'project_Status'  => 'Current',
		    ] );
  DB::table( 'project' )->insert( [

				    'project_Title'       => 'Classroom Digitization',
				    'project_Description' => 'The need for technology in the field of education is clearly pronounced. Yet, majority of children in rural India are denied this necessity. AA Foundation strives to help the children from less fortunate economic backgrounds to keep up with this trend.  We provide projectors to schools in rural areas to give the children a more visual learning experience and improving the quality of learning. Help us help children get acquainted with technology from early on.' ,
				    'project_Date'        => \Carbon\Carbon::today(),
				    'project_Location'     => 'Warangal District, Telangana',
				    'project_StartTime'  => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				        'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'project_Image'   => 'project3.png',
				    'project_Status'  => 'Current',
		    ] );

 DB::table( 'project' )->insert( [

				    'project_Title'       => 'Green Schools Initiative',
				    'project_Description' => 'AA Foundation believes in making a change towards the betterment of the environment in any small way possible because every small step taken towards conservation will have an impact. In our effort to go green, we provide solar panels to schools making them more sustainable and reducing the energy costs to utilize funds for the betterment of quality of education. We eventually aim to make them self-sustainable and acquaint the future generation to green lifestyle from a young impressionable age. ' ,
				    'project_Date'        => \Carbon\Carbon::today(),
				    'project_Location'     => 'Hyderabad, India',
				    'project_StartTime'  => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				        'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
				    'project_Image'   => 'project2.png',
				    'project_Status'  => 'Current',
		    ] );

 
		      
	    $Faker = Faker::create( 'App\Project' );

	    for ( $i = 0; $i < 1; $i ++ ) {
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
	    for ( $i = 0; $i < 1; $i ++ ) {
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
