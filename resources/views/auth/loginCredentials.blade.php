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

            <form action="{{ route('register') }}" method="post">
                {{ csrf_field() }}


                <input type="hidden" name="name" class="form-control" value="{{ $name }}">
                <input type="hidden" name="email" class="form-control" value="{{ $email }}">

                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Enter Your New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-4">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="role" value="{{ $role }}">

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-dark btn-block">Register</button>
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