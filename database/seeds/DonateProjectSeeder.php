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
        /**
         *
         *
         * $project =\App\Project::where('id','=','4')->first();
         * $user = \App\User::where('id','=','3')->first();
         * Log::info($user);
         * Log::info($project->id);
         * $project->User()->attach([$user->id=>['project_cents'=>1000]]);
         *
         *
         *
         * ---------get donat project table values-----
         * $user = \App\User::where('id','=','3')->first();
         * $pri = $user->Project()->first()
         * $pri->pivot->project_cents
         * }
         */

    }
}
