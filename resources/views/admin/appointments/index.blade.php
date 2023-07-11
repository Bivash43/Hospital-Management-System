@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="card card-default color-palette-box">
        <div class="card-header">
            <h3 class="card-title">
                <h3>Appointments</h3>
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
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Case</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($appointments as $appointment)

                        <tr>
                            <td scope="row">{{ $i++ }}</td>
                                @foreach ($appointment->patients as $patient )
                                    <td scope="row"><img src="{{ asset('storage/images/' . $patient->image) }}" alt="patient Image" style="max-width: 50px;"></td>
                                    <td scope="row">{{ $patient->f_name }} {{ $patient->l_name }}</td>
                                    <td scope="row">{{ $patient->email }}</td>
                                    <td scope="row">{{ $patient->gender }}</td>
                                    <td scope="row">{{ $patient->mobile }}</td>
                                @endforeach
                                <td scope="row">{{ $appointment->doa }}</td>
                                <td scope="row">{{ $appointment->time }}</td>
                                @foreach ($appointment->doctors as $doctor )
                                    <td scope="row">{{ $doctor->f_name }} {{ $doctor->l_name }}</td>
                                @endforeach
                                <td scope="row">{{ $appointment->case }}</td>
                                <td>
                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary">
                                    Edit
                                    </a>
                                    <form action="{{ route('appointments.destroy' , $appointment->id) }}" method="POST">
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