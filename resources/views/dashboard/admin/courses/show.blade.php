@extends('dashboard.layouts.app')
@section('title')
{{$item->name}} - Admin Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5 text-center">
            <h1 class="text-center text-shadow mb-4 text-color-primary">Item Details</h1>
            <div class="row">
                <div class="col text-start px-5">
                    <p class="lead mb-3"><span class="fw-bold">Course ID:</span> {{ $item->id }}</p>
                    <p class="lead mb-3"><span class="fw-bold">Tutor ID:</span> {{ $item->user_id }}</p>
                    <p class="lead mb-3"><span class="fw-bold">Name:</span> {{ $item->name }}</p>
                    <p class="lead mb-3"><span class="fw-bold">Description:</span> {{ $item->description }}</p>
                    <p class="lead mb-3"><span class="fw-bold">SKU:</span> {{ $item->SKU }}</p>
                    <!-- img here -->
                    <p class="lead mb-3"><span class="fw-bold">Price:</span> {{ $item->price }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection