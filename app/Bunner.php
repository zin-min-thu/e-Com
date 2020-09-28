<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bunner extends Model
{
    protected $fillable = [
        'image',
        'link',
        'title',
        'alt',
        'status'
    ];

    public static function getBunners()
    {
        return Bunner::where('status',1)->get()->toArray();
    }
}
