@extends('layouts.app')

@section('content')

<!--begin::Cart Section-->
<div class="cart-section">
    <div class="container">
        <h1 class="text-center my-4">Your Shopping Cart</h1>

        <div class="cart-contents">
            <div class="cart-items">
                <!-- Product Item 1 -->
                <div class="cart-item">
                    <img src="{{asset('shop-page/fender-stratocaster.png')}}" alt="Product 1" class="cart-product-image">
                    <div class="cart-product-details">
                        <h2>Wireless Headphones</h2>
                        <p>Noise Cancelling, Over-Ear</p>
                        <p class="cart-price">$199.99</p>
                    </div>
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease">-</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                        <button class="quantity-btn increase">+</button>
                    </div>
                    <div class="item-total">$199.99</div>
                    <button class="remove-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </button>
                </div>

                <!-- Product Item 2 -->
                <div class="cart-item">
                    <img src="{{asset('shop-page/pearl-export-series.png')}}" alt="Product 2" class="cart-product-image">
                    <div class="cart-product-details">
                        <h2>Smart Watch</h2>
                        <p>Fitness Tracker, GPS</p>
                        <p class="cart-price">$149.99</p>
                    </div>
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease">-</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                        <button class="quantity-btn increase">+</button>
                    </div>
                    <div class="item-total">$149.99</div>
                    <button class="remove-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="cart-summary">
                <h2>Order Summary</h2>
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>$349.98</span>
                </div>
                <div class="summary-row">
                    <span>Shipping</span>
                    <span>$15.00</span>
                </div>
                <div class="summary-row">
                    <span>Tax</span>
                    <span>$28.00</span>
                </div>
                <div class="summary-row total">
                    <strong>Total</strong>
                    <strong>$392.98</strong>
                </div>
                <button class="checkout-btn">Proceed to Checkout</button>
            </div>
        </div>

        <div class="cart-actions">
            <button href="{{route('shop')}}" class="continue-shopping">Continue Shopping</button>
        </div>
    </div>
</div>
<!--end::Cart Section-->
<!--begin::Javascript-->
<script src="{{asset('js/cart.js')}}"></script>

@endsection