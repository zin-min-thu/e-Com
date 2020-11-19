<?php

namespace App\Http\Controllers\Front;

use View;
use Auth;
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

                // Check product already exists in user cart.
                if(Auth::check()) {
                    $countProduct = Cart::where(['product_id' => $data['product_id'],'size' => $data['size'],'user_id' => Auth::user()->id])->count();
                } else {
                    $countProduct = Cart::where(['product_id' => $data['product_id'],'size' => $data['size'],'session_id' => $session_id])->count();
                }

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
                return redirect('cart');
        }
    }

    public function cart()
    {
        $productItems = Cart::productItems();

        return view('front.cart.cart',compact('productItems'));
    }

    public function updateCartQuantity(Request $request)
    {
        $data = $request->all();

        if($request->ajax()) {

            $cart = Cart::where('id',$data['cartId'])->first();
            $productAttribute = ProductAttribute::where(['product_id' => $cart->product_id,'size' => $cart->size])->first();

            if($productAttribute->stock < $data['qty']) {
                $productItems = Cart::productItems();
                return response()->json([
                    'status' => false,
                    'message' => "Available stock only under $productAttribute->stock .",
                    'view' => (String)View::make('front.cart.cart_item',compact('productItems')),
                ]);
            }

            if($productAttribute->status == 0) {
                $productItems = Cart::productItems();
                return response()->json([
                    'status' => false,
                    'message' => "Unavailable this product size .",
                    'view' => (String)View::make('front.cart.cart_item',compact('productItems')),
                ]);
            }

            $cart->update(['quantity' => $data['qty']]);
            $productItems = Cart::productItems();
            return response()->json([
                'status' => true,
                'view' => (String)View::make('front.cart.cart_item',compact('productItems')),
            ]);
        }

    }
}
