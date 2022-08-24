@extends('layout')

@section('title')
    Show
@endsection

@section('content')
    <div class="card mt-4" style="width: 18rem;">
        <img src="{{asset('assets/image/'.$data['post']->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">{{$data['post']->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$data['post']->price}} EGP</h6>
        <h6 class="card-subtitle mb-2 text-muted">{{$data['post']->created_at}}</h6>
        <p class="card-text">{{$data['post']->desc}}</p>

        <a href="{{route('posts.index')}}" class="card-link">Back</a>
        </div>
    </div>
@endsection