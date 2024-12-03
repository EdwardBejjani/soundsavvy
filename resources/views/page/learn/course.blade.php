@extends('layout.layout')

@section('content')
<!--Course Section-->
<div class="course-section py-5">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h1 class="text-color-primary">Piano Basics</h1>
                <p class="text-muted">By John Doe</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Learn the fundamentals of piano playing with our comprehensive beginner course.</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <button class="btn btn-primary">Enroll Now</button>
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
                    <li>Introduction to Piano</li>
                    <li>Basic Piano Techniques</li>
                    <li>Chord Progressions</li>
                </ul>
            </div>
        </div>
        <!--begin::if Enrolled-->
        <!-- if status:completed, turn the box green, if not, stays black
         or if status:completed, show completion icon-->
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-color-primary">Your Progress</h2>
            </div>
        </div>
        <div class="course-grid">
            <div class="course-card">
                <img src="learn-page/piano-basics.png" alt="Piano Basics">
                <div class="course-content">
                    <h4 class="py-3">Introduction to Piano</h4>
                    <button class="enroll-btn">Watch Video</button>
                </div>
            </div>

            <div class="course-card">
                <img src="learn-page/piano-basics.png" alt="Piano Basics">
                <div class="course-content">
                    <h4 class="py-3">Introduction to Piano</h4>
                    <button class="enroll-btn">Watch Video</button>
                </div>
            </div>

            <div class="course-card">
                <img src="learn-page/piano-basics.png" alt="Piano Basics">
                <div class="course-content">
                    <h4 class="py-3">Introduction to Piano</h4>
                    <button class="enroll-btn">Watch Video</button>
                </div>
            </div>
        </div>
        <!--end::if Enrolled-->
    </div>
</div>
@endsection