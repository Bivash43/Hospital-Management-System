@extends('layouts.app')

@section('', __('Dashboard'))

@section('content')
<div class="card card-default color-palette-box">
    <div class="card-header">
        <h3 class="card-">
                <h3>{{ isset($appointment) ? 'Update Appointment Details' : 'Add New Appointment' }}</h3>
        </h3>
    </div>
    <div class="card-body">
        <div class="col-12">

            <form action="{{ isset($appointment) ? route('appointments.update', $appointment->id) : route('appointments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($appointment))
                    @method('PUT')
                @endif

                <input type="hidden" name="patient[]" id="doctor" value="{{ $patient->id }}" required>

                <div class="form-group">
                    <label for="doctor">Consulting Doctor</label>
                    <select class="form-control" name="doctor[]" id="doctor" required>
                        @foreach ($doctors as $doctor )
                            <option value="{{ $doctor->id }}">{{ $doctor->f_name }} {{ $doctor->l_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="doa">Date of Appointment</label>
                    <input type="date" class="form-control" name="doa" id="doa" required value="{{ isset($appointment) ? $appointment->doa : old('doa') }}">
                </div>

                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" name="time" id="time" required value="{{ isset($appointment) ? $appointment->time : old('time') }}">
                </div>

                <div class="form-group">
                    <label for="case">Injury/Condition</label>
                    <input type="text" class="form-control" name="case" id="case" required value="{{ isset($appointment) ? $appointment->case : old('case') }}">
                </div>

                <div class="form-group">
                    <label for="note">Note</label>
                    <input type="note" class="form-control" name="note" id="note" required value="{{ isset($appointment) ? $appointment->note : old('note') }}">
                </div>

                <div class="form-group">
                    <label for="report">Report</label>
                    <input type="file" class="form-control-file" name="report" id="report" accept="report/*">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection