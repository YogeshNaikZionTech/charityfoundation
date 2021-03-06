<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
protected $email='';
    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'state' => 'required',
            'country' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
	        'lastname'=> $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'state' => $data['state'],
            'country' => $data['country'],
        ]);

        $d=['name'=>$data['lastname']];
        Mail::send('email.welcome', $d, function($message) use ($data){
            $message->to($data['email'],$data['lastname'])->subject('Welcome to AA Foundation');
            $message->from('admin@anumandlafoundation.org','AAF');
        });

        Log::info('***********USER LOGED IN :'.$user->id."****************");


        return $user;

    }

    public function sendmail(User $user){

    }


}
