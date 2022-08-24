@extends('layout')

@section('title')
    Create
@endsection

@section('content')
    <form class="mt-4" method="post" action="{{Route('posts.store')}}">
        @csrf
        <div class="form-group ">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Description</label>
            <textarea name="desc" class="form-control">
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Price</label>
            <input type="number" name='price' class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
