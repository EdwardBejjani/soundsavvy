@extends('layout.layout')
@section('title')
Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="lead text-center">Welcome to your dashboard, {{ Auth::user()->name }}!</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <h2 class="text-center">Add New Item</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="itemName" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="itemDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="itemDescription" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="itemPrice" class="form-label">Price (in USD)</label>
                    <input type="number" class="form-control" id="itemPrice" name="price" min="0" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="itemImage" class="form-label">Image</label>
                    <input type="file" class="form-control" id="itemImage" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2 mb-3">Add Item</button>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <h2 class="text-center">Add New Course</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="courseName" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="courseName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="courseDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="courseDescription" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="courseImage" class="form-label">Image</label>
                    <input type="file" class="form-control" id="courseImage" name="image" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="courseSubscriptionFee" class="form-label">Subscription Fee (in USD)</label>
                    <input type="number" class="form-control" id="courseSubscriptionFee" name="subscription_fee" min="0" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2 mb-5">Add Course</button>
            </form>
        </div>
    </div>
</div>
@endsection