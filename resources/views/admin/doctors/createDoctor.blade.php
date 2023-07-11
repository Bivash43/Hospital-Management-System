@extends('layouts.app')

@section('', __('Dashboard'))

@section('content')
<div class="card card-default color-palette-box">
    <div class="card-header">
        <h3 class="card-">
                <h3>{{ isset($doctor) ? 'Update Doctor Details' : 'Add New Doctor' }}</h3>
        </h3>
    </div>
    <div class="card-body">
        <div class="col-12">

            <form action="{{ isset($doctor) ? route('doctors.update', $doctor->id) : route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($doctor))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="f_name">First Name</label>
                    <input type="text" class="form-control" name="f_name" id="f_name" required value="{{ isset($doctor) ? $doctor->f_name : old('f_name') }}">
                </div>

                <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" class="form-control" name="l_name" id="l_name" required value="{{ isset($doctor) ? $doctor->l_name : old('l_name') }}">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender" required >
                        @isset($doctor)
                            <option value="{{ $doctor->gender }}">{{ $doctor->gender }}</option>
                        @endisset
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" required value="{{ isset($doctor) ? $doctor->mobile : old('mobile') }}">
                </div>

                @empty($user)
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                @endempty

                <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department[]" id="department" required>
                        @isset($doctor)
                            @foreach ($doctor->departments as $dep )
                                <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                            @endforeach
                        @endisset
                        @foreach ($departments as $department )
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" name="designation" id="designation" required value="{{ isset($doctor) ? $doctor->designation : old('designation') }}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required value="{{ isset($doctor) ? $doctor->address : old('address') }}">
                </div>

                @if (empty($user))
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required value="{{ isset($doctor) ? $doctor->email : old('email') }}">
                    </div>
                @else
                    <input type="hidden" name="email" id="email" value="{{ $user->email }}">

                @endif


                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" required value="{{ isset($doctor) ? $doctor->dob : old('dob') }}">
                </div>

                <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" class="form-control" name="education" id="education" required value="{{ isset($doctor) ? $doctor->education : old('education') }}">
                </div>

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