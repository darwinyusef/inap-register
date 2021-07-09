<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\helperController as Helps;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;


use Validator, Session, Auth, Carbon\Carbon, Mail, Hash;


class UserAllController extends Controller
{

  public $generalRol;

  public function __construct()
  {
    $this->generalRol = env('USER_ROL_BASE');
  }

  // Genera la vista de /registro 
  public function reg_create()
  {
    return view('register/register');
  }

  // Genera la vista de /backend/usuarios
  public function index(Request $request)
  {
    $cookie = json_decode($request->cookie('policies'));
    $permission = explode('|', $cookie->permission);

    $paginate = $request->paginate;
    $email = $request->email;
    $cedula = $request->cedula;

    if ($paginate) {
      $paginate = $paginate;
    } else {
      $paginate = 30;
    }

    $users = User::select('id', 'email', 'idnumber', 'firstname', 'lastname', 'email', 'username', 'description');

    if ($email) {
      $users = $users->where('email', 'LIKE', '%' . $email . '%');
    } else {
      $users = $users;
    }

    if ($cedula) {
      $users = $users->where('idnumber', $cedula);
    } else {
      $users = $users;
    }

    if (in_array('user:list', $permission)) {
      $users = $users->paginate($paginate);
    } else {
      abort(403);
    }

    return view('backend.user.user-list', compact('users', 'cookie', 'permission'));
  }

  // procesa el registro
  public function store(Request $request)
  {

    $url = '/registro';
    $solicitud = $request->all();
    $solicitud = array_add($solicitud, 'username', $request->idnumber);

    $rules_principal = User::$rules;
    if (Helps::calculaedad($request->birth) < 18 || $request->typeId == 'TI') {
      $rules_principal = User::$rulesParent;
    }

    $validator = Validator::make($solicitud, $rules_principal);
    if ($validator->fails()) {
      Session::flash('snackbar-info', 'Problema al carcargar la información:');
      return redirect($url)
        ->withErrors($validator)
        ->withInput();
    } else {

      $solicitud = array_add($solicitud, 'confirmed', 1);
      $solicitud = array_add($solicitud, 'mnethostid', 1);
      $solicitud = array_add($solicitud, 'lang', 'es_co');
      $solicitud = array_add($solicitud, 'deleted', 0);

      $solicitud = array_add($solicitud, 'suspended', 0);
      $solicitud = array_add($solicitud, 'timecreated', Carbon::now()->timestamp);
      $solicitud = array_add($solicitud, 'timemodified', Carbon::now()->timestamp);

      if ($solicitud['phone1'] == null) {
        $solicitud = array_add($solicitud, 'phone1', '');
      }

      if ($solicitud['phone2'] == null) {
        $solicitud = array_add($solicitud, 'phone2', '');
      }

      if ($solicitud['typeId'] == 'TI') {
        $adultId = $request->adultId;
        $adultName = $request->adultName;
      } else {
        $adultId = '';
        $adultName = '';
      }

      $pass = bcrypt($request->password);
      $solicitud['description'] = serialize(json_encode([
        'typeId' => $solicitud['typeId'],
        'display_name' => $solicitud['firstname'] . ' ' . $solicitud['lastname'],
        'typecourse' =>  $solicitud['typecourse'],
        'gender' =>  $solicitud['gender'],
        'birth' =>  $solicitud['birth'],
        'tocken' =>   $pass,
        'rol' =>   $this->generalRol,
        'permission' => Helps::permision($this->generalRol),
        'pay' =>  0,
        'adultId' => $adultId,
        'adultName' => $adultName,
      ]));

      $collectSoliciutud = collect($solicitud);
      $solicitud = $collectSoliciutud->only([
        'email', 'deleted', 'suspended', 'display_name', 'firstname',
        'lastname', 'idnumber', 'username', 'phone1', 'description', 'phone2', 'city', 'department',
        'password', 'confirmed', 'mnethostid', 'lang', 'deleted', 'suspended',
        'timecreated', 'timemodified', 'institution'
      ]);

      $solicitud['password'] = md5($solicitud['password']);

      // dd($solicitud);
      $user = User::create($solicitud->all());
      // se carga la solicitud
      $cookie = [
        'id' => $user->id,
        'email' => $user->email,
        'firstname' => $user->firstname,
        'lastname' => $user->lastname,
        'idnumber' => $user->idnumber,
        'rol' => $this->generalRol,
        'permission' => Helps::permision($this->generalRol),
        'tocken' => $pass,
        'pay' => 0
      ];
      $data = [
        'idnumber' => (int)$solicitud['idnumber'],
        'name' => $solicitud['firstname'] . ' ' . $solicitud['lastname'],
        'email' => $solicitud['email'],
        'password' => $request->password,
      ];


      Mail::send('backend.mails.welcomeEmail', $data, function ($message) use ($data) {
        $message->subject('Acceso InapAyudas - Notification');
        $message->from('no-reply@inapayudaspedagogicas.com.co');
        $message->to($data['email']); //->cc('wsgestor@gmail.com');
      });

      // $user->assignRole('estudiante');
      Session::flash('snackbar-success', 'Usuario Cargado Correctamente: ' . $user->email);
      return redirect('/home')->withCookie('policies', json_encode($cookie), 380);
    }
  }

