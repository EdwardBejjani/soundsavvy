@extends('layouts.app')

@section('title')
{{$item->name}}
@endsection

@section('content')
<!-- Shop Section -->
<section class="shop-section">
    <div class="container py-3">
        <div class="row my-5">
            <div class="col-lg-6">
                <div class="product-details">
                    <img src="{{asset('storage/' . $item->image)}}" alt="{{$item->name}}" class="item-image">
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <h2>{{$item->name}}</h2>
                <p class="text-muted">{{$item->SKU}}</p>
                <p class="text-muted">{{$item->description}}</p>
                <p class="text-white fs-4 fw-bold">$ {{number_format($item->price,2)}}</p>
                <input type="number" class="form-control mb-3 input" id="quantity" value="1" min="1">
                <div class="d-flex flex-column gap-3">
                    <button class="btn btn-primary shake" id="addToCart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                    <button class="btn btn-primary shake" id="buyNow"><i class="fa-solid fa-money-bill"></i> Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</section>

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
        const quantityInput = document.getElementById('quantity');

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