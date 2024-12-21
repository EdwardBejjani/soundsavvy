<div class="offcanvas offcanvas-end bg-primary" tabindex="-2" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white fw-bold" id="offcanvasCartLabel">Your Cart</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-x text-white"></i></button>
    </div>
    <div class="offcanvas-body">
        <div id="cart-items">
            <!-- Cart items will be dynamically populated here -->
        </div>
        <hr>

        <div class="cart-summary">
            <div class="d-flex justify-content-between">
                <span class="text-secondary">Total Items:</span>
                <span id="cart-total-items" class="fw-bold text-white">0</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-secondary">Total Price:</span>
                <span id="cart-total-price" class="fw-bold text-white">$0.00</span>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('checkout') }}" class="btn btn-primary w-100">Proceed To Checkout</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get cart from cookies
        const cart = document.cookie
            .split('; ')
            .find(row => row.startsWith('cart='))
            ?.split('=')[1];
        const cartData = cart ? JSON.parse(decodeURIComponent(cart)) : [];

        const cartItemsContainer = document.getElementById('cart-items');
        const totalItemsElement = document.getElementById('cart-total-items');
        const totalPriceElement = document.getElementById('cart-total-price');

        let totalItems = 0;
        let totalPrice = 0;

        cartItemsContainer.innerHTML = '';
        cartData.forEach((item, index) => {
            totalItems += item.quantity;
            totalPrice += item.price * item.quantity;

            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item', 'd-flex', 'align-items-center', 'mb-3');

            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="img-fluid rounded me-3 text-white" style="width: 50px; height: 50px; object-fit: cover;">
                <div class="flex-grow-1">
                    <h6 class="mb-0 text-white">${item.name}</h6>
                    <small class="text-muted">price: $${item.price} | quantity: ${item.quantity}</small>
                </div>
                <button class="btn btn-sm btn-danger" onclick="removeFromCart(${index})">remove</button>
            `;

            cartItemsContainer.appendChild(cartItem);
        });

        totalItemsElement.textContent = totalItems;
        totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
    });

    function removeFromCart(index) {
        const cart = document.cookie
            .split('; ')
            .find(row => row.startsWith('cart='))
            ?.split('=')[1];
        const cartData = cart ? JSON.parse(decodeURIComponent(cart)) : [];

        if (index >= 0 && index < cartData.length) {
            cartData.splice(index, 1);
            document.cookie = `cart=${encodeURIComponent(JSON.stringify(cartData))}; path=/`;
            location.reload();
        }
    }
</script>