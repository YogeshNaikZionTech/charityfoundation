<?php

use Illuminate\Database\Seeder;


class DonateEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         *  $event = \App\Event::where('id','=','3')->first();
             $user = \App\User::where('id','=','2')->first();
             Log::info($user);
             Log::info($user->id);
             $event->User()->attach([$user->id=>['event_cents'=>30]]);

            ----- gives you amount that you pain on each event by the user.

        $user = \App\User::where('id','=','2')->first();
        $pri = $user->Event()->first();
         $pri->pivot->event_cents;

     *
     */




    }
}
