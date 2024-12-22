@extends('dashboard.layouts.app')
@section('title')
{{$module->name}} - Instructor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5 text-center">
            <h1 class="text-center text-shadow mb-4 text-color-primary">Order Details</h1>
            <div class="row">
                <div class="col text-start px-5">
                    <p class="lead mb-3"><span class="fw-bold">Module Name:</span> {{$module->title}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Course Name:</span> {{$item->name}}</p>
                    <p class="lead mb-3"><span class="fw-bold">Description:</span> {{$module->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection