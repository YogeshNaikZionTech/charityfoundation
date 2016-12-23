<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
			'avatar' => '1482535204.png',
		    'phonenum'=> 1234566,
		    'street' => 'heaven',
		    'aptNo' => 888,
		    'state'=> 'other world',
		    'country'=> 'universe',
		    'zipcode'=> '009009',
		    'isAdmin' => true,
            'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
            'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),

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
            'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
            'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
	    ] );

        $Faker = Faker::create( 'App\User' );
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'firstname' => $Faker->firstName,
                'lastname' =>$Faker->lastName,
                'email' => $Faker->email,
                'password' => Hash::make('password'),
                'avatar' => 'default.png',
                'phonenum' => $Faker->phoneNumber,
                'street' => $Faker->word,
                'aptNo' => $Faker->numberBetween($min = 100, $max = 9000) ,
                'state' => 'PH',
                'country' => 'USA',
                'zipcode' => '97654',
                'isAdmin' => false,
                'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
            ]);
        }
    }
}
