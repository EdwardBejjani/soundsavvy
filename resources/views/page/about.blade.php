@extends('layout.layout')
@section('title')
About Us
@endsection
@section('content')
<!-- Hero Section -->
<section class="hero about-bg">
    <div class="feature-overlay">
        <div class="container-fluid hero-container text-center">
            <a href="{{Route('about')}}">
                <img src="about-page/about-us.png" alt="About Us" />
            </a>
            <p class="lead mb-4">Empowering musicians worldwide since 2024</p>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission">
    <div class="cta-overlay py-5">
        <div class="container text-center py-5">
            <h1 class="mb-4 mt-5">OUR MISSION</h1>
            <p>
                At SoundSavvy, we're dedicated to making music education accessible,
                engaging, and enjoyable for everyone. We believe that music has the
                power to transform lives and bring people together.
            </p>
        </div>
    </div>
</section>

<!-- Values Section -->

<section class="values">
    <div class="cta-overlay">
        <div class="container">
            <h2 class="text-center py-5">Our Values</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <h3>Excellence</h3>
                        <p class="px-3">
                            We strive for excellence in everything we do, from product
                            quality to customer service.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <h3>Innovation</h3>
                        <p class="px-3">
                            We constantly innovate to provide the best learning experience
                            for our community.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <h3>Community</h3>
                        <p class="px-3">
                            We foster a supportive community where musicians can learn and
                            grow together.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection