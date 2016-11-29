<?php

use Illuminate\Database\Seeder;

class DonateProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          $project =\App\Project::where('id','=','4')->first();
         $user = \App\User::where('id','=','3')->first();
          Log::info($user);
          Log::info($project->id);
         $project->User()->attach([$user->id=>['donation_type'=>'oneTime']]);


        $project =\App\Project::where('id','=','4')->first();
        $user = \App\User::where('id','=','2')->first();
        Log::info($user);
        Log::info($project->id);
        $project->User()->attach([$user->id=>['donation_type'=>'monthly']]);

        $project =\App\Project::where('id','=','5')->first();
        $user = \App\User::where('id','=','2')->first();
        Log::info($user);
        Log::info($project->id);
        $project->User()->attach([$user->id=>[ 'donation_type'=>'monthly']]);
        /**
         * ---------get donat project table values-----
         * $user = \App\User::where('id','=','2')->first();
         * $pri = $user->Project()->first()
         * $pri->pivot->project_cents
         * }
         */

    }
}
