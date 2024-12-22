@extends('dashboard.layouts.app')
@section('title')
Course #: {{$item->id}} - Instructor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container row py-5">
        <div class="col-md-6">
            <div class="login-card mt-5 text-center">
                <h1 class="text-center text-shadow mb-4 text-color-primary">Course Details</h1>
                <div class="row">
                    <div class="col text-start px-5">
                        <p class="lead mb-3"><span class="fw-bold">Course ID:</span> {{ $item->id }}</p>
                        <p class="lead mb-3"><span class="fw-bold">Instructor Name:</span> {{ $item->user->name }}</p>
                        <p class="lead mb-3"><span class="fw-bold">Name:</span> {{ $item->name }}</p>
                        <p class="lead mb-3"><span class="fw-bold">Description:</span><br> {{ $item->description }}</p>
                        <p class="lead mb-3"><span class="fw-bold">SKU:</span> {{ $item->SKU }}</p>
                        <!-- img here -->
                        <p class="lead mb-3"><span class="fw-bold">Price:</span> {{ $item->price }} USD</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="login-card mt-5 text-center">
                <h1 class="text-center text-shadow mb-4 text-color-primary">Modules</h1>
                <div class="text-end">
                    <a href="{{route('instructor.courses.modules.new', $item)}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> New Module</a>
                </div>
                <div class="row mt-2">
                    @foreach ($modules as $module)
                    <a href="{{route('instructor.courses.modules.show', ['item'=>$item, 'module'=>$module])}}" class="text-decoration-none">
                        <div class="col-12">
                            <div class="card h-100 db-btn">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title">{{$module->title}}</h5>
                                        <div class="d-flex">
                                            <a href="{{route('instructor.courses.modules.edit', ['item'=>$item, 'module'=>$module])}}" class="btn btn-primary me-2"><i class="fa-solid fa-pencil"></i></a>
                                            <form action="{{route('instructor.courses.modules.destroy', ['item'=>$item, 'module'=>$module])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-del"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <p>{{$module->description}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection