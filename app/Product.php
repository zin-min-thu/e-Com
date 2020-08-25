<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'code',
        'color',
        'description',
        'discount',
        'fabric',
        'fit',
        'image',
        'is_featured',
        'meta_description',
        'meta_keywords',
        'meta_title',
        'name',
        'occasion',
        'pattern',
        'price',
        'section_id',
        'sleeve',
        'status',
        'video',
        'wash_care',
        'weight'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id');
    }

    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }
}
