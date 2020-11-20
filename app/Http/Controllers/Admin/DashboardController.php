<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json(['data' => [
            'status' => true,
            'product' => DB::table('products')->count(),
            'admin_users' => DB::table('admins')->count(),
            'cart' => Cart::productItems()->count(),
        ]],200);
    }
}
