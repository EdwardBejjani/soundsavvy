@extends('layouts.app')
@section('title')
{{ $user->name }}
@endsection
@section('content')
<div class="container py-5 mt-5">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="profile-card">
                {{-- Profile Header --}}
                <div class="profile-header text-center">
                    <h1 class="mb-1 animate-on-scroll slide-up">{{ $user->name }}</h1>
                    <p class="text-white-50 animate-on-scroll slide-up delay-200">{{ $user->email }}</p>

                    {{-- Profile Tabs --}}
                    <ul class="nav nav-tabs dark-tabs z-indez-1000" id="profileTabs" role="tablist">
                        <li class="nav-item nav-item-custom animate-on-scroll slide-right" role="presentation">
                            <button class="nav-link nav-link-custom active" id="personal-tab" data-bs-toggle="tab"
                                data-bs-target="#personal" type="button" role="tab">
                                Personal Info
                            </button>
                        </li>
                        <li class="nav-item nav-item-custom animate-on-scroll slide-right delay-200" role="presentation">
                            <button class="nav-link nav-link-custom" id="courses-tab" data-bs-toggle="tab"
                                data-bs-target="#courses" type="button" role="tab">
                                Enrolled Courses
                            </button>
                        </li>
                        <li class="nav-item nav-item-custom animate-on-scroll slide-right delay-400" role="presentation">
                            <button class="nav-link nav-link-custom" id="purchases-tab" data-bs-toggle="tab"
                                data-bs-target="#purchases" type="button" role="tab">
                                Purchase History
                            </button>
                        </li>
                    </ul>

                </div>
                {{-- Tab Content --}}
                <div class="tab-content z-index-1" id="profileTabsContent">
                    {{-- Personal Information Section --}}
                    <div class="tab-pane fade show active p-4" id="personal" role="tabpanel">
                        <h2 class="mb-4 text-light animate-on-scroll slide-up">Personal Information</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3 animate-on-scroll slide-up">
                                <label class="form-label fw-bold text-light">Full Name</label>
                                <p class="form-control input">{{ $user->name }}</p>
                            </div>
                            <div class="col-md-6 mb-3 animate-on-scroll slide-up">
                                <label class="form-label fw-bold text-light">Email Address</label>
                                <p class="form-control input">{{ $user->email }}</p>
                            </div>
                            <div class="col-md-6 mb-3 animate-on-scroll slide-up">
                                <label class="form-label fw-bold text-light">Phone Number</label>
                                <p class="form-control input">
                                    {{ $user->phone ?? 'Not provided' }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3 animate-on-scroll slide-up">
                                <label class="form-label fw-bold text-light">Address</label>
                                <p class="form-control input">
                                    {{ $user->address ?? 'Not provided' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Enrolled Courses Section --}}
                    <div class="tab-pane fade p-4" id="courses" role="tabpanel">
                        <h2 class="mb-4 text-light animate-on-scroll slide-up">Enrolled Courses</h2>
                        @foreach ($enrolled_courses as $course)
                        <div class="card btn-primary mb-3 animate-on-scroll slide-up">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->name }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                                <a href="{{ route('course', $course->id) }}" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Purchase History Section --}}
                    <div class="tab-pane fade p-4" id="purchases" role="tabpanel">
                        <h2 class="mb-4 text-light animate-on-scroll slide-up">Purchase History</h2>
                        @foreach ($purchased_items as $product)
                        <div class="card btn-primary mb-3 animate-on-scroll slide-up">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Price: ${{ $product->price }}</p>
                                <p class="card-text">Purchased on: {{ $product->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection