<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($id){
        $posts =[
            1 => 'First Blog Post',
            2 => 'Second Blog Post',
            3 => 'Third Blog Post'
        ];
        return  $posts[$id] ?? 'Blog Post Not Found';
    }
}
