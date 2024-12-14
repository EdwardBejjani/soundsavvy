@extends('dashboard.layouts.app')
@section('title')
Order #: {{ $order->id }} - Vendor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5 text-center">
            <h1 class="text-center text-shadow mb-4 text-color-primary">Order Details</h1>
            <div class="row">
                <div class="col text-start px-5">
                    <p class="lead mb-3"><span class="fw-bold">Order ID:</span> {{$order->id}}</p>
                    <p class="lead mb-3"><span class="fw-bold">User ID:</span> {{$order->user_id}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Date:</span> {{$order->created_at->format('Y-m-d')}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Status:</span> {{$order->status}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Total Price:</span> {{$order->total_price}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection