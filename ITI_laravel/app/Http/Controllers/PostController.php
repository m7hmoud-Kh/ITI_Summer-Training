<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $data = [
            'posts' => $posts
        ];
        return view('posts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['image'] = $this->insertImage($request->title,$request->cover);
        Post::create($data);
        return redirect()->route('posts.index')->with([
            'message' => 'Post Added Successfully',
            'alert' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'post' => $post
        ];
        return view('posts.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'post' => $post
        ];
        return view('posts.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update',$post);
        $request->validate([
            'title' => 'required|unique:books,id',
            'desc' => 'required',
        ]);
        $data = $request->all();
        if($request->file('cover')){
            Storage::disk('posts')->delete($post->image);
            $data['image'] = $this->insertImage($request->title,$request->cover);
        }
        $post->update($data);

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        Storage::disk('posts')->delete($post->image);
        $post->delete();
        return redirect()->route('posts.index')->with([
            'message' => 'Post Deleted...',
            'alert' => 'danger'
        ]);

    }

    private function insertImage($title,$image){
        $new_image  = $title . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/posts'), $new_image);
        return $new_image;
    }
}
