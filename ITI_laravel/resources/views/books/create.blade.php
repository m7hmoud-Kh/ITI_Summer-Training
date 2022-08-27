@extends('layout')

@section('title')
    Create Book
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

    <form class="mt-4" method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Description</label>
            <textarea name="desc" class="form-control" >{{old('desc')}}
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Number of Page</label>
            <input type="number" name='no_of_page' class="form-control" id="exampleFormControlInput1" value="{{old('no_of_page')}}" >
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
