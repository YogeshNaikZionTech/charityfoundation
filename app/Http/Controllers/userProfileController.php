<?php

namespace App\Http\Controllers;


use App\AAMnotiff;
use App\PVNotiff;
use App\Receipt;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class userProfileController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' );
    }


    public function profile() {

        return view( '/users/userprofile', array( 'user' => \Auth::user() ) );
    }

    public function updateUser( Request $request ) {



        if($request->has('removeimage')){

            $this->removeUserImage();
        }
        $filename=Auth::user()->avatar;
        Log::info('Request for updating user profile');

        if ( $request->hasFile('avatar') ) {

            $avatar = $request->file('avatar');
            Log::info($avatar->getClientOriginalExtension());
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('images/avatars/' . $filename));

        }
        $user = \Auth::user();
        $user->avatar   = $filename;
        $user->phonenum = $request->input( 'phonenum' );
        $user->street   = $request->input( 'street' );
        $user->aptNo    = $request->input( 'aptNo' );
        $user->state    = $request->input( 'state' );
        $user->country  = $request->input( 'country' );
        $user->zipcode  = $request->input( 'zipcode' );
        $user->save();
        \Session::flash( 'profileUpdated', 'Awesome, we have updated your profile' );
        return view( '/users/userprofile', array( 'user' => \Auth::user() ) );
    }

    /**
     * @param \Illuminate\Http\Request
     * @return view
     * #parameters: array:4
     * "_token" => "DdIVLQGL9KPd96RZLGu5YSRYmG0ZwvvEU4Pt9vG7"
     * "opassword" => "password"
     * "password" => "password"
     * "password_confirmation" => "password"
    ]
     */
    public function updatePassword(Request $request){
        Log::info('user password is changed Requested');
        $this->validate($request, array(


            'opassword' => 'required',
            'password_confirmation' => 'required',
            'password' => 'required',

        ));
            $hashPassword = Auth::user()->password;
            $checkpass = $request->input('opassword');
        if (Hash::check($checkpass, $hashPassword)) {
            // The passwords match
            Log::info('user password is check passed');
            $user = Auth::user();
            $user->password = Hash::make(($request->input('password')));
           $user->save();
            Log::info('user password update sucess');
        }
        return view('/users/userprofile');





}

    public function showupdatePassword(){

        return view('/users/resetpassword');
    }

    public function removeUserImage(){

        $default_avatar = 'default.png';
        $curr_user = Auth::user();

        @unlink(public_path('images/avatars/'.$curr_user->avatar));
        $curr_user->avatar = $default_avatar;
        $curr_user->save();
    }


    /**
     * @param Request $request
     * check box = true or false
     * Recipt_num
     * @return view
     *
     */
    public function unSubscribemonthlyPayment(Request $request){

        $this->validate($request, array(


            'check' => 'required',
            'recipt_num' => 'required',
        ));
        $num = $request->receipt_num;

        //find receipt id
        $receipt_id = Receipt::where('receipt_num', $num)->value('id');

        //find donate details
        $donation_id = DB::table('receipt_donate')->where('receipt_id', $receipt_id)->value('pdonate_id');

        //Remove record with the donation id in pm_notify table which will remove notification for that particular pid

        $unsub = PVNotiff::where('pdonate_id',$donation_id)->first();
        $user->delete();

        \Session::flash('unsub_Success',',succefully.');
        return view('history/history');


    }
}