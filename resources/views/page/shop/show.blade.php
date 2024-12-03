@extends('layout.layout')

@section('content')
<!-- Shop Section -->
<section class="shop-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="my-5">Shop Instruments</h1>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0">Showing 24 of 100 products</p>
                    <div class="d-flex align-items-center">
                        <label class="me-2">Sort by:</label>
                        <select class="form-select sort-select">
                            <option>Featured</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest</option>
                            <option>Best Selling</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Filter Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="filter-sidebar">
                    <h4 class="mb-4">Filters</h4>

                    <div class="filter-group">
                        <h5>Category</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="guitars">
                            <label class="form-check-label" for="guitars">Guitars</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pianos">
                            <label class="form-check-label" for="pianos">Pianos & Keyboards</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="drums">
                            <label class="form-check-label" for="drums">Drums & Percussion</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="wind">
                            <label class="form-check-label" for="wind">Wind Instruments</label>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h5>Price Range</h5>
                        <input type="range" class="form-range range-slider" min="0" max="5000" step="100">
                        <div class="d-flex justify-content-between">
                            <span>$0</span>
                            <span>$5000</span>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h5>Brand</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="fender">
                            <label class="form-check-label" for="fender">Fender</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="yamaha">
                            <label class="form-check-label" for="yamaha">Yamaha</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gibson">
                            <label class="form-check-label" for="gibson">Gibson</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="roland">
                            <label class="form-check-label" for="roland">Roland</label>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h5>Rating</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="rating5">
                            <label class="form-check-label" for="rating5">
                                <div class="rating">★★★★★</div>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="rating4">
                            <label class="form-check-label" for="rating4">
                                <div class="rating">★★★★☆ & up</div>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="rating3">
                            <label class="form-check-label" for="rating3">
                                <div class="rating">★★★☆☆ & up</div>
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100">Apply Filters</button>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">
                <div class="row g-4">
                    <!-- Product Card 1 -->
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{asset('shop-page/fender-stratocaster.png')}}" alt="Electric Guitar" class="product-image">
                            <div class="product-details">
                                <h5>Fender Stratocaster</h5>
                                <div class="rating mb-2">★★★★★ <span class="text-muted">(24)</span></div>
                                <p class="text-muted mb-2">Professional Electric Guitar</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">$1,299.99</span>
                                    <button class="btn btn-outline-primary">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{asset('shop-page/yamaha-p-125.png')}}" alt="Digital Piano" class="product-image">
                            <div class="product-details">
                                <h5>Yamaha P-125</h5>
                                <div class="rating mb-2">★★★★☆ <span class="text-muted">(18)</span></div>
                                <p class="text-muted mb-2">Digital Piano</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">$699.99</span>
                                    <button class="btn btn-outline-primary">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{asset('shop-page/pearl-export-series.png')}}" alt="Acoustic Drum Set" class="product-image">
                            <div class="product-details">
                                <h5>Pearl Export Series</h5>
                                <div class="rating mb-2">★★★★★ <span class="text-muted">(31)</span></div>
                                <p class="text-muted mb-2">5-Piece Drum Set</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">$849.99</span>
                                    <button class="btn btn-outline-primary">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Product Cards (4-9) -->
                    <!-- Repeat the product card structure 6 more times with different content -->

                </div>

                <!-- Pagination -->
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection