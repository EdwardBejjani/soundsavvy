@extends('layouts.app')

@section('content')
<!--Course Section-->
<div class="course-section py-5">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h1 class="text-color-primary">{{$item->name}}</h1>
                <p class="text-muted">{{$item->user->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">{{$item->description}}</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <button class="btn btn-primary shake me-3" id="addToCart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                <button class="btn btn-primary shake" id="buyNow"><i class="fa-solid fa-money-bill"></i> Enroll Now</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-color-primary">Course Content</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @forelse ($modules as $module)
                    <li>{{$module->name}}</li>
                    @empty
                    This course doesn't contain any modules yet
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection