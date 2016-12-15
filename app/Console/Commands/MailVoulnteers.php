<?php

namespace App\Console\Commands;

use App\Event;
use App\EVNotiff;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class MailVoulnteers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:voulnteers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send E-mail to all the voulnteers(A cron will be set-up)';

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
        Log::info('Event voulnteer mail service trigdged');
        $vouln_list = EVNotiff::all();
        foreach ($vouln_list as $vl){
            $user = User::find($vl->user_id);
            $event = Event::find($vl->event_id);
            $user_date = $vl->created_at;
            $event_date = $event->event_StatTime;
            $end = ($event_date)->format('Y-m-d');
            $format_date = ($user_date)->format('Y-m-d');
            $length = $format_date->diffInDays($end);
            if($length ==2){    
            $d = ['name' => $user->lastname, 'event_name'=>$event->event_Title, 'time'=>$event->event_StartTime];
            Mail::send('email.evnotify', $d, function ($message) use ($user) {
                $message->to($user->email, $user->lastname)->subject('Vooulnteer Reminder');
                $message->from('adminaafoundation@gmail.com', 'AAF');
                Log::info('Voulnteer E-mail notification sent to the user-id:'. $user->id);
            });
            $vl->send_status=true;
            $vl->save();

        }


        }
    }
}
