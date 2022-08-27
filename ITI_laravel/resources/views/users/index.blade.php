@extends('layout')

@section('title')
    All Users
@endsection

@section('content')


    @if(session()->has('message'))
        <div class="alert alert-{{session()->get('alert')}}">
            {{session()->get('message')}}
        </div>
    @endif



    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['users'] as $user)
                <tr>
                    <td>{{$user->id}}</td>

                    <td>
                        <a href="{{route('users.show',$user->id)}}">{{$user->name}}</a>
                    </td>
                    <td>{{$user->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
