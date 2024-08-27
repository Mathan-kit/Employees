<!DOCTYPE html>
<html>

<head>
    <title>Employee Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            background-color: #d9eef1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Employee Form</h2>
        <div class="form-container">
            <form action="/update_employee/{{$employee->id}}" method="post">
                @method("PUT")
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $employee->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{$employee->date_of_birth}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{$employee->address}}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" value="{{$employee->phone}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="deptId">Department</label>
                            <select class="form-control" id="department" name="dept_id" required>
                                <option value="">Select Department</option>
                                @foreach ($department as $d) 
                                <option value="{{$d->id}}" {{$employee->dept_id == $d->id? 'selected':' '}}>{{$d->dept_name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="designation">Designation Id</label>
                        <select class="form-control" id="designation" name="designation_id" required>
                                <option value="">Select Designation</option>
                                @foreach ($designation as $d) 
                                <option value="{{$d->id}}" {{$employee->designation_id==$d->id?'selected':''}}>{{$d->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date_of_joining">Date of Joining</label>
                        <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" value="{{$employee->date_of_joining}}"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{$employee->image}}" required>
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </d>
    </div>

</body>

</html>