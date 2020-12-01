<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard = 'admin';

    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'type',
        'email',
        'mobile',
        'password',
        'image',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
