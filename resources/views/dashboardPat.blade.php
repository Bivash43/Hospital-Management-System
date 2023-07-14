@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="card card-default color-palette-box">
    <div class="card-header">
        <h3 class="card-title">
            Hello Patient!!
        </h3>
    </div>
    <div class="card-body content-center">
        <div class="card-columns">
            <div class="card bg-primary">
                <div class="card-body text-center">
                    <i class=" fa fa-solid fa-droplet" style="color: #ffffff;"></i>
                    <p class="card-text"><h5>Blood Pressure</h5></p>
                </div>
            </div>
            <div class="card bg-warning">
                <div class="card-body text-center">
                    <p class="card-text">Some text inside the second card</p>
                </div>
            </div>
            <div class="card bg-success">
                <div class="card-body text-center">
                <p class="card-text">Some text inside the third card</p>
                </div>
            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>
@endsection