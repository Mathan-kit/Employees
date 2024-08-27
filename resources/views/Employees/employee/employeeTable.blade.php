<!DOCTYPE html>
<html>

<head>
    <title>Employee Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-container {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            overflow: auto;
            /* Add horizontal scrolling if needed */
        }

        .table {
            width: 100%;
            table-layout: auto;
            /* Allow columns to adjust based on content */
        }

        .table th,
        .table td {
            white-space: nowrap;
            /* Prevent text from wrapping */
        }

        .btn-sm {
            min-width: 70px;
            /* Ensure buttons have consistent size */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="/show_department"><button class="btn btn-primary btn-sm">Department</button></a>
        <a href="/show_designation"><button class="btn btn-success btn-sm">Designation</button></a>
        <form action="{{route('logout')}}" method="post" id="form" style="margin-top:1%">
            @csrf
            <input type="submit" value="logout" class="btn btn-danger btn-sm">
        </form>
    </div>
    <div class="container mt-5">
        <div style="display: flex; justify-content: space-between">
            <h2 class="mb-4">Employee Table</h2>
            <a href="/employee"><button class="btn btn-success btn-sm">Add</button></a>
        </div>
        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Date of Joining</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $e)
                        <tr>
                            <td>{{$e->id}}</td>
                            <td>{{$e->name}}</td>
                            <td>{{$e->gender}}</td>
                            <td>{{$e->date_of_birth}}</td>
                            <td>{{$e->address}}</td>
                            <td>{{$e->phone}}</td>
                            <td>{{$e->email}}</td>
                            <td>{{$e->dept_id}}</td>
                            <td>{{$e->designation_id}}</td>
                            <td><img src="{{ Storage::url($e->image) }}" width="100px" height="100px" /></td>
                            <td>{{$e->date_of_joining}}</td>
                            <td><a href="/get_employee/{{$e->id}}"><button
                                        class="btn btn-primary btn-sm">Update</button></a></td>
                            <td>
                                <form action="/delete_employee/{{$e->id}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row g-4">
            @foreach ($employees as $emp)
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center bg-dark text-white">
                            <h5 class="mb-0">Employee Information</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ Storage::url($emp->image) }}" class="rounded-circle mb-3" alt="Employee Photo"
                                style="width: 100px;">
                            <h5 class="card-title">{{ $emp->name }}</h5>
                            <p class="card-text"> {{ $emp->designation->name}}</p>
                            <p class="card-text">
                                {{ $departments->firstWhere('id', $emp->dept_id)->dept_name ?? '' }}
                            </p>
                            <p class="card-text"><strong>Email:</strong> {{ $emp->email }}</p>
                            <a href="#" class="btn btn-primary mt-3">Contact</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>