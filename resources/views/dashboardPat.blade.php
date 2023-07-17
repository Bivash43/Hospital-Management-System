@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="card card-default color-palette-box">
    <div class="card-header">
        <h3 class="card-title">
            Welcome {{ $patient->f_name }}
        </h3>
    </div>
    <div class="card-body">
        <div class="col-12">
            <h1 style=>Your DashBoard</h1>
        </div>

        <div class="d-flex">
            <div class="card d-inline-block" style="width: 28rem; background: pink;  margin-right: 40px; ">
                <div class="card-body">
                    <h5 class="card-title text-bold" style="margin-bottom:40px; color: white">Blood Pressure</h5>
                    <i class="fa fa-tint fa-2x float-right" style="color: red; " aria-hidden="true"></i>
                    <p class="card-text text-bold " style="margin-top:40px; color: gray">{{ $patient->blood_pressure }}</p>
                </div>
            </div>

            <div class="card d-inline-block" style="width: 28rem; background: lightgreen; margin-right: 40px">
                <div class="card-body">
                    <h5 class="card-title text-bold" style="margin-bottom:40px; color: white">Blood Sugar</h5>
                    <i class="fa fa-heartbeat fa-2x float-right" style="color: red; " aria-hidden="true"></i>
                    <p class="card-text text-bold " style="margin-top:40px; color: gray">{{ $patient->blood_sugar }}</p>
                </div>
            </div>

            <div class="card d-inline-block" style="width: 28rem; background: lightblue; margin-right: 40px">
                <div class="card-body">
                    <h5 class="card-title text-bold" style="margin-bottom:40px; color: white"> My Appointments</h5>
                    <i class="fa fa-calendar fa-2x float-right" style="color:cornsilk " aria-hidden="true"></i>
                    <p class="card-text text-bold " style="margin-top:40px; color: gray">{{ $patient->appointments()->count() }}</p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>
@endsection