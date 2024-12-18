@extends('dashboard.layouts.app')

@section('title')
New Product - Vendor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5 text-center">
            <h1 class="text-center text-shadow mb-4 text-color-primary">New Product</h1>
            <form action="{{route('vendor.products.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                    <label for="name">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="Product SKU">
                    <label for="sku">Product SKU</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="category_id" id="category_id">
                        <option value=""></option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="price">Product Category</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Product Price">
                    <label for="price">Product Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="image" name="image" placeholder="Product Image">
                    <label for="image">Product Image</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="description" name="description" placeholder="Product Description" style="height: 100px"></textarea>
                    <label for="description">Product Description</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection