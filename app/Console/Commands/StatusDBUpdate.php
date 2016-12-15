<?php

namespace App\Console\Commands;

use App\Event;
use App\Project;
use Illuminate\Console\Command;
use Symfony\Component\Translation\Dumper\PoFileDumper;

class StatusDBUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the DB events/project status with their respective dates';

    /**
     * Create a new command instance.
     *
     * @return
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $event_all = Event::all();
        $project_all  = Project::all();
        foreach($event_all as $event){
            Log::info('DB Status update trigged');
            if($event->event_Date < date("Y,m,d")){

                $event->event_Status = 'completed';
                $event->save();
            }
         }
         foreach($project_all as $project){

             if($project->project_Date < date("Y,m,d")){

                 $project->project_Status ='completed';
                 $project->save();
             }


         }

    }
}
