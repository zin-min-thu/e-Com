<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            dd($data);
        }
    }
}
