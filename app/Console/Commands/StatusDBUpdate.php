<?php

namespace App\Console\Commands;

use App\Event;
use App\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
     *
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
        Log::info('DB Status update trigged');
        $event_all = Event::all();
        $project_all  = Project::all();
        foreach($event_all as $event){
            if($event->event_Date < date("Y-m-d")){
                $event->event_Status = 'completed';
                $event->save();
                Log::info('event id:'. $event->id.' status changed to completed');
            }
         }
         foreach($project_all as $project){
             if($project->project_Date < date("Y-m-d")){
                 $project->project_Status ='completed';
                 $project->save();
                 Log::info('project id:'. $project->id.' status changed completed');
             }
         }
    }
}
