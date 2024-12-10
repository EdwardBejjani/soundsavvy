@extends('layouts.app')
@section('title')
Login
@endsection
@section('content')

<!-- Login Section -->
<section class="login-section">
    <div class="container">
        <div class="login-card">
            <h2 class="text-center mb-4">Welcome Back!</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" required />
                    @error('email')
                    <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password"
                        required />
                    @error('password')
                    <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-grid">
                    <input type="submit" class="btn btn-primary my-4" value="Login">
                </div>
            </form>

            <div class="text-center mt-3">
                <p class="mb-0">
                    Don't have an account?
                    <a
                        href="{{Route('register')}}"
                        class="text-decoration-none"
                        style="color: blueviolet">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection