@extends('layouts.app')

@section('', __('Dashboard'))

@section('content')
<div class="card card-default color-palette-box">
    <div class="card-header">
        <h3 class="card-">
                <h3>{{ isset($patient) ? 'Update Patient Details' : 'Add New Patient' }}</h3>
        </h3>
    </div>
    <div class="card-body">
        <div class="col-12">

            <form action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($patient))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="f_name">First Name</label>
                    <input type="text" class="form-control" name="f_name" id="f_name" required value="{{ isset($patient) ? $patient->f_name : old('f_name') }}">
                </div>

                <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" class="form-control" name="l_name" id="l_name" required value="{{ isset($patient) ? $patient->l_name : old('l_name') }}">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender" required >
                        @isset($patient)
                            <option value="{{ $patient->gender }}">{{ $patient->gender }}</option>
                        @endisset
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" required value="{{ isset($patient) ? $patient->mobile : old('mobile') }}">
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" required value="{{ isset($patient) ? $patient->dob : old('dob') }}">
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" name="age" id="age" required value="{{ isset($patient) ? $patient->age : old('age') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required value="{{ isset($patient) ? $patient->email : old('email') }}">
                </div>

                <div class="form-group">
                    <label for="marital_status">Marital status</label>
                    <select class="form-control" name="marital_status" id="marital_status" required >
                        @isset($patient)
                            <option value="{{ $patient->marital_status }}">{{ $patient->marital_status }}</option>
                        @endisset
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required value="{{ isset($patient) ? $patient->address : old('address') }}">
                </div>

                <div class="form-group">
                    <label for="blood_group">Blood Group</label>
                    <select class="form-control" name="blood_group" id="blood_group" required >
                        @isset($patient)
                            <option value="{{ $patient->blood_group }}">{{ $patient->blood_group }}</option>
                        @endisset
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

                <div class="form-group">
                    <label for="blood_pressure">Blood Pressure</label>
                    <input type="blood_pressure" class="form-control" name="blood_pressure" id="blood_pressure" required value="{{ isset($patient) ? $patient->blood_pressure : old('blood_pressure') }}">
                </div>

                <div class="form-group">
                    <label for="blood_sugar">Blood Sugar</label>
                    <input type="blood_sugar" class="form-control" name="blood_sugar" id="blood_sugar" required value="{{ isset($patient) ? $patient->blood_sugar : old('blood_sugar') }}">
                </div>

                <div class="form-group">
                    <label for="condition">Conditions</label>
                    <input type="condition" class="form-control" name="condition" id="condition" required value="{{ isset($patient) ? $patient->condition : old('condition') }}">
                </div>

                {{-- <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department[]" id="department" required>
                        @isset($patient)
                            @foreach ($patient->departments as $dep )
                                <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                            @endforeach
                        @endisset
                        @foreach ($departments as $department )
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection