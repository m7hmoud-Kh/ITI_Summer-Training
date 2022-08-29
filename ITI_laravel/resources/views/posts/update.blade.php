@extends('layout')

@section('title')
    Update Post
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3>@if (Auth()->user()->cannot('update',$data['post']))
          You Can Not Updated
        @endif
    </h3>

    <form class="mt-4" method="post" action="{{ route('posts.update',$data['post']->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group ">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{old('title',$data['post']->title)}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Description</label>
            <textarea name="desc" class="form-control" >{{old('desc',$data['post']->desc)}}
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Cover</label>
            <input type="file" name='cover' class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
