@extends('layout')

@section('title')
    All Posts
@endsection

@section('content')

    
    <a href="{{route('posts.create')}}" class='btn btn-primary mb-4 mt-5'>New Post</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Desc</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['all_posts'] as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->desc}}</td>
                    <td>{{$post->price}}</td>
                    <td>
                        <a href="{{route('posts.show',$post->id)}}" class='btn btn-primary'>Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
