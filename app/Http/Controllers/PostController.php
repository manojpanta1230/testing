<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    // 1. Insert (Create)
    public function createPost()
    {

        

        Post::create([
            'title' => 'My First Post',
            'body' => 'This is Laravel Day 3',
            'status' => 'published'
        ]);

        return "Post Created!";
    }

    // 2. Get all rows
    public function getAllPosts()
    {
        $posts = Post::all();
        return $posts;
    }

    // 3. Get one row
    public function getPostById($id)
    {
        $post = Post::find($id);
        return $post;
    }

    // 4. Update
    public function updatePost($id)
    {
        $post = Post::find($id);

        $post->update([
            'title' => 'Updated Title'
        ]);

        return "Post Updated!";
    }

    // 5. Delete
    public function deletePost($id)
    {
        Post::destroy($id);
        return "Post Deleted!";
    }
}
