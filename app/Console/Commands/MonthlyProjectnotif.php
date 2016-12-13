<?php

namespace App\Console\Commands;

use App\Project;
use App\PVNotiff;
use App\User;
use App\Ucard;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MonthlyProjectnotif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:mpnotify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail notification to monthly subscribed user payments';

    /**
     * Create a new command instance.
     *
     * @return void
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
        Log::info('Monthly notification trigger: start');

        Log::info('get all user from the pm_notif table');
        $donate_count = PVNotiff::all()->count();

        if($donate_count >0){
            Log::info('Monthly notification has records');
            $donate_list = PVNotiff::all();
        foreach($donate_list as $donate){
            Log::info('get the user');


            $end = \Carbon\Carbon::parse($donate->status_date);
            Log::info($end);
            $now= \Carbon\Carbon::now();

            $length = $now->diffInDays($end);
            Log::info('checking the lenth:'.$length);
            if($length==30){

                $user = User::find($donate->user_id);
                $pdonate_id =  DB::table('donate_project')->where('id',$donate->pdonate_id)->first();

                Log::info('pivot table of project_id receipt and project');
                $receipt =  DB::table('receipt_donate')->where('pdonate_id',$pdonate_id->id)->first();

                Log::info('get donation details with the amount and card ids');
                $donation_details = DB::table('projectd_receipt')->where('id', $receipt->receipt_id)->first();

                Log::info('get card number form ucard');
                $card_num = Ucard::where('id', $donation_details->ucard_id)->value('card_num');


                $user_name = $user->firstname. $user->lastname;
                $project = Project::where('id', $pdonate_id->project_id)->first();
                $amount = $donation_details->amount_cents;
                $card_last =substr($card_num, 11,16);
                Log::info($project->project_Title);




                $d = ['name' => $user_name, 'project_name'=>$project->project_Title, 'amount'=>$amount,'card_end'=>$card_last];
                Mail::send('email.mpnotify', $d, function ($message) use ($user) {
                    $message->to($user->email, $user->lastname)->subject('Donation Receipt');
                    $message->from('noreplyaafoundation@gmail.com', 'AAF');
                    Log::info('mail sent to the user');
                });


                $d_date = date('y');
                $month = date('m');
                $day = date('d');
                $rand = mt_rand(1000, 9999);
                $prefix = 'A';
                Log::info(' new Receipt generated');
                $new_receipt= $prefix . $d_date . $rand . $month . $day;
        }else{

            Log::info('NO mail as lenghtis :'.$length);
            }

        }
        }else{

            Log::info('Monthly notification has 0 records: No mails to be sent');
        }
            $this->check();

    }

    public function check(){
        Log::info('checking if this works');
    }
}
