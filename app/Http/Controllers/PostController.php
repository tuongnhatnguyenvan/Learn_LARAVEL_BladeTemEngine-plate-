<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;  

class PostController extends Controller
{
    public function index()
    {
    //    $allPosts = Post::all();
        // $post = Post::find('c1');

        // $post = new Post();
        // $post->title = 'Bai viet 3';
        // $post->content = 'Noi dung bai viet 3';
        // $post->status = 1;
        // $post->save();
        // dd($post);
        echo '<h2>Query Eloqent Model';
        // $allPosts = Post::all();
        // if($allPosts->count() > 0){
        //     foreach($allPosts as $post){
        //         echo '<p>Title: '.$post->title.'</p>';
        //         echo '<p>Content: '.$post->content.'</p>';
        //         echo '<p>Status: '.$post->status.'</p>';
        //         echo '<hr>';
        //     }
        // }
        // $detail = Post::find(2);
        // dd($detail);

        // $activePosts = DB::table('posts')->where('status', 1)->get();
        // $activePosts = Post::where('status', 1)->get();
        // dd($activePosts);

        // $allPosts = Post::all();
        // $activePosts=$allPosts->reject(function ($value, $key) {
        //     return $value->status == 0;
        // });

        // Post::chunk(2,function($Post){
        //     foreach($posts as $post){
        //         echo '<p>Title: '.$post->title.'</p>';
        //         echo '<p>Content: '.$post->content.'</p>';
        //         echo '<p>Status: '.$post->status.'</p>';
        //         echo '<hr>';
        //     }
        // } )

        $allPosts = Post::where('status',1)->cursor();
        foreach($allPosts as $post){
            echo '<p>Title: '.$post->title.'</p>';
            echo '<p>Content: '.$post->content.'</p>';
            echo '<p>Status: '.$post->status.'</p>';
            echo '<hr>';
        }

    }
}
