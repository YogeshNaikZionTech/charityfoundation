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
        //seed 1
        $event = \App\Event::where('id','=','3')->first();
        $user = \App\User::where('id','=','2')->first();
        Log::info($user);
        Log::info($user->id);
        $event->User()->attach([$user->id=>['event_cents'=>30, 'user_card'=>1, 'receipt_num'=>1234]]);

        //seed 2
        $event = \App\Event::where('id','=','3')->first();
        $user = \App\User::where('id','=','2')->first();
        Log::info($user);
        Log::info($user->id);
        $event->User()->attach([$user->id=>['event_cents'=>300, 'user_card'=>1, 'receipt_num'=>987]]);

        //seed 3
        $event = \App\Event::where('id','=','2')->first();
        $user = \App\User::where('id','=','3')->first();
        Log::info($user);
        Log::info($user->id);
        $event->User()->attach([$user->id=>['event_cents'=>300, 'user_card'=>1, 'receipt_num'=>987]]);
//
//
//        //seed 4
//        $event = \App\Event::where('id','=','5')->first();
//        $user = \App\User::where('id','=','5')->first();
//        Log::info($user);
//        Log::info($user->id);
//        $event->User()->attach([$user->id=>['event_cents'=>9000]]);
//
//        //seed 5
//        $event = \App\Event::where('id','=','5')->first();
//        $user = \App\User::where('id','=','5')->first();
//        Log::info($user);
//        Log::info($user->id);
//        $event->User()->attach([$user->id=>['event_cents'=>9000]]);
//






        /**
            ----- gives you amount that you pain on each event by the user.

        $user = \App\User::where('id','=','2')->first();
        $pri = $user->Event()->first();
         $pri->pivot->event_cents;

     *
     */




    }
}
