<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name','status'
    ];

    public static function sections()
    {
        $getSections = Section::select('id','name')->where('status',1)->with('categories')->get();
        return $getSections;
    }

    public function categories()
    {
        return $this->hasMany('App\Category', 'section_id')->where(['parent_id' => 'ROOT', 'status' => 1])->with('subcategories');
    }
}
