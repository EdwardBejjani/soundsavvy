@extends('dashboard.layouts.app')
@section('title')
Edit Course - Instructor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5 text-center">
            <h1 class="text-center text-shadow">Edit Course</h1>
            <form action="{{route('instructor.courses.update', $item->id)}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" class="form-control input" id="name" name="name" value="{{$item->name}}">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select input" id="category_id" name="category_id">
                        <option selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($item->category_id == $category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control input" id="description" name="description" rows="3">{{$item->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="sku" class="form-label">SKU</label>
                    <input type="text" class="form-control input" id="sku" name="sku" value="{{$item->SKU}}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control input" id="image" name="image" value="{{asset('storage/' . $item->image)}}">
                </div>
                <div class="mb-3">
                    <label for="subscription_fee" class="form-label">Subscription Fee (in USD)</label>
                    <input type="number" class="form-control input" id="price" name="price" value="{{$item->price}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection