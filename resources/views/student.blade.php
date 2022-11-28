<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Form with insert</title>
    <style>
        label {
            color: red;
            size: 300px;
            font-weight: bold;
        }

        input {
            width: 25%;
            padding: 12px 20px;
            margin: 8px 0;
            /* display: inline-block; */
            border: 1px solid black;
            border-radius: 4px;
            box-sizing: border-box;

        }

        body {
            background-color: gray
        }
    </style>
</head>

{!! Form::open([
    'url' => $url,
    'method' => 'post'
]) !!}

@csrf

<div style="text-align: center; color: brown">
    <h1><i><u> {{ $title }} </u></i></h1>
</div>

<div style="text-align: center">

    {!! Form::text('name', old('name'), [
        'placeholder' => 'name',  
    ]) !!}

    {!! Form::text('country', '', [
        'placeholder' => 'Country',
    ]) !!}

    {!! Form::text('email', '', [
        'placeholder' => 'E-mail',
    ]) !!}
    <br><br>

    {!! Form::password('password', [
        'placeholder' => 'Password',
    ]) !!}
</div>
<div style="text-align: center;">

    {!! Form::submit('submit', [
        'style' => ' background-color: aquamarine; font-weight: bold; ',
    ]) !!}
</div>
{!! Form::close() !!}
</body>

</html>
