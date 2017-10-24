<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MT</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
    @endif


 {{--   @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif

    <div class="content">
        <h1>Hello, {{ $user }}</h1>
 @foreach ($user as $u)
     <p>This is user {{ $u->id }}</p>
     <p>This is user {{ $u->name }}</p>
 @endforeach

        {!! Form::open(['url' => 'c/2']) !!}
              {{Form::file('image')}}
         --}}

    {!! Form::open(array('route' => 'postimage','files'=>true)) !!}


    {{ Form::label('email', 'E-Mail Address') }}
       {{Form::text('email', 'example@gmail.com')}}


    <div class="col-md-6">
        {!! Form::file('image_file', array('class' => 'form-control')) !!}
    </div>

        {{Form::submit('Save')}}
        {!! Form::close() !!}

</div>
</div>
</body>
</html>
