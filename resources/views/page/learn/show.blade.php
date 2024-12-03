@extends('layout.layout')

@section('content')
<section class="hero learn-hero">
    <div class="feature-overlay">
        <div class="container hero-container text-center">
            <img src="learn-page/learn.png" alt="Contact Us" />
            <p class="lead">Become the master of your craft!</p>
        </div>
    </div>
</section>

<section class="courses">
    <h2>Featured Courses</h2>
    <div class="course-grid">
        <div class="course-card">
            <img src="learn-page/piano-basics.png" alt="Piano Basics">
            <div class="course-content">
                <span class="level">Beginner</span>
                <h3>Piano Basics</h3>
                <p>Learn the fundamentals of piano playing with our comprehensive beginner course.</p>
                <button class="enroll-btn">Enroll Now</button>
            </div>
        </div>

        <div class="course-card">
            <img src="learn-page/guitar-mastery.png" alt="Guitar Mastery">
            <div class="course-content">
                <span class="level">Intermediate</span>
                <h3>Guitar Mastery</h3>
                <p>Take your guitar skills to the next level with advanced techniques and theory.</p>
                <button class="enroll-btn">Enroll Now</button>
            </div>
        </div>

        <div class="course-card">
            <img src="learn-page/music-theory-101.png" alt="Music Theory">
            <div class="course-content">
                <span class="level">All Levels</span>
                <h3>Music Theory 101</h3>
                <p>Understanding the fundamentals of music theory to enhance your musicianship.</p>
                <button class="enroll-btn">Enroll Now</button>
            </div>
        </div>
    </div>
</section>
@endsection