@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Departments</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDepartmentModal">Add Department</button>
        </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            <tr>
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
@endsection

@include('departments.createDepartment')





