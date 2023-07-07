@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="container">
        <div class="card card-default color-palette-box">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Doctor Information</h2>
                        <form action="{{ route('doctors.store') }}" method="POST">
                            <div class="form-group">
                                <label for="f_name">First Name:</label>
                                <input type="text" class="form-control" id="f_name" placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label for="l_name">Last Name:</label>
                                <input type="text" class="form-control" id="l_name" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" id="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number">
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2>Work Information</h2>
                        <form>
                            <div class="form-group">
                                <label for="designation">Designation:</label>
                                <input type="text" class="form-control" id="designation" placeholder="Enter Designation">
                            </div>
                            <div class="form-group">
                                <label for="department">Department:</label>
                                <select class="form-control" id="department">
                                    <option>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="address" placeholder="Enter Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="education">Education:</label>
                                <input type="text" class="form-control" id="education" placeholder="Enter Education">
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection