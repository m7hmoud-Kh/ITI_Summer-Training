@extends('layout')

@section('title')
    Show
@endsection

@section('content')
    <div class="card mt-4" style="width: 18rem;">
        <img src="{{asset('assets/books/'.$data['book']->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">{{$data['book']->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$data['book']->no_of_page}}</h6>
        <h6 class="card-subtitle mb-2 text-muted">{{$data['book']->created_at}}</h6>
        <p class="card-text">{{$data['book']->desc}}</p>

        <a href="{{route('books.index')}}" class="card-link">Back</a>
        </div>
    </div>
@endsection