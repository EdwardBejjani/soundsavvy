@extends('layouts.app')
@section('title')
Learn
@endsection
@section('content')
<section class="hero learn-hero">
    <div class="feature-overlay">
        <div class="container hero-container text-center">
            <img class="animate-on-scroll slide-up" src="learn-page/learn.png" alt="Contact Us" />
            <p class="lead animate-on-scroll slide-up delay-200">Become the master of your craft!</p>
        </div>
    </div>
</section>

<section class="courses">
    <h2>Featured Courses</h2>
    <div class="course-grid">
        @forelse ($items as $item)
        <a href="{{route('course', $item)}}" class="text-decoration-none">
            <div class="course-card">
                <img src="learn-page/piano-basics.png" alt="Piano Basics">
                <div class="course-content">
                    <h3 class="text-white">{{$item->name}}</h3>
                    <p>{{$item->description}}</p>
                    <button class="btn btn-primary">View More</button>
                </div>
            </div>
        </a>
        @empty
        <h2>No Courses Found</h2>
        @endforelse
    </div>
</section>
@endsection