  // Genera la vista de actualización de usuario
  public function edit(Request $request, $id)
  {
    $cookie = json_decode($request->cookie('policies'));
    $permission = explode('|', $cookie->permission);

    if ($cookie->rol == 'admin') {
      $user = User::findOrFail($id);
    } else if ($cookie->rol == 'user') {
      $user = User::find($cookie->id);
    }

    return view('backend.user.profile-update', compact('user', 'cookie', 'permission'));
  }

  // Genera la vista de mostrar usuario
  public function show(Request $request, $id)
  {
    $cookie = json_decode($request->cookie('policies'));
    $permission = explode('|', $cookie->permission);

    $user = User::find($id);
    return view('backend.user.profile-show', compact('user', 'cookie', 'permission'));
  }

  // procesa la actualización
  public function update($id, Request $request)
  {
    $cookie = json_decode($request->cookie('policies'));

    $solicitud = $request->all();
    $validator = Validator::make($solicitud, User::$rulesUpdate);

    if ($validator->fails()) {
      Session::flash('snackbar-info', 'Problema al carcargar la información:');
      return redirect('/backend/usuarios/' . $id . '/edit')
        ->withErrors($validator)
        ->withInput();
    } else {

      if ($solicitud['phone1'] == null) {
        $solicitud = array_add($solicitud, 'phone1', '');
      }

      if ($solicitud['phone2'] == null) {
        $solicitud = array_add($solicitud, 'phone2', '');
      }


      if ($cookie->rol == 'admin') {
        $solicitud = array_add($solicitud, 'idnumber', $request->idnumber);
        $solicitud = array_add($solicitud, 'username', $request->idnumber);

        $id = User::select('id', 'description')->findOrFail($id)->id;
        $rol = $this->generalRol;
      } else if ($cookie->rol == 'user') {
        $id = $cookie->id;
        $solicitud = array_add($solicitud, 'pay', $cookie->pay);
        $rol = $cookie->rol;
      }

      if ($solicitud['typeId'] == 'TI') {
        $adultId = $request->adultId;
        $adultName = $request->adultName;
      } else {
        $adultId = '';
        $adultName = '';
      }

      $solicitud['description'] = serialize(json_encode([
        'typeId' => $solicitud['typeId'],
        'display_name' => $solicitud['firstname'] . ' ' . $solicitud['lastname'],
        'typecourse' =>  $solicitud['typecourse'],
        'gender' =>  $solicitud['gender'],
        'birth' =>  $solicitud['birth'],
        'tocken' =>   $cookie->tocken,
        'rol' =>   $rol,
        'permission' => Helps::permision($rol),
        'pay' =>  $solicitud['pay'],
        'adultId' => $adultId,
        'adultName' => $adultName,
      ]));

      $solicitud = array_add($solicitud, 'timemodified', Carbon::now()->timestamp);

      $collectSoliciutud = collect($solicitud);

      $arraySolicitud = ['email', 'suspended', 'firstname', 'lastname', 'description', 'phone2', 'city', 'department', 'timemodified', 'institution'];

      if ($cookie->rol == 'admin') {
        array_push($arraySolicitud, "idnumber", "suspended");
      }

      $solicitud = $collectSoliciutud->only($arraySolicitud);

      User::where('id', $id)->update($solicitud->all());

      Session::flash('snackbar-success', 'Usuario Actualizado Correctamente ');
      return redirect('/backend/usuarios/' . $id . '/edit');
    }
  }

  // Elimina el usuario y con force=1 completamente
  public function destroy($id, Request $request)
  {
    $force = $request->input('force');
    $user = User::findOrFail($id);
    if ($force == 1) {
      $user->forceDelete();
      Session::flash('snackbar-warning', 'El usuario se ha eliminado correctamente');
      return redirect('backend/usuarios');
    }
    $user->delete();
    Session::flash('snackbar-warning', 'El usuario se ha movido a la papelera de reciclaje');
    return redirect('backend/usuarios');
  }

  // Genera la vista de recuperar contraseña
  public function pass($id, Request $request)
  {
    $cookie = json_decode($request->cookie('policies'));
    $permission = explode('|', $cookie->permission);
    return view('backend.user.profile-password-change', compact('id', 'cookie', 'permission'));
  }

  // Procesa la recuperación de contraseña
  public function pass_store(Request $request)
  {
    $cookie = json_decode($request->cookie('policies'));


    if ($cookie->rol == 'admin') {
      $id = User::select('id')->findOrFail($request->id)->id;
    } else if ($cookie->rol == 'user') {
      $id = $cookie->id;
    }

    $user = User::findOrFail($id);

    $description = json_decode(unserialize($user->description));
    $validator = Validator::make($request->all(), [
      'password' => 'required|string|min:6|confirmed',
    ]);

    if (Hash::check($request->old_password, $description->tocken)) {
      $entrada = true;
    }

    if ($cookie == 'admin') {
      $entrada = true;
    }

    if ($validator->fails()) {
      Session::flash('snackbar-danger', 'Error');
      return back()->withErrors($validator)
        ->withInput();
    } else if ($entrada) {

      $solicitud = serialize(json_encode([
        'typeId' => $description->typeId,
        'display_name' => $description->display_name,
        'typecourse' =>  $description->typecourse,
        'gender' =>  $description->gender,
        'birth' =>  $description->birth,
        'tocken' =>  bcrypt($request->password),
        'rol' =>   $description->birth,
        'permission' =>  $description->permission,
        'pay' => $description->pay,
        'adultId' => $description->adultId,
        'adultName' => $description->adultName,
      ]));

      $user = User::findOrFail($request->id);
      $user->password = md5($request->password);
      $user->description = $solicitud;
      $user->save();
    } else {
      $validator->errors()->add('old_password', 'La informacion no es coherente con nuestras bases de datos');
      Session::flash('snackbar-danger', 'Error');
      return back()->withErrors($validator)
        ->withInput();
    }

    Session::flash('snackbar-success', 'Contraseña cambiada correctamente');
    return back();
  }

  public function inscribe(Request $request)
  {
    $cookie = json_decode($request->cookie('policies'));
    $permission = explode('|', $cookie->permission);
    return view('backend/user/inscribe-csv', compact('cookie', 'permission'));
  }

  public function import(Request $request)
  {

    $file = $request->file;
    Excel::import(new UsersImport, $file);

    Session::flash('snackbar-success', 'La información ha sido cargada correctamente');
    return back();
  }
}
