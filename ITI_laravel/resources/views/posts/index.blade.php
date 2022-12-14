@extends('layout')

@section('title')
    All Post
@endsection

@section('content')


    @if(session()->has('message'))
        <div class="alert alert-{{session()->get('alert')}}">
            {{session()->get('message')}}
        </div>
    @endif



    <a href="{{route('posts.create')}}" class='btn btn-primary mb-4 mt-5'>New Post</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Desc</th>
                <th scope="col">Owner</th>
                <th scope="col">Action</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['posts'] as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->desc}}</td>
                    <td>
                        <a href="{{route('users.show',$post->user->id)}}">{{$post->user->name}}</a>
                    </td>
                    <td>
                        <a href="{{route('posts.show',$post->id)}}" class='btn btn-primary'>Show</a>

                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success"> Edit </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('posts.destroy',$post->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                    Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
