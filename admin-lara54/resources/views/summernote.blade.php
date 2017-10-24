<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5 - Summernote Wysiwyg Editor with Image Upload Example</title>

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

</head>

<body>

<img data-filename="keyboard.jpg" style="width: 520px;" src="/upload/15088285360.png">


<form method="POST" action="{{ route('summernote.post') }}">

    {{ csrf_field() }}

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Details:</strong>

            <textarea class="form-control summernote" name="detail"></textarea>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</form>

</body>

<script type="text/javascript">

    $(document).ready(function() {
        var markupStr = 'hello world' + '<img data-filename="keyboard.jpg" style="width: 520px;" src="/upload/15088285360.png">';
        $('.summernote').summernote('code', markupStr);

        $('.summernote').summernote({

            height: 300,

        });

    });

</script>

</html>