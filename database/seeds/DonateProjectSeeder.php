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
         $project->User()->attach([$user->id=>['project_cents'=>1000, 'user_card'=>3, 'receipt_num'=>77886]]);


        $project =\App\Project::where('id','=','4')->first();
        $user = \App\User::where('id','=','2')->first();
        Log::info($user);
        Log::info($project->id);
        $project->User()->attach([$user->id=>['project_cents'=>500, 'user_card'=>2, 'receipt_num'=>4533]]);

        $project =\App\Project::where('id','=','5')->first();
        $user = \App\User::where('id','=','2')->first();
        Log::info($user);
        Log::info($project->id);
        $project->User()->attach([$user->id=>['project_cents'=>900, 'user_card'=>2, 'receipt_num'=>3345]]);
        /**
         * ---------get donat project table values-----
         * $user = \App\User::where('id','=','3')->first();
         * $pri = $user->Project()->first()
         * $pri->pivot->project_cents
         * }
         */

    }
}
