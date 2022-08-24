<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>
        @yield('title','defalut Page')
    </title>
</head>
<body>


        @include('navbar')

        <div class="container">

            @yield('content')

        </div>



    <script src="{{asset('js/jquery-3.5.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
