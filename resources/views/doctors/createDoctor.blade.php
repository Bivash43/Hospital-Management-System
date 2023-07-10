@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="card card-default color-palette-box">
    <div class="card-header">
        <h3 class="card-title">
                <h3>Doctors</h3>
        </h3>
    </div>
    <div class="card-body">
        <div class="col-12">

            <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="f_name">First Name</label>
                    <input type="text" class="form-control" name="f_name" id="f_name" required>
                </div>

                <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" class="form-control" name="l_name" id="l_name" required>
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department[]" id="department" required>
                        @foreach ($departments as $department )
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" name="designation" id="designation" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" required>
                </div>

                <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" class="form-control" name="education" id="education" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" name="image" id="image" accept="image/*" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection