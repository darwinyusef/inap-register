<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Entities\DataUser as Data;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/backend/home';

    /**
     * Create a new controller instance.
     *
     * @return void
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
     protected function validator(array $data){
        return Validator::make($data, [
             'first' => 'required|string|max:255',
             'last' => 'required|string|max:255',
             'card_id' => 'required|numeric|unique:data_users',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed',
         ]);
     }

     protected function create(array $data) {
        dd($data);
       $name = $data['first'].' '.$data['last'];
       $slug = str_slug($name, '-');
       $user = User::create([
           'name' => $name,
           'slug' => $slug,
           'email' => $data['email'],
           'password' => bcrypt($data['password']),
           'active' => 0,
           'pago' => 0,
           'status' => 0,
           'validate_token' => str_random(40),
           'slug' => str_slug($data['first']." ".$data['last'], '-')
       ]);

       Data::create([
           'first' => $data['first'],
           'last' => $data['last'],
           'card_id' => (int)$data['card_id'],
           'user_id' => $user->id
       ]);

       $data =[
         'card_id' => (int)$data['card_id'],
         'name' => $data['first'].' '.$data['last'],
         'email' => $data['email'],
         'password' => $data['password'],
         'url' => env('APP_URL').'/login',
       ];

      /* Mail::send('backend.mails.welcomeEmail', $data, function ($message) use ($data) {
         $message->subject('Acceso InapAyudas - Notification');
         $message->from('no-reply@diagnosticar.com.co');
         $message->to($data['email']);//->cc('wsgestor@gmail.com');
       });*/

         $user->assignRole('estudiante');
         return $user;
     }
}
