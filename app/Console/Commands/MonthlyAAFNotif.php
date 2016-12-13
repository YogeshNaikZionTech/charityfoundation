<?php

namespace App\Console\Commands;

use App\AAMnotiff;
use App\Project;
use App\Ucard;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class MonthlyAAFNotif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:aafmnotify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send monthly notification to AAF donated user(if Subscribed)';

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

        Log::info('Monthly mail notification trigger for AAF: start');

        $aff_count = AAMnotiff::all()->count();

        if($aff_count > 0){

            $list =  AAMnotiff::all();

            foreach($list as $aff){
                $end = \Carbon\Carbon::parse($aff->status_date);
                Log::info($end);
                $now= \Carbon\Carbon::now();

                $length = $now->diffInDays($end);
                Log::info('checking the lenth:'.$length);
                if($length == 30){
                    //get the user from aafm_notif table
                    $user = User::find($aff->user_id);

                    //get donation details from aaf_donate table
                    $aff_donate = DB::table('aaf_donate')->where('id', $aff->aff_id)->first();

                    //get receipt deatils and card
                    $receipt = DB::table('projectd_receipt')->where('id', $aff_donate->cardreceipt_id)->first();
                    $card_num = Ucard::find($receipt->ucard_id)->value('card_num');

                    //get amount
                    $amount = $receipt->amount_cents;
                    $card_last =substr($card_num, 11,16);

                    $d = ['name' => $user->lastname, "type"=>$aff_donate->donation_type,'amount'=>$amount,'card_end'=>$card_last];
                    Mail::send('email.aafmnotify', $d, function ($message) use ($user) {
                    $message->to($user->email, $user->lastname)->subject('Donation Receipt');
                    $message->from('noreplyaafoundation@gmail.com', 'AAF');
                    Log::info('mail sent to the user');

                        $d_date = date('y');
                        $month = date('m');
                        $day = date('d');
                        $rand = mt_rand(1000, 9999);
                        $prefix = 'A';
                        Log::info(' new Receipt generated');
                        $new_receipt= $prefix . $d_date . $rand . $month . $day;
                });

                }else{

                    Log::info('User still has time as lenght is:'.$length);
                }

            }
        }else{

            Log::info('No donation for AAF are presnt');
        }

    }



    public function chargeAAF(Ucard $card, User $user, $amount, AAMnotiff $aafn){


    }

    public function generateReceipt()
    {

        $d_date = date('y');
        $month = date('m');
        $day = date('d');
        $rand = mt_rand(1000, 9999);
        $prefix = 'A';
        Log::info('Receipt generated');
        return $prefix . $d_date . $rand . $month . $day;
    }
}
