<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'problem', 'email', 'description', 'resolve', 'user_id'
    ];

    
}
