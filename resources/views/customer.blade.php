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

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Sujal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer') }}">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer/view') }}">Customers</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
    <form action="{{ $url }}" method="POST">
        @csrf
        <div style="text-align: center; color: brown">
            <h1><i><u>{{ $title }} </u></i></h1>
        </div>

        <div style="text-align: center">
            <label for="">Name</label>
            <input type="text" name="name" id="" value="{{ isset($customer) ? $customer->name : '' }}">
            <span>
                @error('name')
                    {{ $message }}
                @enderror
            </span>

            <label for="">Email</label>
            <input type="email" name="email" id="" value="{{ isset($customer) ? $customer->email : '' }}">
            @error('email')
                {{ $message }}
            @enderror
            <br><br>

            <label for="">Gender</label>
            <input type="text" name="gender" id="" value="{{ isset($customer) ? $customer->gender : '' }}">

            <label for="">Dob</label>
            <input type="date" name="dob" id="" value="{{ isset($customer) ? $customer->dob : '' }}">
            @error('dob')
                {{ $message }}
            @enderror

            <label for="">Add</label>
            <input type="text" name="address" id=""
                value="{{ isset($customer) ? $customer->address : '' }}">
            @error('address')
                {{ $message }}
            @enderror
            <br><br>

            <label for="">Pass</label>
            <input type="password" name="password" id="">
            @error('password')
                {{ $message }}
            @enderror

            {{-- <label for="">Status</label>
            <input type="text" name="status" id=""> --}}

            <label for="">Points</label>
            <input type="text" name="points" id=""
                value="{{ isset($customer) ? $customer->points : '' }}"><br><br>

        </div>
        <div style="text-align: center;">
            <input type="submit" style=" background-color: aquamarine; font-weight: bold; ">
        </div>
    </form>
</div>
</body>

</html>