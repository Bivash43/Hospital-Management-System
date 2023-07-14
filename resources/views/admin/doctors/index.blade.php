@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="card card-default color-palette-box">
        <div class="card-header">
            <h3 class="card-title">
                <h3>Doctors</h3>
            </h3>
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Degree</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Joining Date</th>
                            @if (auth()->user()->role ==="admin")
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td scope="row"><img src="{{ asset('storage/images/' . $doctor->image) }}" alt="Doctor Image" style="max-width: 50px;"></td>
                                <td scope="row">{{ $doctor->f_name }} {{ $doctor->l_name }}</td>
                                <td scope="row">
                                    @foreach ($doctor->departments as $dep )
                                        {{ $dep->name }}
                                    @endforeach
                                </td>
                                <td scope="row">{{ $doctor->designation }}</td>
                                <td scope="row">{{ $doctor->education }}</td>
                                <td scope="row">{{ $doctor->mobile }}</td>
                                <td scope="row">{{ $doctor->email }}</td>
                                <td scope="row">{{ $doctor->created_at->toDateString() }}</td>
                                @if (auth()->user()->role ==="admin")
                                    <td scope="row">
                                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('doctors.destroy' , $doctor->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
@endsection