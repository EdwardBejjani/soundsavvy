@extends('dashboard.layouts.app')
@section('title')
    Edit User - Admin Dashboard
@endsection

@section('content')
    <div class="home-bg min-vh-100 pt-3">
        <div class="container py-5">
            <div class="login-card mt-5 text-center">
                <h1 class="text-center text-shadow">Edit User</h1>
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ $user->name }}" required />
                        @error('name')
                            <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ $user->email }}" required />
                        @error('email')
                            <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" required />
                        @error('password')
                            <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label fw-bold">Role</label>
                        <select class="form-select @error('role') is-invalid @enderror" name="role" id="role"
                            required>
                            <option value="vendor" @if ($user->role == 'vendor') selected @endif>Vendor</option>
                            <option value="instructor" @if ($user->role == 'instructor') selected @endif>Instructor
                            </option>
                        </select>
                        @error('role')
                            <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Phone</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            id="phone" value="{{ $user->phone }}" required />
                        @error('phone')
                            <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            id="address" value="{{ $user->address }}" required />
                        @error('address')
                            <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 mb-3 px-3 py-2">Update User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
