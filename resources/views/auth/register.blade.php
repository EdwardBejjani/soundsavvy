@extends('layouts.app')
@section('title')
Register
@endsection
@section('content')
<!-- Register Section -->
<section class="login-section">
    <div class="container">
        <div class="login-card mb-5 animate-on-scroll slide-up">
            <h2 class="text-center mb-4">Create Your Account</h2>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control input mt-2" id="name" name="name" required />
                        @error('name')
                        <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control input mt-2" id="email" name="email" required />
                    @error('email')
                    <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control input mt-2"
                        id="password"
                        name="password"
                        required />
                    @error('password')
                    <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                    <div class="form-text text-color-primary mt-2">Must be at least 8 characters long</div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input
                        type="password"
                        class="form-control input mt-2"
                        id="password_confirmation"
                        name="password_confirmation"
                        required />
                    @error('password_confirmation')
                    <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control input mt-2" id="phone" name="phone" required />
                    @error('phone')
                    <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control input mt-2" id="address" name="address" required />
                    @error('address')
                    <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="terms"
                        required />
                    <label class="form-check-label terms-text" for="terms">
                        I agree to the
                        <a
                            href="#"
                            class="text-decoration-none"
                            style="color: blueviolet">Terms of Service</a>
                        and
                        <a
                            href="#"
                            class="text-decoration-none"
                            style="color: blueviolet">Privacy Policy</a>
                    </label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary py-2">
                        Create Account
                    </button>
                </div>
            </form>

            <div class="text-center mt-3">
                <p class="mb-0">
                    Already have an account?
                    <a
                        href="{{route('login')}}"
                        class="text-decoration-none"
                        style="color: blueviolet">Log in</a>
                </p>
            </div>
        </div>
    </div>
</section>

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close my-auto btn" data-dismiss="alert"><i class="fa-solid fa-x"></i></button>
</div>
@endif
@endsection