<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Shop extends Controller
{
    public function show() {
        $shop_products= Product::all();
        return view('shop',compact('shop_products'));
    }
}
