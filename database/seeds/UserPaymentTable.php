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

            DB::table( 'user_card' )->insert( [


                'user_id'    => 2,
                'card_num' => $Faker->creditCardNumber,
                'cvv_num'        => '455',
                'expiry_date'   => \Carbon\Carbon::now()->format( 'Y-m' ),
                'name_card'    => 'sasuke sama',
                'zip_code'     => '89889'


            ] );

    }
}
