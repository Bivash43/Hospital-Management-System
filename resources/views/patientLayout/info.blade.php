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
            <h2 class="card-title text-center">Fill Up the Form to proceed Further</h2>
            <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="gender">Gender:</label>
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
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
                    </div>
                </div>

                <input type="hidden" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="marital_status">Marital Status:</label>
                        <select class="form-control" id="marital_status" name="marital_status" required>
                            <option value="">Select your marital status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="blood_group">Blood Group:</label>
                        <select class="form-control" id="blood_group" name="blood_group" required>
                            <option value="">Select your marital status</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="blood_pressure">Blood Pressure:</label>
                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" placeholder="Enter your blood pressure" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="blood_sugar">Blood Sugar:</label>
                        <input type="text" class="form-control" id="blood_sugar" name="blood_sugar" placeholder="Enter your blood sugar" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="condition">Conditions:</label>
                        <input type="text" class="form-control" id="condition" name="condition" placeholder="Enter your medical conditions" required>
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
</html>
@include('includes.footer')