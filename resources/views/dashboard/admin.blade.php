@extends('dashboard.layouts.app')
@section('title')
Admin Dashboard
@endsection

@section('content')
<div class="home-bg">
    <div class="container pt-5">
        <h1 class="text-center mt-5 text-shadow">Admin Dashboard</h1>
        <div class="row gap-4 mt-4 justify-content-center">
            <a href="#" class="col-auto bg-dark shadow rounded pt-4 pb-2 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Total Users</h3>
                <p class="text-2xl mt-2 text-shadow count-up mb-1">59431</p>
            </a>
            <a href="#" class="col-auto bg-dark shadow rounded pt-4 pb-2 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Total Courses</h3>
                <p class="text-2xl mt-2 text-shadow count-up">54</p>
            </a>
            <a href="#" class="col-auto bg-dark shadow rounded pt-4 pb-2 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Total Orders</h3>
                <p class="text-2xl mt-2 text-shadow count-up  mb-1">5746</p>
            </a>
        </div>
        <h2 class="text-center mt-4 text-shadow">Financial Management</h2>
        <div class="row gap-4 mt-4 justify-content-center">
            <a href="#" class="col-auto bg-dark shadow rounded py-4 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Payments</h3>
            </a>
            <a href="#" class="col-auto bg-dark shadow rounded py-4 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Reports</h3>
            </a>
        </div>
        <h2 class="text-center mt-4 text-shadow">Communication Tools</h2>
        <div class="row gap-4 mt-4 justify-content-center pb-5">
            <a href="#" class="col-auto bg-dark shadow rounded py-4 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">E-mail</h3>
            </a>
            <a href="#" class="col-auto bg-dark shadow rounded py-4 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Notifications</h3>
            </a>
        </div>
    </div>
</div>
@endsection