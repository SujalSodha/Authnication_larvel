<!doctype html>  lang="en">

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

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->country }}</td>
                    <td>{{ $item->email }}</td>

                    <td>
                        <button><a href="{{ url('/student/delete/') }}/{{ $item->id }}"><i
                           class="fa fa-trash" style="font-size:15px;color:red"></i></a></button>
                           <button><a href="{{route('student.edit',['id'=> $item->id])}}"><i class='fas fa-edit' style='font-size:15px;'></i></a></button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
</body>

</html>
