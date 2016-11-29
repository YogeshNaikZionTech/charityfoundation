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

        for($i=0; $i<4; $i++){
            DB::table('user_card')->insert([

               'user_id' => $i,
                'card_num' => $Faker->creditCardNumber,
                'cvv_num' => rand(100,999),
                'expiry_date' => \Carbon\Carbon::now()->format('Y-m'),
                'name_card' => $Faker->firstName,
                'zip_code' => rand(10000, 99999),
                'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),



            ]);

}

        $user = \App\User::where('id','=','2')->first();
        $card = \App\Ucard::where('id','=','1')->first();

        $user->Ucard()->save($card);

        $user = \App\User::where('id','=','2')->first();
        $card = \App\Ucard::where('id','=','2')->first();

        $user->Ucard()->save($card);

        $user = \App\User::where('id','=','3')->first();
        $card = \App\Ucard::where('id','=','3')->first();

        $user->Ucard()->save($card);
    }
}
