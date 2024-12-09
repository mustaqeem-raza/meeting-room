@extends('layouts.app')

@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employee Data</li>
        </ol>
    </nav>

    <div class="row mb-3">
        <div class="col-md-12 d-flex align-items-center justify-content-end gap-2">
            <!-- Link to create a new employee -->
            <a href="{{ route('employees.create') }}" class="btn btn-success">Create Employee</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Employee Data Table</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->department }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <!-- Edit Button -->
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" id="deleteForm{{ $employee->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $employee->id }})">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection