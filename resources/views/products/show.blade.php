@extends('layouts.app')

@section('content')
<style>
    .product-details-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .product-details-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .product-gallery {
        position: relative;
        background: #f8fafc;
        padding: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 500px;
    }

    .product-main-image {
        max-width: 100%;
        max-height: 400px;
        object-fit: contain;
        border-radius: 15px;
    }

    .product-thumbnails {
        display: flex;
        gap: 10px;
        margin-top: 1rem;
        justify-content: center;
    }

    .product-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 10px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .product-thumbnail:hover,
    .product-thumbnail.active {
        border-color: var(--primary-color);
    }

    .product-info {
        padding: 2.5rem;
    }

    .product-category {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .product-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .product-price {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 1.5rem;
    }

    .product-old-price {
        font-size: 1.2rem;
        color: #9ca3af;
        text-decoration: line-through;
        margin-left: 10px;
    }

    .product-description {
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 2rem;
        font-size: 1.1rem;
    }

    .product-meta {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: #f8fafc;
        border-radius: 15px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .meta-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary-color);
    }

    .meta-label {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 0.2rem;
    }

    .meta-value {
        color: #6b7280;
        font-size: 0.9rem;
    }

    .stock-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .stock-in {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .stock-out {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .btn-quantity {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #f8fafc;
        border-radius: 12px;
        padding: 0.8rem 1.2rem;
    }

    .quantity-btn {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quantity-btn:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        border: none;
        background: transparent;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .btn-add-to-cart {
        flex: 1;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 12px;
        padding: 1rem 2rem;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-add-to-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
    }

    .btn-wishlist {
        width: 50px;
        height: 50px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        transition: all 0.3s ease;
    }

    .btn-wishlist:hover {
        border-color: var(--secondary-color);
        color: var(--secondary-color);
    }

    .product-features {
        margin-top: 2rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0.8rem;
        background: #f8fafc;
        border-radius: 10px;
    }

    .feature-icon {
        color: var(--success-color);
    }

    .navigation-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding: 1rem 0;
        border-bottom: 2px solid #e5e7eb;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--dark-color);
        text-decoration: none;
        font-weight: 600;
        padding: 0.8rem 1.5rem;
        border-radius: 10px;
        background: white;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateX(-5px);
    }

    .admin-actions {
        display: flex;
        gap: 0.5rem;
    }

    @media (max-width: 768px) {
        .product-details-container {
            padding: 10px;
        }

        .product-title {
            font-size: 1.8rem;
        }

        .product-price {
            font-size: 1.6rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-quantity {
            justify-content: center;
        }

        .navigation-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .admin-actions {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>

<div class="product-details-container">
    <!-- Navigation -->
    <div class="navigation-actions">
        <a href="{{ route('shop') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i>
            Back to Products
        </a>
        
        @auth
        <div class="admin-actions">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit me-1"></i>Edit
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                    <i class="fas fa-trash me-1"></i>Delete
                </button>
            </form>
        </div>
        @endauth
    </div>

    <!-- Product Details Card -->
    <div class="product-details-card">
        <div class="row g-0">
            <!-- Product Images -->
            <div class="col-md-6">
                <div class="product-gallery">
                    <img src="{{ $product->image ?? 'https://plus.unsplash.com/premium_photo-1679513691474-73102089c117?q=80&w=1113&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" 
                         alt="{{ $product->name }}" 
                         class="product-main-image"
                         id="mainImage">
                    
                    <!-- Thumbnails would go here -->
                    <div class="product-thumbnails">
                        <img src="{{ $product->image ?? 'https://plus.unsplash.com/premium_photo-1679513691474-73102089c117?q=80&w=1113&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" 
                             alt="Thumbnail 1" 
                             class="product-thumbnail active"
                             onclick="changeImage(this.src)">
                    </div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="col-md-6">
                <div class="product-info">
                    <div class="product-category">{{ $product->category }}</div>
                    <h1 class="product-title">{{ $product->name }}</h1>
                    
                    <div class="product-price">
                        ${{ number_format($product->price, 2) }}
                        @if($product->old_price)
                        <span class="product-old-price">${{ number_format($product->old_price, 2) }}</span>
                        @endif
                    </div>

                    <!-- Stock Status -->
                    <div class="mb-3">
                        @if($product->stock_quantity > 0)
                        <span class="stock-badge stock-in">
                            <i class="fas fa-check-circle"></i>
                            In Stock ({{ $product->stock_quantity }} available)
                        </span>
                        @else
                        <span class="stock-badge stock-out">
                            <i class="fas fa-times-circle"></i>
                            Out of Stock
                        </span>
                        @endif
                    </div>

                    <p class="product-description">
                        {{ $product->description ?? 'No description available for this product.' }}
                    </p>

                    <!-- Product Meta Information -->
                    <div class="product-meta">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-weight"></i>
                            </div>
                            <div>
                                <div class="meta-label">Weight</div>
                                <div class="meta-value">{{ $product->weight ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-ruler"></i>
                            </div>
                            <div>
                                <div class="meta-label">Dimensions</div>
                                <div class="meta-value">{{ $product->dimensions ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-barcode"></i>
                            </div>
                            <div>
                                <div class="meta-label">SKU</div>
                                <div class="meta-value">{{ $product->sku ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    @if($product->stock_quantity > 0)
                    <div class="action-buttons">
                        <div class="btn-quantity">
                            <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                            <input type="text" class="quantity-input" value="1" id="quantity">
                            <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                        </div>
                        <button class="btn-add-to-cart">
                            <i class="fas fa-shopping-cart"></i>
                            Add to Cart
                        </button>
                        <button class="btn-wishlist">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                    @else
                    <button class="btn-add-to-cart" disabled style="opacity: 0.6;">
                        <i class="fas fa-bell"></i>
                        Notify When Available
                    </button>
                    @endif

                    <!-- Product Features -->
                    <div class="product-features">
                        <h5 class="fw-semibold mb-3">Product Features:</h5>
                        <div class="features-grid">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt feature-icon"></i>
                                <span>1 Year Warranty</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-shipping-fast feature-icon"></i>
                                <span>Free Shipping</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-undo feature-icon"></i>
                                <span>30-Day Returns</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-headset feature-icon"></i>
                                <span>24/7 Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
        
        // Update active thumbnail
        document.querySelectorAll('.product-thumbnail').forEach(thumb => {
            thumb.classList.remove('active');
        });
        event.target.classList.add('active');
    }

    function increaseQuantity() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
    }

    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    // Add to cart functionality
    document.querySelector('.btn-add-to-cart')?.addEventListener('click', function() {
        const quantity = document.getElementById('quantity').value;
        // Add your cart logic here
        alert(`Added ${quantity} ${quantity > 1 ? 'items' : 'item'} to cart!`);
    });
</script>
@endsection