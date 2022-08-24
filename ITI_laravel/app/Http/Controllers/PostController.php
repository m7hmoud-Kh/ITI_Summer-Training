<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $all_posts = Post::all();
        $data = [
            'all_posts' => $all_posts
        ];
        return view('posts.index',compact('data'));
    }

    public function create(){
        return view('posts.create');
    }

    public function show($id){
        $post = Post::findOrFail($id);
        $data = [
            'post' => $post
        ];
        return view('posts.show',compact('data'));

    }

    public function store(Request $request){
        Post::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price
        ]);
        return view('posts.index');
    }
}
