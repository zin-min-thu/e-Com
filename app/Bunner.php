<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bunner extends Model
{
    protected $fillable = [
        'image',
        'link',
        'title',
        'status'
    ];
}
