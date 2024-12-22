@extends('layouts.app')
@section('title')
Contact Us
@endsection
@section('content')
<!-- Hero Section -->
<section class="hero contact-bg">
    <div class="container hero-container text-center">
        <a href="{{route('contact')}}" class="animate-on-scroll slide-up"><img src="contact-page/contact-us.png" alt="Contact Us" /></a>
        <p class="lead animate-on-scroll slide-up delay-200">We're here to help with any questions you may have</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="contact-info-card text-center">
                    <h2 class="mb-4 animate-on-scroll slide-left">Contact Information</h2>
                    <div class="mb-4 animate-on-scroll slide-left">
                        <h5><i class="fa-solid fa-location-dot"></i> Address</h5>
                        <p>123 Music Street<br />Harmony City, HC 12345</p>
                    </div>
                    <div class="mb-4 animate-on-scroll slide-left">
                        <h5><i class="fa-solid fa-phone"></i> Phone</h5>
                        <a href="tel:+96170585121" class="text-decoration-none">
                            <p class="text-white">(+961) 70 585 121</p>
                        </a>
                    </div>
                    <div class="mb-4 animate-on-scroll slide-left">
                        <h5><i class="fa-solid fa-envelope"></i> Email</h5>
                        <a href="mailto:support@soundsavvy.com" class="text-decoration-none">
                            <p class="text-white">support@soundsavvy.com</p>
                        </a>
                    </div>
                    <div class="mb-4 animate-on-scroll slide-left">
                        <h5><i class="fa-solid fa-clock"></i> Business Hours</h5>
                        <p>
                            Monday - Friday: 9:00 AM - 6:00 PM<br />
                            Saturday: 10:00 AM - 4:00 PM<br />
                            Sunday: Closed
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info-card text-center">
                    <h2 class="mb-4 animate-on-scroll slide-right">Send us a Message</h2>
                    <form>
                        <div class="mb-3 animate-on-scroll slide-right">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required />
                        </div>
                        <div class="mb-3 animate-on-scroll slide-right">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                required />
                        </div>
                        <div class="mb-3 animate-on-scroll slide-right">
                            <label for="subject" class="form-label">Subject</label>
                            <input
                                type="text"
                                class="form-control"
                                id="subject"
                                required />
                        </div>
                        <div class="mb-3 animate-on-scroll slide-up">
                            <label for="message" class="form-label">Message</label>
                            <textarea
                                class="form-control"
                                id="message"
                                rows="5"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary animate-on-scroll slide-up">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection