<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
  use Notifiable;
  use SoftDeletes;

  public $table = "mdl_user";

  public $timestamps = false;

  protected $fillable = [
    'email', 'deleted', 'suspended', 'display_name', 'firstname', 'institution',
    'lastname', 'idnumber', 'username', 'confirmed', 'mnethostid', 'lang',
    'timecreated', 'timemodified', 'phone1', 'phone2', 'city', 'department',  'password', 'description'
  ];

  protected $hidden = [
    'password'
  ];

  static public $rules = [
    'firstname' => 'required|string|max:255',
    'lastname' => 'required|string|max:255',
    'city' => 'required|string|max:255',
    'username' => 'required|numeric|unique:mdl_user',
    'idnumber' => 'required|numeric|unique:mdl_user',
    'email' => 'required|string|email|max:255|unique:mdl_user',
    'password' => 'required',
  ];

  static public $rulesParent = [
    'username' => 'required|numeric|unique:mdl_user',
    'idnumber' => 'required|numeric|unique:mdl_user',
    'firstname' => 'required|string|max:255',
    'lastname' => 'required|string|max:255',
    'adultId' => 'required|string|max:255',
    'adultName' => 'required|string|max:255',
    'city' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:mdl_user',
    'password' => 'required',
  ];

  static public $rulesUpdate = [
    'firstname' => 'required|string|max:255',
    'lastname' => 'required|string|max:255',
    'email' => 'required|string|email|max:255',
  ];

  public function getAuthIdentifierName()
  {
    return 'memberid';
  }

  public function getAuthIdentifier()
  {
    return $this->memberid;
  }

  public function getAuthPassword()
  {
    return $this->passwordnew_enc;
  }
}
