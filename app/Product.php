<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id',
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

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public static function collectFilterProducts()
    {
        $data = [
            'fabricArray' => ['Cotton','Polyester','Wool'],
            'sleeveArray' => ['Full Sleeve', ' Half Sleeve', 'Short Sleeve', 'Sleeveless'],
            'patternArray' => ['Checked', 'Plain','Printed', 'Self', 'Solid'],
            'fitArray' => ['Regular', 'Slim'],
            'occasionArray' => ['Casual','Formal']
        ];

        return $data;
    }

    public function getDiscountedPrice()
    {
        $category_discount = $this->category->first()->discount;

        if($category_discount > 0) {
            $discount = $this->price - ($this->price*($category_discount/100));
        }
        else if($this->discount > 0) {
            $discount = $this->price - ($this->price * ($this->discount/100));
        }else {
            $discount = 0;
        }
        return $discount;
    }
}
