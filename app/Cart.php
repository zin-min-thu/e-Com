<?php

namespace App;

use Auth;
use Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','product_id','session_id','size','quantity',
    ];

    public static function productItems()
    {
        if(Auth::check()) {
            $productItems = Cart::with('product')
                            ->where('user_id',Auth::user()->id)
                            ->orderBy('id','Desc')
                            ->get();
        }else {
            $productItems = Cart::with('product')
                            ->where('session_id',Session::get('session_id'))
                            ->orderBy('id','Desc')
                            ->get();
        }
        return $productItems;
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id')->with('attributes');
    }

    public function getCalculatedProduct()
    {
        return Product::getAttrDiscountedPrice($this->product_id,$this->size);
    }
}
