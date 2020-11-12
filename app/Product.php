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
        $category_discount = $this->category->discount;

        if($this->discount > 0) {
            $discount = $this->price - ($this->price * ($this->discount/100));
        }
        else if($category_discount > 0) {
            $discount = $this->price - ($this->price*($category_discount/100));
        }else {
            $discount = 0;
        }
        return $discount;
    }

    public static function getAttrDiscountedPrice($product_id,$size)
    {
        $attribute_price = ProductAttribute::where(['product_id' => $product_id,'size'=>$size])->first()->price;

        $product = Product::where('id',$product_id)->first();

        $category_discount = $product->category->discount;

        if($product->discount > 0) {
            $discount_percent = $product->discount;
            $discounted_price = $attribute_price - ($attribute_price * ($product->discount/100));
            $discount = $attribute_price - $discounted_price;
        }
        else if($category_discount > 0) {
            $discount_percent = $category_discount;
            $discounted_price = $attribute_price - ($attribute_price*($category_discount/100));
            $discount = $attribute_price - $discounted_price;
        }
        else {
            $discount_percent = 0;
            $discounted_price = $attribute_price;
            $discount = 0;
        }

        $data = [
            'attribute_price' => $attribute_price,
            'discounted_price'=>$discounted_price,
            'discount_percent' => $discount_percent,
            'discount' => $discount
        ];

        return $data;
    }
}
