document.addEventListener('DOMContentLoaded', () => {
    const cartItemsContainer = document.querySelector('.cart-items');

    // Quantity Control Functionality
    cartItemsContainer.addEventListener('click', (event) => {
        const quantityInput = event.target.closest('.cart-item')?.querySelector('.quantity-input');
        
        if (!quantityInput) return;

        if (event.target.classList.contains('decrease')) {
            // Decrease quantity
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateItemTotal(event.target.closest('.cart-item'));
            }
        } else if (event.target.classList.contains('increase')) {
            // Increase quantity
            const currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            updateItemTotal(event.target.closest('.cart-item'));
        }
    });

    // Remove Item Functionality
    cartItemsContainer.addEventListener('click', (event) => {
        if (event.target.closest('.remove-item')) {
            const cartItem = event.target.closest('.cart-item');
            cartItem.remove();
            updateOrderSummary();
        }
    });

    // Update Item Total
    function updateItemTotal(cartItem) {
        if (!cartItem) return;

        const priceElement = cartItem.querySelector('.price');
        const quantityInput = cartItem.querySelector('.quantity-input');
        const itemTotalElement = cartItem.querySelector('.item-total');

        if (priceElement && quantityInput && itemTotalElement) {
            const price = parseFloat(priceElement.textContent.replace('$', ''));
            const quantity = parseInt(quantityInput.value);
            const itemTotal = price * quantity;

            itemTotalElement.textContent = `$${itemTotal.toFixed(2)}`;
            updateOrderSummary();
        }
    }

    // Update Order Summary
    function updateOrderSummary() {
        const cartItems = document.querySelectorAll('.cart-item');
        let subtotal = 0;

        // Calculate subtotal
        cartItems.forEach(item => {
            const itemTotal = item.querySelector('.item-total');
            if (itemTotal) {
                subtotal += parseFloat(itemTotal.textContent.replace('$', ''));
            }
        });

        // Fixed shipping and tax for this example
        const shipping = 15.00;
        const taxRate = 0.08; // 8% tax rate
        const tax = subtotal * taxRate;
        const total = subtotal + shipping + tax;

        // Update summary elements
        const summaryRows = document.querySelectorAll('.summary-row');
        if (summaryRows.length >= 3) {
            summaryRows[0].querySelector('span:last-child').textContent = `$${subtotal.toFixed(2)}`;
            summaryRows[1].querySelector('span:last-child').textContent = `$${shipping.toFixed(2)}`;
            summaryRows[2].querySelector('span:last-child').textContent = `$${tax.toFixed(2)}`;
        }

        // Update total
        const totalRow = document.querySelector('.summary-row.total');
        if (totalRow) {
            totalRow.querySelector('strong:last-child').textContent = `$${total.toFixed(2)}`;
        }
    }

    // Continue Shopping Button
    const continueShoppingBtn = document.querySelector('.continue-shopping');
    if (continueShoppingBtn) {
        continueShoppingBtn.addEventListener('click', () => {
            // Redirect to products page (replace with your actual product page URL)
            window.location.href = '/shop';
        });
    }

    // Checkout Button
    const checkoutBtn = document.querySelector('.checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            // Redirect to checkout page (replace with your actual checkout page URL)
            window.location.href = '/checkout';
        });
    }

    // Initial order summary update
    updateOrderSummary();
});