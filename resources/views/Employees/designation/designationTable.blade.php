<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designation Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <a href="/show_employee"><button class="btn btn-primary btn-sm">Employee</button></a>
        <a href="/show_department"><button class="btn btn-success btn-sm">Department</button></a>
        <form action="{{route('logout')}}" method="post" id="form" style="margin-top:1%">
            @csrf
            <input type="submit" value="logout" class="btn btn-danger btn-sm">
        </form>
    </div>
    <div class="container mt-5">
        <div style="display: flex; justify-content: space-between">
            <h2 class="mb-4">Designation Table</h2>
            <a href="/designation"><button class="btn btn-success btn-sm">Add</button></a>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Designation ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tr>
                @foreach ($designations as $desig)
                    <tr>
                        <td>{{$desig->id}}</td>
                        <td>{{$desig->name}}</td>
                        <td>{{$desig->dept_id}}</td>
                        <td>{{$desig->description}}</td>
                        <td><a href="/get_designation/{{$desig->id}}"><button class="btn btn-primary btn-sm">Update</button></a>
                        </td>
                        <td>
                        <form action="/delete_designation/{{$desig->id}}" method="post">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>