@extends('layout')

@section('title')
    All Books
@endsection

@section('content')


    @if(session()->has('message'))
        <div class="alert alert-{{session()->get('alert')}}">
            {{session()->get('message')}}
        </div>
    @endif



    <a href="{{route('books.create')}}" class='btn btn-primary mb-4 mt-5'>New Book</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Desc</th>
                <th scope="col">no of Page</th>
                <th scope="col">Action</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data['books'] as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->desc}}</td>
                    <td>{{$book->no_of_page}}</td>
                    <td>
                        <a href="{{route('books.show',$book->id)}}" class='btn btn-primary'>Show</a>

                        <a href="{{route('books.edit',$book->id)}}" class="btn btn-success"> Edit </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('books.destroy',$book->id)}}">
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
