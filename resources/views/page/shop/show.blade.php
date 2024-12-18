@extends('layouts.app')
@section('title')
Shop
@endsection
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
            <!-- Product Grid -->
            <div class="col-lg-12">
                <div class="row g-4">
                    <!-- Product Card -->
                    @forelse ( $items as $item)
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{asset($item->image ?? 'no-image.png')}}" alt="{{$item->name}}" class="product-image">
                            <div class="product-details">
                                <h5>{{ucwords($item->name)}}</h5>
                                <p class="text-muted mb-2">{{$item->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">${{number_format($item->price,2)}}</span>
                                    <button class="btn btn-outline-primary">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div>
                        No Products Found
                    </div>
                    @endforelse

                </div>

                <!-- Pagination -->
                <nav class="mt-5">
                    {{$items->links()}}
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection