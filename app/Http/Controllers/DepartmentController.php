<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required',
        ]);

        Department::create($validatedData);
        return redirect()->route('departments.index')->with("success", "Department Created Successfully");
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $department->update($validatedData);
        return redirect()->route('departments.index')->with("success", "Department Updated Successfully");
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with("success", "Department Deleted Successfully");
    }
}
