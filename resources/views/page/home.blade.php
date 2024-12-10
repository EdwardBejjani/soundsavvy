@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
<!-- Hero Section -->
<section class="hero home-bg">
    <div class="container hero-container text-center">
        <a href="{{Route('home')}}"><img src="{{asset('homepage-images/soundsavvy.png')}}" alt="SOUNDSAVVY" /></a>
        <p class="lead">Become the master of your craft!</p>
        <a href="{{Route('learn')}}" class="btn btn-primary btn-lg">GET STARTED</a>
    </div>
</section>

<!-- Features Section -->
<section class="feature-bg">
    <div class="py-5 container-fluid feature-overlay">
        <h2 class="text-center mb-5 feature-heading">All-In-One</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon"><i class="fa-solid fa-music"></i></div>
                    <h3>Shop</h3>
                    <p class="px-5">
                        Dive into our extensive selection of musical instruments with
                        detailed descriptions and customer reviews, making it easy to
                        find the perfect fit for your musical journey.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon"><i class="fa-solid fa-book"></i></div>
                    <h3>Learn</h3>
                    <p class="px-5">
                        Unlock your musical potential with our interactive learning
                        feature, offering personalized lessons, video tutorials, and
                        practice tools tailored to your skill level and interests.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <h3>Chat</h3>
                    <p class="px-5">
                        Join the wave with our chat feature, where music enthusiasts can
                        share tips, ask questions, and connect with fellow members in
                        real time!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@auth

@endauth
@guest
<!-- CTA Section -->
<section class="bg-primary text-white cta-section">
    <div class="container-fluid text-center py-5 cta-overlay">
        <h2 class="mb-4 pt-5">Ready to get started?</h2>
        <p class="lead mb-4">Join thousands of motivated musicians today.</p>
        <button class="btn btn-primary btn-lg">SIGN UP NOW</button>
    </div>
</section>
@endguest
@endsection