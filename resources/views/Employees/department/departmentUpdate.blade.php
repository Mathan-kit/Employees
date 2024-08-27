<!DOCTYPE html>
<html>
<head>
    <title>Department Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Department Form</h2>
        <div class="form-container">
            <form action="/update_department/{{$department->id}}" method="post">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="dept_name">Department Name</label>
                    <input type="text" class="form-control" id="dept_name" name="dept_name" value="{{$department->dept_name}}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{$department->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
