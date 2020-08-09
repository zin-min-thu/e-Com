<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name','status'
    ];

    public function categories()
    {
        return $this->hasMany('App\Category', 'section_id')->where(['parent_id' => 'ROOT', 'status' => 1])->with('subcategories');
    }
}
