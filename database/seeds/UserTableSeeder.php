<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userseed = new \App\User([

        	'name'=> 'light',
	        'email'=>"light@gmail.com",
	        'password'=>'password'
        ]);

	    $userseed   ->save();
    }
}
