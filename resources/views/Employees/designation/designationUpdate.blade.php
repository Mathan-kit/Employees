<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designation Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Designation Form</h2>
        <form action="/update_designation/{{$designation->id}}" method="post">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label for="designationName">Name</label>
                <input type="text" class="form-control" id="designationName" name="designationName" value="{{$designation->name}}" placeholder="Enter Designation Name">
            </div>            
            <div class="form-group">
                <label for="department">Department</label>
                <!-- <input type="text" class="form-control" id="deptId" placeholder="Enter Department"> -->
                <select class="form-control" id="department" name="dept_id" required>
                    <option value="">Select Department</option>
                    @foreach ($departments as $a)
                    <option value="{{$a->id}}">{{$a->dept_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"  rows="3" placeholder="Enter Description">{{$designation->description}}</textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
