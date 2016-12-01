<?php

namespace App\Http\Controllers;


use App\User;
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
            Image::make($avatar)->resize(300, 300)->save(public_path('/images/avatars/' . $filename));

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
        $curr_user->avatar = $default_avatar;
        $curr_user->save();
    }




}