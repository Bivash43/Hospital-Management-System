@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="card card-default color-palette-box">
        <div class="card-header">
            <h3 class="card-title">
                <h3>Departments</h3>
            </h3>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDepartmentModal">Add Department</button>
                        </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($departments as $department)
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editDepartmentModal{{ $department->id }}">Edit</button>
                                    <form class="d-inline" action="{{ route('departments.destroy', $department->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @include('departments.editDepartment')

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection

@include('departments.createDepartment')





