<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'section_id',
        'name',
        'image',
        'discount',
        'description',
        'url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status'
    ];
}
