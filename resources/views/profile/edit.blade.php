@extends('layouts.app')

@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
        </ol>
    </nav>
    <div class="row">
        <!-- Profile Update Form -->
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Update Profile</h6>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" placeholder="Enter your name">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" placeholder="Enter your email">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Password Update Form -->
        <div class="col-md-12 stretch-card mt-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Update Password</h6>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="form-group">
                            <label class="control-label" for="update_current_password">Current Password</label>
                            <input type="password" id="update_current_password" name="current_password"
                                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                placeholder="Enter current password">
                            @error('current_password', 'updatePassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label class="control-label" for="update_password">New Password</label>
                            <input type="password" id="update_password" name="password"
                                class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                placeholder="Enter new password">
                            @error('password', 'updatePassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-group">
                            <label class="control-label" for="update_password_confirmation">Confirm New Password</label>
                            <input type="password" id="update_password_confirmation" name="password_confirmation"
                                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                                placeholder="Confirm new password">
                            @error('password_confirmation', 'updatePassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection