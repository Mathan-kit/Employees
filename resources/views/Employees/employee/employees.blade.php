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
            <form action="/add_employee" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" pattern="[0-9]{10}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="deptId">Department</label>
                        <select class="form-control" id="department" name="dept_id" required>
                            <option value="">Select Department</option>
                            @foreach ($departments as $d)
                                <option value="{{$d->id}}">{{$d->dept_name}}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="designation">Designation</label>
                        <select class="form-control" name="designation_id" id="designation" required>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-md-6"></div>
                    <label for="date_of_joining">Date of Joining</label>
                    <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

        document.getElementById("department").addEventListener("change", (e) => {
            var departmentId = document.getElementById('department').value;

            fetch(`http://127.0.0.1:8000/fetch_designations/${departmentId}`)
                .then(res => res.json())
                .then(data => {
                    let cont = `<option value="">Select Designation</option>`;
                    for (let i of data) {
                        cont += `<option value="${i.id}">${i.name}</option>`;
                    }
                    document.getElementById("designation").innerHTML = cont;
                })
        });


    </script>
</body>

</html>