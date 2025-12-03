<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - ShopHub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #ec4899;
            --dark-color: #1e293b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
        }

        .cart-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Cart Items */
        .cart-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .cart-card:hover {
            transform: translateY(-2px);
        }

        .cart-item {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 120px;
            height: 120px;
            border-radius: 10px;
            object-fit: cover;
        }

        .item-details {
            flex: 1;
        }

        .item-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .item-category {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
        }

        .item-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .item-old-price {
            font-size: 0.9rem;
            color: #9ca3af;
            text-decoration: line-through;
            margin-left: 0.5rem;
        }

        .item-discount {
            color: var(--success-color);
            font-weight: 600;
            font-size: 0.9rem;
            margin-left: 0.5rem;
        }

        /* Quantity Controls */
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid #e5e7eb;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: scale(1.1);
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 0.5rem;
            font-weight: 600;
        }

        .quantity-input:focus {
            border-color: var(--primary-color);
            box-shadow: none;
        }

        /* Actions */
        .item-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .wishlist-btn {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary-color);
        }

        .wishlist-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .remove-btn {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }

        .remove-btn:hover {
            background: var(--danger-color);
            color: white;
        }

        /* Summary Card */
        .summary-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 20px;
        }

        .summary-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--dark-color);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .summary-row.total {
            border-bottom: none;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid #e5e7eb;
        }

        .discount-badge {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .coupon-input {
            border: 2px solid #e5e7eb;
            border-radius: 10px 0 0 10px;
            padding: 0.75rem 1rem;
            flex: 1;
        }

        .coupon-btn {
            border: 2px solid var(--primary-color);
            background: var(--primary-color);
            color: white;
            border-radius: 0 10px 10px 0;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .coupon-btn:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .checkout-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-top: 1.5rem;
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }

        .continue-btn {
            width: 100%;
            padding: 0.75rem;
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            color: var(--dark-color);
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .continue-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        /* Empty Cart */
        .empty-cart {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .empty-cart-icon {
            font-size: 5rem;
            color: #d1d5db;
            margin-bottom: 1.5rem;
        }

        .empty-cart-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .empty-cart-text {
            color: #6b7280;
            margin-bottom: 2rem;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Delivery Options */
        .delivery-options {
            background: #f8fafc;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .option-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            margin-bottom: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .option-item.active {
            border-color: var(--primary-color);
            background: rgba(99, 102, 241, 0.05);
        }

        .option-item:last-child {
            margin-bottom: 0;
        }

        .option-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(99, 102, 241, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
        }

        .option-details {
            flex: 1;
        }

        .option-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.25rem;
        }

        .option-subtitle {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .option-price {
            font-weight: 600;
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cart-container {
                padding: 0 15px;
            }
            
            .item-image {
                width: 100px;
                height: 100px;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .cart-item {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">
                <i class="fas fa-shopping-bag text-primary me-2"></i>ShopHub
            </a>
            <div class="d-flex align-items-center">
                <a href="shop.html" class="btn btn-outline-primary me-2">
                    <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                </a>
                <div class="position-relative me-3">
                    <i class="fas fa-shopping-cart fs-5 text-primary"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <div class="cart-container">
        <h1 class="page-title">
            <i class="fas fa-shopping-cart me-3"></i>Shopping Cart
        </h1>

        <div class="row">
            <!-- Cart Items Section -->
            <div class="col-lg-8">
                <!-- Cart is Empty State (Hidden by default) -->
                <div class="empty-cart d-none">
                    <i class="fas fa-shopping-cart empty-cart-icon"></i>
                    <h2 class="empty-cart-title">Your cart is empty</h2>
                    <p class="empty-cart-text">Looks like you haven't added any items to your cart yet. Start shopping to fill it up!</p>
                    <a href="shop.html" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-bag me-2"></i>Start Shopping
                    </a>
                </div>

                <!-- Cart Items (Visible by default) -->
                <div class="cart-items">
                    <!-- Item 1 -->
                    <div class="cart-card">
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=120&h=120&fit=crop" 
                                         class="item-image" alt="Wireless Headphones">
                                </div>
                                <div class="col">
                                    <div class="item-details">
                                        <h3 class="item-title">Wireless Headphones Pro</h3>
                                        <p class="item-category">Electronics • Noise Cancelling</p>
                                        <div class="d-flex align-items-center">
                                            <span class="item-price">$99.99</span>
                                            <span class="item-old-price">$129.99</span>
                                            <span class="item-discount">23% OFF</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="quantity-control">
                                        <button class="quantity-btn decrement-btn">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="quantity-input" value="1" min="1" max="10">
                                        <button class="quantity-btn increment-btn">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-auto text-end">
                                    <div class="item-actions">
                                        <button class="action-btn wishlist-btn" title="Move to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn remove-btn" title="Remove Item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="mt-2">
                                        <span class="fw-bold">$99.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="cart-card">
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=120&h=120&fit=crop" 
                                         class="item-image" alt="Smart Watch">
                                </div>
                                <div class="col">
                                    <div class="item-details">
                                        <h3 class="item-title">Smart Watch Pro Max</h3>
                                        <p class="item-category">Wearables • Fitness Tracker</p>
                                        <div class="d-flex align-items-center">
                                            <span class="item-price">$199.99</span>
                                            <span class="item-old-price">$249.99</span>
                                            <span class="item-discount">20% OFF</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="quantity-control">
                                        <button class="quantity-btn decrement-btn">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="quantity-input" value="1" min="1" max="10">
                                        <button class="quantity-btn increment-btn">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-auto text-end">
                                    <div class="item-actions">
                                        <button class="action-btn wishlist-btn active" title="In Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <button class="action-btn remove-btn" title="Remove Item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="mt-2">
                                        <span class="fw-bold">$199.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="cart-card">
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=120&h=120&fit=crop" 
                                         class="item-image" alt="Smartphone">
                                </div>
                                <div class="col">
                                    <div class="item-details">
                                        <h3 class="item-title">Smartphone Pro 12</h3>
                                        <p class="item-category">Electronics • Flagship</p>
                                        <div class="d-flex align-items-center">
                                            <span class="item-price">$899.99</span>
                                        </div>
                                        <small class="text-success">
                                            <i class="fas fa-check-circle me-1"></i>In Stock
                                        </small>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="quantity-control">
                                        <button class="quantity-btn decrement-btn">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="quantity-input" value="2" min="1" max="10">
                                        <button class="quantity-btn increment-btn">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-auto text-end">
                                    <div class="item-actions">
                                        <button class="action-btn wishlist-btn" title="Move to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn remove-btn" title="Remove Item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="mt-2">
                                        <span class="fw-bold">$1,799.98</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Options -->
                    <div class="cart-card">
                        <div class="cart-item">
                            <h5 class="mb-3">
                                <i class="fas fa-shipping-fast me-2"></i>Delivery Options
                            </h5>
                            <div class="delivery-options">
                                <div class="option-item active">
                                    <div class="option-icon">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div class="option-details">
                                        <div class="option-title">Standard Delivery</div>
                                        <div class="option-subtitle">3-5 business days</div>
                                    </div>
                                    <div class="option-price">Free</div>
                                </div>
                                <div class="option-item">
                                    <div class="option-icon">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    <div class="option-details">
                                        <div class="option-title">Express Delivery</div>
                                        <div class="option-subtitle">1-2 business days</div>
                                    </div>
                                    <div class="option-price">$9.99</div>
                                </div>
                                <div class="option-item">
                                    <div class="option-icon">
                                        <i class="fas fa-gift"></i>
                                    </div>
                                    <div class="option-details">
                                        <div class="option-title">Same Day Delivery</div>
                                        <div class="option-subtitle">Order before 2 PM</div>
                                    </div>
                                    <div class="option-price">$19.99</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="summary-card">
                    <h3 class="summary-title">Order Summary</h3>
                    
                    <div class="summary-row">
                        <span>Subtotal (3 items)</span>
                        <span>$2,099.96</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span class="text-success">Free</span>
                    </div>
                    <div class="summary-row">
                        <span>Discount</span>
                        <span class="text-success">-$50.00</span>
                    </div>
                    <div class="summary-row">
                        <span>Tax</span>
                        <span>$168.00</span>
                    </div>
                    
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>$2,217.96</span>
                    </div>

                    <!-- Coupon Code -->
                    <div class="mt-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control coupon-input" placeholder="Coupon Code">
                            <button class="btn coupon-btn">Apply</button>
                        </div>
                        <div class="discount-badge d-inline-flex align-items-center gap-2">
                            <i class="fas fa-tag"></i>
                            <span>WELCOME20 - 20% OFF Applied</span>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="mt-4">
                        <h6 class="mb-3">
                            <i class="fas fa-credit-card me-2"></i>Payment Methods
                        </h6>
                        <div class="d-flex gap-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" 
                                 alt="Visa" height="30" class="rounded">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" 
                                 alt="Mastercard" height="30" class="rounded">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" 
                                 alt="PayPal" height="30" class="rounded">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg" 
                                 alt="Amex" height="30" class="rounded">
                        </div>
                    </div>

                    <!-- Security Badge -->
                    <div class="mt-4 p-3 bg-light rounded text-center">
                        <i class="fas fa-lock text-success me-2"></i>
                        <span class="text-muted">Secure SSL Encryption</span>
                    </div>

                    <!-- Action Buttons -->
                    <button class="btn checkout-btn">
                        <i class="fas fa-lock me-2"></i>Proceed to Checkout
                    </button>
                    <a href="shop.html" class="btn continue-btn">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a>

                    <!-- Estimated Delivery -->
                    <div class="mt-4 text-center">
                        <small class="text-muted">
                            <i class="far fa-calendar-alt me-1"></i>
                            Estimated delivery: January 20-22, 2024
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Quantity Controls
        document.querySelectorAll('.increment-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.quantity-input');
                input.value = parseInt(input.value) + 1;
                updateItemTotal(this);
            });
        });

        document.querySelectorAll('.decrement-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.quantity-input');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                    updateItemTotal(this);
                }
            });
        });

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                updateItemTotal(this);
            });
        });

        function updateItemTotal(element) {
            const cartItem = element.closest('.cart-item');
            const price = cartItem.querySelector('.item-price').textContent.replace('$', '');
            const quantity = cartItem.querySelector('.quantity-input').value;
            const totalElement = cartItem.querySelector('.fw-bold');
            const total = (parseFloat(price) * parseInt(quantity)).toFixed(2);
            totalElement.textContent = '$' + total;
            updateOrderSummary();
        }

        // Wishlist Toggle
        document.querySelectorAll('.wishlist-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.classList.add('active');
                    showToast('Added to wishlist!', 'success');
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.classList.remove('active');
                    showToast('Removed from wishlist!', 'info');
                }
            });
        });

        // Remove Item
        document.querySelectorAll('.remove-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const cartItem = this.closest('.cart-card');
                cartItem.style.opacity = '0';
                cartItem.style.transform = 'translateX(20px)';
                
                setTimeout(() => {
                    cartItem.remove();
                    updateOrderSummary();
                    // Check if cart is empty
                    if (document.querySelectorAll('.cart-card').length === 0) {
                        document.querySelector('.empty-cart').classList.remove('d-none');
                        document.querySelector('.cart-items').classList.add('d-none');
                    }
                }, 300);
                
                showToast('Item removed from cart!', 'danger');
            });
        });

        // Delivery Options
        document.querySelectorAll('.option-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.option-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                updateOrderSummary();
            });
        });

        // Apply Coupon
        document.querySelector('.coupon-btn').addEventListener('click', function() {
            const couponCode = document.querySelector('.coupon-input').value;
            if (couponCode) {
                showToast('Coupon applied successfully!', 'success');
                updateOrderSummary();
            } else {
                showToast('Please enter a coupon code', 'warning');
            }
        });

        // Update Order Summary
        function updateOrderSummary() {
            let subtotal = 0;
            
            // Calculate subtotal from all items
            document.querySelectorAll('.cart-item').forEach(item => {
                const price = item.querySelector('.item-price').textContent.replace('$', '');
                const quantity = item.querySelector('.quantity-input').value;
                subtotal += parseFloat(price) * parseInt(quantity);
            });
            
            // Calculate shipping
            const shipping = document.querySelector('.option-item.active .option-price').textContent;
            const shippingCost = shipping === 'Free' ? 0 : parseFloat(shipping.replace('$', ''));
            
            // Calculate tax (8%)
            const tax = subtotal * 0.08;
            
            // Apply discount (20%)
            const discount = subtotal * 0.20;
            
            // Calculate total
            const total = subtotal + shippingCost + tax - discount;
            
            // Update summary display
            document.querySelectorAll('.summary-row')[0].innerHTML = 
                `<span>Subtotal (${document.querySelectorAll('.cart-item').length} items)</span><span>$${subtotal.toFixed(2)}</span>`;
            
            document.querySelectorAll('.summary-row')[1].innerHTML = 
                `<span>Shipping</span><span class="text-success">$${shippingCost.toFixed(2)}</span>`;
            
            document.querySelectorAll('.summary-row')[2].innerHTML = 
                `<span>Discount</span><span class="text-success">-$${discount.toFixed(2)}</span>`;
            
            document.querySelectorAll('.summary-row')[3].innerHTML = 
                `<span>Tax</span><span>$${tax.toFixed(2)}</span>`;
            
            document.querySelectorAll('.summary-row')[4].innerHTML = 
                `<span>Total</span><span>$${total.toFixed(2)}</span>`;
        }

        // Toast Notification
        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `position-fixed bottom-0 end-0 p-3`;
            toast.innerHTML = `
                <div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'danger' ? 'danger' : 'info'} border-0 show" role="alert">
                    <div class="d-flex">
                        <div class="toast-body">${message}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Initialize order summary
        updateOrderSummary();
    </script>
</body>
</html>