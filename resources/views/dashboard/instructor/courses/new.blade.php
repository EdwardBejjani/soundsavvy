@extends('dashboard.layouts.app')

@section('title')
New Course - Instructor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5 text-center">
            <h1 class="text-center text-shadow mb-4 text-color-primary">New Course</h1>
            <form action="{{route('instructor.courses.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="type" value="course">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control input" id="name" name="name" placeholder="Course Name">
                    <label for="name">Course Name</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select input" id="category_id" name="category_id">
                        <option selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control input" id="sku" name="sku" placeholder="Course SKU">
                    <label for="sku">Course SKU</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control input" id="price" name="price" placeholder="Course Price">
                    <label for="price">Course Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control input" id="image" name="image" placeholder="Course Image" accept=".png, .jpg, .jpeg">
                    <label for="image">Course Image</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control input" id="description" name="description" placeholder="Course Description" style="height: 100px"></textarea>
                    <label for="description">Course Description</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection