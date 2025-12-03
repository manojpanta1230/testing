<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsForm extends Controller
{
    function index() {
        return view('admin.aboutusform');
    }
}
