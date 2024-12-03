@extends('layout.layout')

@section('content')
<section class="profile-section">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom shadow-sm">
                    {{-- Profile Header --}}
                    <div class="profile-header text-center">
                        <h1 class="mb-1">{{ $user->name }}</h1>
                        <p class="text-white-50">{{ $user->email }}</p>
                    </div>

                    {{-- Profile Tabs --}}
                    <ul class="nav nav-tabs dark-tabs" id="profileTabs" role="tablist">
                        <li class="nav-item nav-item-custom" role="presentation">
                            <button class="nav-link nav-link-custom active" id="personal-tab" data-bs-toggle="tab"
                                data-bs-target="#personal" type="button" role="tab">
                                Personal Info
                            </button>
                        </li>
                        <li class="nav-item nav-item-custom" role="presentation">
                            <button class="nav-link nav-link-custom" id="courses-tab" data-bs-toggle="tab"
                                data-bs-target="#courses" type="button" role="tab">
                                Enrolled Courses
                            </button>
                        </li>
                        <li class="nav-item nav-item-custom" role="presentation">
                            <button class="nav-link nav-link-custom" id="purchases-tab" data-bs-toggle="tab"
                                data-bs-target="#purchases" type="button" role="tab">
                                Purchase History
                            </button>
                        </li>
                    </ul>

                    {{-- Tab Content --}}
                    <div class="tab-content" id="profileTabsContent">
                        {{-- Personal Information Section --}}
                        <div class="tab-pane fade show active p-4" id="personal" role="tabpanel">
                            <h2 class="mb-4 text-light">Personal Information</h2>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-light">Full Name</label>
                                    <p class="form-control-plaintext dark-border">{{ $user->name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-light">Email Address</label>
                                    <p class="form-control-plaintext dark-border">{{ $user->email }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-light">Phone Number</label>
                                    <p class="form-control-plaintext dark-border">
                                        {{ $user->phone_number ?? 'Not provided' }}
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-light">Address</label>
                                    <p class="form-control-plaintext dark-border">
                                        {{ $user->address ?? 'Not provided' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Enrolled Courses Section --}}
                        <div class="tab-pane fade p-4" id="courses" role="tabpanel">
                            <h2 class="mb-4 text-light">Enrolled Courses</h2>
                        </div>

                        {{-- Purchase History Section --}}
                        <div class="tab-pane fade p-4" id="purchases" role="tabpanel">
                            <h2 class="mb-4 text-light">Purchase History</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection