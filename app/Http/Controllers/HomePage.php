<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class HomePage extends Controller
{
    function index() {
        $products = Product::all();
        $users = User::all();
        return view('home' ,compact('products','users'));
    }
}
