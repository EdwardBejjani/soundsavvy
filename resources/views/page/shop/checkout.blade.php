@extends('layouts.app')

@section('title')
Checkout
@endsection

@section('content')
@include('layouts._notification')
<section class="py-5">
    <div class="container mt-5">
        <div class="checkout-container">
            <form class="form" action="{{ route('order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-7">
                        <div class="card login-card p-4">
                            <h3 class="text-color-primary text-center mb-4">Checkout</h3>

                            <!-- Contact Information -->
                            <div class="mb-4">
                                <label for="email" class="form-label text-white">Email</label>
                                <input type="email" name="email" class="form-control input" placeholder="you@example.com"
                                    value="{{Auth::user()->email ?? ''}}" required>
                            </div>

                            <!-- Shipping Information -->
                            <div class="mb-4">
                                <h4 class="text-color-primary mb-3">Shipping Address</h4>
                                <div class="mb-3">
                                    <label for="name" class="form-label text-white">Name</label>
                                    <input type="text" id="name" name="name" class="form-control input" placeholder="John Doe" value="{{Auth::user()->name ?? ''}}"
                                        required>
                                </div>
                                <div class=" mb-3">
                                    <label for="phone" class="form-label text-white">Phone</label>
                                    <input type="tel" id="phone" name="phone" class="form-control input"
                                        placeholder="+961 70 285 659" value="{{Auth::user()->phone ?? ''}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label text-white">Address</label>
                                    <input type="text" id="address" name="address" class="form-control input"
                                        placeholder="123 Main St" value="{{Auth::user()->address ?? ''}}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="text-color-primary mb-3">Payment Info</h4>

                                <div class="mb-3">
                                    <label for="method" class="form-label text-white">Payment Method</label>
                                    <select id="method" name="payment_method" class="form-select input" required>
                                        <option value="cash on delivery" selected>Cash On Delivery
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-5">
                        <div class="card login-card p-4">
                            <h4 class="text-color-primary text-center mb-4">Order Summary</h4>
                            <div class="summary-card" id="cart-items-container">
                                <!-- Cart Items will be populated here dynamically -->
                            </div>

                            <!-- Price Breakdown -->
                            <div class="summary-item text-white">
                                <span>Subtotal</span>
                                <span id="subtotal-price">$0.00</span>
                            </div>
                            <div class="summary-item text-white">
                                <span>Shipping</span>
                                <span id="shipping-price">$10.00</span>
                            </div>
                            <div class="summary-item total-price text-white">
                                <span>Total</span>
                                <span id="total-price">$0.00</span>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Complete Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get cart from cookies
        const cart = document.cookie
            .split('; ')
            .find(row => row.startsWith('cart='))
            ?.split('=')[1];
        const cartData = cart ? JSON.parse(decodeURIComponent(cart)) : [];

        const cartItemsContainer = document.getElementById('cart-items-container');
        const subtotalElement = document.getElementById('subtotal-price');
        const totalElement = document.getElementById('total-price');
        const shippingCost = 10;

        let subtotal = 0;
        let count = 0;

        cartData.forEach(item => {
            subtotal += item.price * item.quantity;

            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item', 'd-flex', 'align-items-center', 'mb-3');

            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="me-3 text-white" style="width: 60px; height: 60px; object-fit: cover;">
                <div>
                    <p class="mb-0 text-white">${item.name}</p>
                    <small class="text-white">Quantity: ${item.quantity}</small>
                </div>
                <p class="ms-auto text-white">$${(item.price * item.quantity).toFixed(2)}</p>
                <input type="hidden" name="cart[${count}][id]" value="${item.id}">
                <input type="hidden" name="cart[${count}][name]" value="${item.name}">
                <input type="hidden" name="cart[${count}][image]" value="${item.image}">
                <input type="hidden" name="cart[${count}][quantity]" value="${item.quantity}">
                <input type="hidden" name="cart[${count}][price]" value="${item.price}">
            `;
            count++;

            cartItemsContainer.appendChild(cartItem);
        });

        // Update price breakdown
        subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        totalElement.textContent = `$${(subtotal + shippingCost).toFixed(2)}`;
    });
</script>
@endsection