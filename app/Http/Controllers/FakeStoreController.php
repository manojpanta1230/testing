<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;


class FakeStoreController extends Controller
{
     public function index() {
        $response = Http::get('https://fakestoreapi.com/products');
         return $response->json();
        
}
public function getProduct($id)
{
    $response = Http::get("https://fakestoreapi.com/products/$id");

    return $response->json();
}
}