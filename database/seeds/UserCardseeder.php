<?php

use Illuminate\Database\Seeder;

class UserCardseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receipt_donate')->insert([


           [ 'pdonate_id' => 1,
            'receipt_id' =>2,
            'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
            'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' )],

            [ 'pdonate_id' => 2,
                'receipt_id' =>1,
                'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' )],

            [ 'pdonate_id' => 3,
                'receipt_id' =>3,
                'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' )]


        ]);
    }
}



/////$user = \App\User::where('id','=','3')->first();
//296: $pri->pivot->user_id
//297: $pri = $user->Project()->first()
//298: $pri->pivot->user_id
//299: $id = \DB::table('donate_project')->where('user_id', $pri->pivot-user_id)->
//300: $id = \DB::table('donate_project')->where('user_id', $pri->pivot->user_id)-
//    301: $id = \DB::table('donate_project')->where('user_id', $pri->pivot->user_id)-
//    302: $id->id
//303: $id->project_cents
