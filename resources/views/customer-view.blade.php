<!doctype html>
<html lang="en">

<head>
    
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>

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

        <div class="d-flex justify-content-between">
            <button><a href="/customer/trash">Go to trash</a></button>
            <button><a href="{{ url('/customer') }}">Add</a></button>
        </div><br>
        <div class="d-flex justify-content-center">
            <form action="" method="" class="col-4">
                <div class="form-group d-flex">
                    <input class="form-control" type="search" name="search" placeholder="Search by name or email" value="{{ Request::get('search') }}">
                    <button class="btn btn-primary" style="font-size: 12px; ">Search</button>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->dob }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            @if ($item->status == '1')
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>
                            <button><a
                                    href="{{ url('/customer/delete/') }}/{{ $item->customer_id }}"onclick="return confirm('Are you sure trash you data?')">Trash</a></button>
                            <button><a href="{{ route('customer.edit', ['id' => $item->customer_id]) }}"><i
                                        class='fas fa-edit' style='font-size:15px;'></i></a></button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="row">
        {{$customers->withQueryString()->links()}}
    </div>

</body>

</html>
