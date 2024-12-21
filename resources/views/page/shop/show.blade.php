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
                    <div class="d-flex align-items-center">
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
                        <a href="{{route('product', $item)}}" class="text-decoration-none">
                            <div class="product-card">
                                <img src="{{asset('storage/' . $item->image)}}" alt="{{$item->name}}" class="product-image">
                                <div class="product-details">
                                    <h5 class="text-white">{{ucwords($item->name)}}</h5>
                                    <p class="text-muted mb-2">{{$item->description}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="price">${{number_format($item->price,2)}}</span>
                                        <button class="btn btn-outline-primary">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </a>
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