<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserPaymentTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker::create( 'App\Ucard' );

        for($i=0; $i<5; $i++){
            DB::table('user_card')->insert([

                'user_id' => $i,
                'card_num' => $Faker->creditCardNumber,
                'cvv_num' => rand(100,999),
                'expiry_date' => \Carbon\Carbon::now()->format('Y-m'),
                'name_card' => $Faker->firstName,
                'zip_code' => rand(10000, 99999)


            ]);
}
    }
}
