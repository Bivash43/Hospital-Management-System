@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="card card-default color-palette-box">
        <div class="card-header">
            <h3 class="card-title">
                <h3>Patients</h3>
            </h3>
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Treatment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($patients as $patient)
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td scope="row"><img src="{{ asset('storage/images/' . $patient->image) }}" alt="patient Image" style="max-width: 50px;"></td>
                                <td scope="row">{{ $patient->f_name }} {{ $patient->l_name }}</td>
                                <td scope="row">{{ $patient->gender }}</td>
                                <td scope="row">{{ $patient->age }}</td>
                                <td scope="row">{{ $patient->mobile }}</td>
                                <td scope="row">{{ $patient->dob }}</td>
                                <td scope="row">{{ $patient->blood_group }}</td>
                                <td scope="row">{{ $patient->Treatment }}</td>

                                <td>
                                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <form action="{{ route('patients.destroy' , $patient->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        </div>
@endsection