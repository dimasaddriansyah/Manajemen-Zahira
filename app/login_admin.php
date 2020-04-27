<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class login_admin extends Authenticatable
{
    protected $table = 'admin';
}
