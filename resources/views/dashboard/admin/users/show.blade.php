@extends('dashboard.layouts.app')
@section('title')
{{$user->name}} - Admin Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5 text-center">
            <h1 class="text-center text-shadow mb-4 text-color-primary">User Profile</h1>
            <div class="row">
                <div class="col text-start px-5">
                    <p class="lead mb-3"><span class="fw-bold">Name:</span> {{$user->name}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Email:</span> {{$user->email}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Role:</span> {{$user->role}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Phone:</span> {{$user->phone}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Address:</span> {{$user->address}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection