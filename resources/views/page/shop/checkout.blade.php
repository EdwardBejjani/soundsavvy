@extends('layout.layout')

@section('content')
<div class="checkout-container">
    <div class="checkout-header">
        <h1>Checkout</h1>
        <p>Complete your purchase</p>
    </div>

    <div class="order-summary">
        <h2>Order Summary</h2>
        <div class="order-item">
            <span>Product Name</span>
            <span>$49.99</span>
        </div>
        <div class="order-item">
            <span>Shipping</span>
            <span>$5.00</span>
        </div>
        <div class="order-item">
            <strong>Total</strong>
            <strong>$54.99</strong>
        </div>
    </div>

    <form>
        <div class="form-row">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="address">Shipping Address</label>
            <input type="text" id="address" name="address" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="zipCode">Zip Code</label>
                <input type="text" id="zipCode" name="zipCode" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" required>
            </div>
            <div class="form-group">
                <label for="expiry">Expiry (MM/YY)</label>
                <input type="text" id="expiry" name="expiry" required>
            </div>
        </div>

        <button type="submit" class="checkout-button">Complete Purchase</button>
    </form>
</div>
@endsection