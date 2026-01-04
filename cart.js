// Load cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Add an item
function addToCart(item) {
    const existing = cart.find(i => i.name === item.name);
    if (existing) {
        existing.quantity += 1;
    } else {
        item.quantity = 1;
        cart.push(item);
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${item.name} added to cart!`);
}

// Remove item
function removeItem(index) {
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

// Clear cart
function clearCart() {
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

// Display cart
function displayCart() {
    const container = document.getElementById('cart-items');
    if (!container) return; // in menu page, skip display

    container.innerHTML = '';

    if (cart.length === 0) {
        container.innerHTML = "<p class='empty'>Your cart is empty.</p>";
        document.getElementById('total').innerText = "Total: $0";
        return;
    }

    let totalPrice = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        totalPrice += itemTotal;

        const div = document.createElement('div');
        div.className = 'cart-item';
        div.innerHTML = `
            <img src="${item.image || 'images/default.jpg'}" alt="${item.name}">
            <div class="item-details">
                <h3>${item.name}</h3>
                <p>Unit Price: $${item.price}</p>
                <p class="qty">Quantity: <strong>${item.quantity}</strong></p>
                <p class="item-total">Item Total: $${itemTotal.toFixed(2)}</p>
            </div>
            <button onclick="removeItem(${index})">✕</button>
        `;
        container.appendChild(div);
    });

    document.getElementById('total').innerText = `Total: $${totalPrice.toFixed(2)}`;
}

// Initialize display when cart.html loads
displayCart();
