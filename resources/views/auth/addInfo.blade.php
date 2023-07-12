<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', env('APP_NAME'))">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/custom.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-dark rounded-0">
        <div class="card-header text-center bg-dark py-3 rounded-0">
            <img class="yamaha-logo" src="{{asset('assets/dist/img/img.png')}}" alt="Yamaha Nepal">
        </div>
        <div class="card-body">
            <p class="login-box-msg h6">Register to become our user</p>
            @include('includes.message')

            <form action="{{ ($user->role==="doctor") ? route('info.addDoctor') : route('info.addPatient') }}" method="post">
                {{ csrf_field() }}
                @if ($user->role==="doctor")
                    <div class="input-group mb-3">
                        <input type="f_name" name="f_name" class="form-control" placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="l_name" name="l_name" class="form-control" placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                    <select class="form-control" name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                    <select class="form-control" name="department" id="department" required>
                        @foreach ($departments as $department )
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="designation" class="form-control" placeholder="Designation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="address" class="form-control" placeholder="Address">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="hidden" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="input-group mb-4">
                        <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <input type="text" name="education" class="form-control" placeholder="Education">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                         <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($user->role=="patient")
                    <div class="input-group mb-3">
                        <input type="f_name" name="f_name" class="form-control" placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="l_name" name="l_name" class="form-control" placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                    <select class="form-control" name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    <div class="input-group mb-4">
                        <input type="text" name="age" class="form-control" placeholder="Age">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="hidden" name="email" class="form-control" value="$user->email">
                    </div>

                    <div class="input-group mb-4">
                    <select class="form-control" name="marital_status" id="marital_status" required>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </select>
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="address" class="form-control" placeholder="Address">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                    <select class="form-control" name="blood_group" id="Blood Group" required>
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

                    <div class="input-group mb-4">
                        <input type="text" name="blood_pressure" class="form-control" placeholder="Blood Pressure">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="blood_sugar" class="form-control" placeholder="Blood Sugar">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="condition" class="form-control" placeholder="Condition">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>


                    <div class="input-group mb-4">
                         <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-dark btn-block">Submit</button>
                    </div>
                    <div class="col-8">
                        <a href="{{ route('login') }}">Already Have an Account</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets//plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>