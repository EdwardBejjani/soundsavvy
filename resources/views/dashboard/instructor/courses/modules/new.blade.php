@extends('dashboard.layouts.app')

@section('title')
New Module - Instructor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5">
            <h1 class="text-center text-shadow mb-4 text-color-primary">New Module</h1>
            <form method="POST" action="{{route('instructor.courses.modules.create', $item)}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label text-white">Title</label>
                            <input type="text" class="form-control input" id="title" name="title" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label text-white">Description</label>
                            <input type="text" class="form-control input" id="description" name="description" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="link" class="form-label text-white">Link</label>
                            <input type="url" class="form-control input" id="link" name="link" required>
                            @error('link')
                            <span class="fs-6 text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection