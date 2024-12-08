@extends('layout.layout')
@section('title')
Contact Us
@endsection
@section('content')
<!-- Hero Section -->
<section class="hero contact-bg">
    <div class="container hero-container text-center">
        <a href="index.hmtl"><img src="contact-page/contact-us.png" alt="Contact Us" /></a>
        <p class="lead">We're here to help with any questions you may have</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="contact-info-card">
                    <h2 class="mb-4">Contact Information</h2>
                    <div class="mb-4">
                        <h5>Address</h5>
                        <p>123 Music Street<br />Harmony City, HC 12345</p>
                    </div>
                    <div class="mb-4">
                        <h5>Phone</h5>
                        <p>(555) 123-4567</p>
                    </div>
                    <div class="mb-4">
                        <h5>Email</h5>
                        <p>support@soundsavvy.com</p>
                    </div>
                    <div>
                        <h5>Business Hours</h5>
                        <p>
                            Monday - Friday: 9:00 AM - 6:00 PM<br />
                            Saturday: 10:00 AM - 4:00 PM<br />
                            Sunday: Closed
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info-card">
                    <h2 class="mb-4">Send us a Message</h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input
                                type="text"
                                class="form-control"
                                id="subject"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea
                                class="form-control"
                                id="message"
                                rows="5"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection