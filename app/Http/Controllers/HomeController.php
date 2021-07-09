<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Mail, Redirect, Log, Hash, Session;
use App\Entities\User;
use App\Entities\Options;


class HomeController extends Controller
{
  public function __construct()
  {
  }

  public function login(Request $request)
  {
    $user = User::where('email', $request->email)->first();
    if(json_decode(unserialize($user->description)) == null){
      Session::flash('snackbar-error', 'Su rol no se encuentra configurado; por favor comuniquese con el administrador'); 
      return redirect('/login'); 
    }

    $cookie = [
      'id' => $user->id,
      'email' => $user->email,
      'firstname' => $user->firstname,
      'lastname' => $user->lastname,
      'idnumber' => $user->idnumber,
      'rol' => json_decode(unserialize($user->description))->rol,
      'permission' => json_decode(unserialize($user->description))->permission,
      'tocken' => json_decode(unserialize($user->description))->tocken,
      'pay' => 0
    ]; 


    if (isset($user->id)) {
      $pass = json_decode(unserialize($user->description))->tocken;
      if (Hash::check($request->password, $pass)) {
        return redirect('/home')->withCookie('policies', json_encode($cookie), 380);
      } else {
        return redirect('/login'); 
      }
    }
  }
  

  public function index(Request $request)
  {
    $cookie = json_decode($request->cookie('policies'));
    if($cookie == null){
      return abort(403); 
    }
    $permission = explode('|', $cookie->permission ); 
    return view('welcome', compact('cookie', 'permission'));
  }


  public function logoutData(Request $request){
    \Cookie::forget('policies');
    return redirect('/login'); 
  }

  // public function sendValidator($id, Request $request)
  // {

  //   $user = User::where('id', $id)->first();
  //   if ($user->validate_token != null || $user->active == 0) {
  //     if (!Auth::check()) {
  //       return Redirect::to('login');
  //     }
  //     if ($user->validate_token == $request->input('remember_token') && $request->input('remember_token') != null) {
  //       User::where('id', $id)->update([
  //         'active' => 1,
  //         'pago' => 1,
  //         'status' => 1,
  //         'validate_token' => null
  //       ]);
  //       Auth::login($user);
  //       return Redirect::to('login');
  //     }
  //   }
  //   if ($user->validate_token == null) {
  //     User::where('id', $id)->update([
  //       'active' => 2,
  //       'pago' => 0,
  //       'status' => 0,
  //       'validate_token' => str_slug(rand(10000000, 999999999), ""),
  //     ]);
  //   }
  //   $user2 = User::where('id', $id)->first();
  //   $data = [
  //     'email' => $user2->email,
  //     'name' => $user2->name,
  //     'validate_token' => $user2->validate_token,
  //     'active' => $id,
  //   ];
  //   $fecha = Carbon::now();

  //   Mail::send('backend.mails.verifyMail', $data, function ($message) use ($data) {
  //     $message->subject('Verifique su Email - Notification');
  //     $message->from('laboratorioclinicodiagnosticar@gmail.com');
  //     $message->to($data['email'])->cc('wsgestor@gmail.com')->cc('laboratorioclinicodiagnosticar@gmail.com');
  //   });
  //   if (count(Mail::failures()) > 0) {
  //     Log::error('El Email Verficaci��n: ' . $data['email'] . ' del Usuario: ' . $data['active'] . ' Contiene un error, Email registrado el ' . $fecha);
  //   } else {
  //     Log::info('El Email Verficaci��n: ' . $data['email'] . ' del Usuario: ' . $data['active'] . ' Fue enviado Correctamente Email registrado el ' . $fecha);
  //   }
  //   return redirect('activate')->with('user', $id);
  // }

  public function pago()
  {
    if (!Auth::check()) {
      return Redirect::to('login');
    }
    $user = Auth::user();
    $data = [
      'email' => $user->email,
      'name' => $user->name,
    ];
    $fecha = Carbon::now();
    Mail::send('backend.mails.validateUser', $data, function ($message) use ($data) {
      $message->subject('Activación de Usuario - Notification');
      $message->from('laboratorioclinicodiagnosticar@gmail.com');
      $message->to($data['email'])->cc('wsgestor@gmail.com')->cc('laboratorioclinicodiagnosticar@gmail.com');
    });

    if (count(Mail::failures()) > 0) {
      Log::error('El Email Activacion: ' . $data['email'] . ' del Usuario: ' . $data['username'] . ' Contiene un error, Email registrado el' . $fecha);
    } else {
      Log::info('El Email Activacion: ' . $data['email'] . ' del Usuario: ' . $data['username'] . ' Fue enviado Correctamente Email registrado el' . $fecha);
    }

    return view('auth.login');
  }

  public function chargueip()
  {
    $ip = null;
    if (isset($_SERVER["HTTP_CLIENT_IP"])) {
      $ip  = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
      $ip  = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
      $ip  = $_SERVER["HTTP_X_FORWARDED"];
    } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
      $ip  = $_SERVER["HTTP_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
      $ip  = $_SERVER["HTTP_FORWARDED"];
    } else {
      $ip  = $_SERVER["REMOTE_ADDR"];
    }
    $data = [
      'ip' => $ip,
      'users_id' => Auth::user()->id
    ];
    $d = IpUser::create($data);
    return Redirect::to('home');
  }

  public function getip($id)
  {
    $ips = IpUser::where('users_id', $id)->get();
    if (Auth::user()->hasRole('administrador')) {
      $ips = IpUser::all();
    }
    return view('admin.getip', compact('ips'));
  }


  public static function chargue($text, $reasponse, $typeMove)
  {
    $chargue = ['archive' => $text, 'reasponse' =>  $reasponse, 'type' => $typeMove, 'active' => 1, 'users_id' => Auth::user()->id];
    Makeuser::create($chargue);
  }

  public function chargueUser()
  {
    $makers = Makeuser::paginate(350);
    return view('admin.makeuser', compact('makers'));
  }
}
