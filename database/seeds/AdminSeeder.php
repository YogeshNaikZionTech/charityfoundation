<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table( 'users' )->insert( [
		   'firstname' => 'Kai',
		    'lastname'=> 'great',
		    'email' => 'kai@great.com',
		    'password' => Hash::make('password'),
			'avatar' => '1473652512.png',
		    'phonenum'=> 1234566,
		    'street' => 'heaven',
		    'aptNo' => 888,
		    'state'=> 'other world',
		    'country'=> 'universe',
		    'zipcode'=> '009009',
		    'isAdmin' => true,

	    ] );

	    DB::table( 'users' )->insert( [
		    'firstname' => 'hinata',
		    'lastname'=> 'great',
		    'email' => 'hinate@great.com',
		    'password' => Hash::make('password'),
		    'avatar' => '1474160631.jpg ',
		    'phonenum'=> 13466,
		    'street' => 'koni',
		    'aptNo' => 554,
		    'state'=> 'east',
		    'country'=> 'leaf',
		    'zipcode'=> '5451',
		    'isAdmin' => false,

	    ] );
    }
}
