@extends('layouts.app')

@section('content')
<!-- Shop Section -->
<section class="shop-section">
    <div class="container py-3">
        <div class="row my-5">
            <div class="col-lg-6">
                <div class="product-details">
                    <img src="{{asset('shop-page/fender-stratocaster.png')}}" alt="Product Image" class="item-image">
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <h2>Fender Stratocaster</h2>
                <p>Professional Electric Guitar</p>
                <p class="price">$1,299.99</p>
                <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="related-products">
                    <h3>Related Products</h3>
                    <div class="row">
                        <div class="col-lg-4 p-5">
                            <img src="{{asset('shop-page/pearl-export-series.png')}}" alt="Pearl Export Series" class="item-image">
                            <a href="#" class="text-decoration-none">
                                <h4 class="text-light text-center mt-3">Pearl Export Series</h4>
                            </a>
                        </div>
                        <div class="col-lg-4 p-5">
                            <img src="{{asset('shop-page/pearl-export-series.png')}}" alt="Pearl Export Series" class="item-image">
                            <a href="#" class="text-decoration-none">
                                <h4 class="text-light text-center mt-3">Pearl Export Series</h4>
                            </a>
                        </div>
                        <div class="col-lg-4 p-5">
                            <img src="{{asset('shop-page/pearl-export-series.png')}}" alt="Pearl Export Series" class="item-image">
                            <a href="#" class="text-decoration-none">
                                <h4 class="text-light text-center mt-3">Pearl Export Series</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection