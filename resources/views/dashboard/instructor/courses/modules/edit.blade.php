@extends('dashboard.layouts.app')
@section('title')
Edit Module - Instructor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container py-5">
        <div class="login-card mt-5 text-center">
            <h1 class="text-center text-shadow">Edit Module</h1>
            <form action="{{route('instructor.courses.modules.update', ['item'=>$item, 'module'=>$module])}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Module Title</label>
                    <input type="text" class="form-control input" id="title" name="title" value="{{$module->title}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control input" id="description" name="description" rows="3">{{$module->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label">Video URL</label>
                    <input type="text" class="form-control input" id="link" name="link" value="{{$module->link}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection