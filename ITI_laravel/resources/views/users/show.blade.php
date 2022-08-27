@extends('layout')

@section('title')
    Show
@endsection

@section('content')
    <div class="card mt-4" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">{{$data['user']->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$data['user']->created_at}}</h6>
        <p class="card-text">{{$data['user']->email}}</p>
        <a href="{{route('posts.index')}}" class="card-link">Back</a>
        </div>
    </div>



    <h3>Related Post {{$data['user']->name}}</h3>

    <table class="table table-striped mt-4">
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
            @foreach ($data['user']->post as $post)
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