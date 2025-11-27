<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
public function random()
{
    $quotes = [
        "Stay positive and strong.",
        "Laravel makes backend easy.",
        "Every expert was once a beginner.",
        "Consistency > Motivation."
    ];

    return response()->json([
        'quote' => $quotes[array_rand($quotes)]
    ]);
}
}
