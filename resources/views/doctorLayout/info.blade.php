<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Please Fill Up the Details to Proceed Further</h2>
            <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                @include('includes.message')
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="f_name">First Name:</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter your first name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="l_name">Last Name:</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter your last name" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender" >Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="mobile">Mobile:</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="department">Department:</label>
                        <select class="form-control" id="department" name="department" required>
                            <option value="">Select your Department</option>
                            @foreach ($departments as $department )
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="designation">Designation:</label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter your designation" required>
                    </div>
                </div>


                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>
                    </div>

                    <input type="hidden" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="education">Education:</label>
                        <input type="text" class="form-control" id="education" name="education" placeholder="Enter your education" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                    </div>

                    <div class="form-gropu col-md-6">
                        <button type="submit" class="btn btn-primary float-left">Submit</button>
                        <button type="reset" class="btn btn-danger float-left">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@include('includes.footer')
</html>
