@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Create Employee</h6>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Name -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name"
                                        class="form-control"
                                        placeholder="Enter employee name"
                                        value="{{ old('name') }}"
                                        required>
                                </div>
                            </div>

                            <!-- Department -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Department</label>
                                    <input type="text" name="department"
                                        class="form-control"
                                        placeholder="Enter department name"
                                        value="{{ old('department') }}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control"
                                        placeholder="Enter email address"
                                        value="{{ old('email') }}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Create Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection