<?php

namespace App\Http\Controllers\Front;

use Session;
use App\Cart;
use App\ProductAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();

            $productAttribute = ProductAttribute::where(['product_id' => $data['product_id'],'size' => $data['size']])
                                ->first()->toArray();

                // Check product sotck available or not.
                if($productAttribute['stock'] < $data['quantity']) {
                    session::flash('error_message','Required quantity is not available.');
                    return redirect()->back();
                }

                // Generate session id
                $session_id = Session::get('sessioon_id');
                if(empty($session_id)) {
                    $session_id = Session::getId();
                    Session::put('session_id',$session_id);
                }

                // Check product already exists in cart.
                $countProduct = Cart::where(['product_id' => $data['product_id'],'size' => $data['size']])->count();
                if($countProduct > 0) {
                    session::flash('error_message','Product already exists in cart.');
                    return redirect()->back();
                }

                Cart::create([
                    'product_id' => $data['product_id'],
                    'session_id' => $session_id,
                    'size' => $data['size'],
                    'quantity' => $data['quantity'],
                ]);
                session::flash('success_message','Product added to cart successful.');
                return redirect()->back();
        }
    }
}
