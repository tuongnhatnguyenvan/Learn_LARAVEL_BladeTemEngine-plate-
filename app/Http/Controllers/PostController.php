<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
    //    $allPosts = Post::all();
        // $post = Post::find('c1');

        $post = new Post();
        $post->title = 'Bai viet 3';
        $post->content = 'Noi dung bai viet 3';
        $post->status = 1;
        $post->save();
        dd($post);
    }
}
