@extends('layouts.app')

@section('', __('Dashboard'))

@section('content')

<div class="card card-default color-palette-box">
    <div class="card-header">
        <h3 class="card-title">
            <h3>Your Appointments</h3>
        </h3>
    </div>
    <div class="card-body">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Image</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;

                    @endphp
                    @foreach ($appointments as $appointment)

                        @foreach ($appointment->patients as $patient )
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td scope="row"><img src="{{ asset('storage/images/' . $patient->image) }}" alt="patient Image" style="max-width: 50px;"></td>
                                <td scope="row">{{ $patient->f_name }} {{ $patient->l_name }}</td>
                                <td scope="row">{{ $patient->email }}</td>
                                <td scope="row">{{ $patient->mobile }}</td>
                                <td scope="row">{{ $appointment->doa }}</td>
                                <td scope="row">{{ $appointment->case }}</td>
                                <td scope="row">
                                    @if ($appointment->status ==="Accepted")
                                        <span class="badge badge-success">Accepted</span>
                                    @endif
                                    @if ($appointment->status ==="Rejected")
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif
                                    @if ($appointment->status ==="Pending")
                                        <span class="badge badge-light">Pending</span>
                                    @endif
                                </td>

                                <td>
                                    <form action="{{ route('change.status', [$appointment->id , 'signal' => 1] ) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Accept</button>
                                    </form>
                                    <form action="{{ route('change.status', [$appointment->id , 'signal'=>-1] )}} " method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
