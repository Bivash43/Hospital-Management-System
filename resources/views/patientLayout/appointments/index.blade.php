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
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Treatment</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;

                    @endphp
                    @foreach ($appointments as $appointment)

                        @foreach ($appointment->doctors as $doctor )
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td scope="row"><img src="{{ asset('storage/images/' . $doctor->image) }}" alt="doctor Image" style="max-width: 50px;"></td>
                                <td scope="row">{{ $doctor->f_name }} {{ $doctor->l_name }}</td>
                                <td scope="row">{{ $appointment->doa }}</td>
                                <td scope="row">{{ $appointment->case }}</td>
                                <td scope="row">{{ $doctor->mobile }}</td>
                                <td scope="row">
                                    @if ($appointment->status ==="Accepted" || $appointment->status === "Accepted - Confirmed")
                                        <span class="badge badge-success">{{ $appointment->status }}</span>
                                    @endif
                                    @if ($appointment->status ==="Rejected")
                                        <span class="badge badge-danger">{{ $appointment->status }}</span>
                                    @endif
                                    @if ($appointment->status ==="Cancelled")
                                        <span class="badge badge-danger">Cancelled</span>
                                    @endif
                                    @if (($appointment->status ==="Accepted - Cancelled"))
                                        <span class="badge badge-danger">Accepted but Cancelled</span>
                                    @endif
                                    @if ($appointment->status ==="Pending")
                                        <span class="badge badge-primary" style="background: gray">{{ $appointment->status }}</span>
                                    @endif
                                </td>

                                <td>
                                    <form action="{{ route('patient.action', [$appointment->id , 'signal' => 2] ) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Looking Forward</button>
                                    </form>
                                    <form action="{{ route('patient.action', [$appointment->id , 'signal'=>0] )}} " method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Cancel Appointment</button>
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
