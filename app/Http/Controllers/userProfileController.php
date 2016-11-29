<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use Intervention\Image\Facades\Image;

class userProfileController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' );
    }


    public function profile() {

        return view( '/users/userprofile', array( 'user' => \Auth::user() ) );
    }

    public function updateUser( Request $request ) {

        $filename='default.png';
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
     * @param request
     */
    public function updatePassword(Request $request){

        





}

    public function showupdatePassword(){

        return view('/users/resetpassword');
    }



}