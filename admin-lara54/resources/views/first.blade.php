<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MT | First</title>
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

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

<p>First Page </p>
    @foreach ($user as $u)
        <h2>{{ $u->title }}</h2>
        <h4>{!! $u->content !!}</h4>
        <img src="/images/{{ $u->thumbnail }}" height="100" width="100" alt="Image"/>
    @endforeach
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

    {!! Form::open(array('route' => 'first.post', 'files'=>true)) !!}

        <div class="col-md-12">
    {{ Form::label('title', 'Post Title') }}
    {{Form::text('title', 'Enter Title')}}
        </div>



        <div class="col-md-12">
        <textarea class="form-control summernote" name="detail"></textarea>
        </div>

        <div class="col-md-12">
            {!! Form::file('image_file', array('class' => 'form-control')) !!}
        </div>

        <div class="col-md-12">

    {{Form::submit('Save')}}
        </div>
    {!! Form::close() !!}

</div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
        //var markupStr = 'hello world' + '<img data-filename="keyboard.jpg" style="width: 520px;" src="/upload/15088285360.png">';
       // $('.summernote').summernote('code', markupStr);

        $('.summernote').summernote({

            height: 300,

        });

    });

</script>
</body>
</html>
