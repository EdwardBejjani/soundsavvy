@extends('layouts.app')
@section('title', $item->name)
@section('content')
<!--Course Section-->
<div class="course-section py-5">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h1 class="text-color-primary">{{$item->name}}</h1>
                <p class="text-muted">{{$item->user->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">{{$item->description}}</p>
            </div>
        </div>
        @if ($userisEnrolled)
        <div class="row mb-5">
            <div class="col-md-12">
                <a href="{{ route('modules', $item->id) }}" class="btn btn-primary shake me-3"><i class="fas fa-graduation-cap"></i> Browse Modules</a>
            </div>
        </div>
        @else
        <div class="row mb-5">
            <div class="col-md-12">
                <button class="btn btn-primary shake me-3" id="addToCart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                <button class="btn btn-primary shake" id="buyNow"><i class="fa-solid fa-money-bill"></i> Enroll Now</button>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-color-primary">Course Content</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @forelse ($modules as $module)
                    <li>{{$module->name}}</li>
                    @empty
                    This course doesn't contain any modules yet
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const product = {
            id: "{{ $item->id }}",
            name: "{{ $item->name }}",
            image: "{{asset('storage/' . $item->image)}}",
            price: "{{ $item->price }}",
        };

        const addToCartBtn = document.getElementById('addToCart');
        const buyNowBtn = document.getElementById('buyNow');

        function getCart() {
            const cart = document.cookie
                .split('; ')
                .find(row => row.startsWith('cart='))
                ?.split('=')[1];
            return cart ? JSON.parse(decodeURIComponent(cart)) : [];
        }

        function saveCart(cart) {
            document.cookie = `cart=${encodeURIComponent(JSON.stringify(cart))}; path=/; max-age=${30 * 24 * 60 * 60}`;
        }

        addToCartBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const quantity = 1;

            let cart = getCart();

            const existingProduct = cart.find(item => item.id === product.id);
            if (existingProduct) {
                existingProduct.quantity += quantity;
            } else {
                cart.push({
                    ...product,
                    quantity
                });
            }

            saveCart(cart);
            alert('Product added to cart!');
        });

        buyNowBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const quantity = parseInt(quantityInput.value) || 1;

            let cart = getCart();

            const existingProduct = cart.find(item => item.id === product.id);
            if (existingProduct) {
                existingProduct.quantity += quantity;
            } else {
                cart.push({
                    ...product,
                    quantity
                });
            }

            saveCart(cart);

            window.location.href = "{{ route('checkout') }}";
        });
    });
</script>
@endsection