@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 80px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-4">Our Shop</h1>
                    <p class="lead mb-4">Discover amazing products at unbeatable prices</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Sidebar Filters -->
                <div class="col-lg-3">
                    <div class="sidebar-card p-4 mb-4">
                        <!-- Categories -->
                        <div class="filter-section mb-4">
                            <h5 class="filter-title mb-3">Categories</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="category-fashion" checked>
                                <label class="form-check-label" for="category-fashion">
                                    Fashion <span class="text-muted">(248)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="category-electronics">
                                <label class="form-check-label" for="category-electronics">
                                    Electronics <span class="text-muted">(156)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="category-home">
                                <label class="form-check-label" for="category-home">
                                    Home & Living <span class="text-muted">(89)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="category-sports">
                                <label class="form-check-label" for="category-sports">
                                    Sports <span class="text-muted">(67)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="category-books">
                                <label class="form-check-label" for="category-books">
                                    Books <span class="text-muted">(134)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="filter-section mb-4">
                            <h5 class="filter-title mb-3">Price Range</h5>
                            <div class="price-range">
                                <input type="range" class="form-range" min="0" max="1000" value="500" id="priceRange">
                                <div class="d-flex justify-content-between">
                                    <span>$0</span>
                                    <span>$1000</span>
                                </div>
                                <div class="text-center mt-2">
                                    <span class="price-value">$0 - $500</span>
                                </div>
                            </div>
                        </div>

                        <!-- Brands -->
                        <div class="filter-section mb-4">
                            <h5 class="filter-title mb-3">Brands</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand-apple">
                                <label class="form-check-label" for="brand-apple">
                                    Apple <span class="text-muted">(45)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand-samsung">
                                <label class="form-check-label" for="brand-samsung">
                                    Samsung <span class="text-muted">(32)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand-nike">
                                <label class="form-check-label" for="brand-nike">
                                    Nike <span class="text-muted">(28)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand-adidas">
                                <label class="form-check-label" for="brand-adidas">
                                    Adidas <span class="text-muted">(24)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand-sony">
                                <label class="form-check-label" for="brand-sony">
                                    Sony <span class="text-muted">(19)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Ratings -->
                        <div class="filter-section mb-4">
                            <h5 class="filter-title mb-3">Customer Ratings</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="rating-5">
                                <label class="form-check-label" for="rating-5">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="text-muted">(4.5 & up)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="rating-4">
                                <label class="form-check-label" for="rating-4">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </span>
                                    <span class="text-muted">(4.0 & up)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="rating-3">
                                <label class="form-check-label" for="rating-3">
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </span>
                                    <span class="text-muted">(3.0 & up)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Clear Filters -->
                        <button class="btn btn-outline-primary w-100" id="clearFilters">
                            <i class="fas fa-times me-2"></i>Clear All Filters
                        </button>
                    </div>

                    <!-- Special Offers -->
                    <div class="special-offer-card p-4">
                        <h5 class="mb-3">Special Offer</h5>
                        <div class="offer-content text-center">
                            <i class="fas fa-gift fa-3x mb-3" style="color: #ec4899;"></i>
                            <h6>Get 20% Off</h6>
                            <p class="text-muted small">On your first order above $100</p>
                            <button class="btn btn-sm btn-primary">Use Code: WELCOME20</button>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="col-lg-9">
                    <!-- Top Bar -->
                    <div class="top-bar-card p-3 mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <p class="mb-0">Showing <strong>1-12</strong> of <strong>156</strong> products</p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="d-flex align-items-center justify-content-md-end">
                                    <label class="me-2 mb-0">Sort by:</label>
                                    <select class="form-select form-select-sm" style="width: auto;">
                                        <option>Featured</option>
                                        <option>Price: Low to High</option>
                                        <option>Price: High to Low</option>
                                        <option>Best Rating</option>
                                        <option>Newest First</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="row g-4">
                        <!-- Product 1 -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card product-card">
                                <div class="product-image">
                                    <i class="fas fa-headphones"></i>
                                    <span class="product-badge">New</span>
                                    <div class="product-actions">
                                        <button class="btn-action wishlist-btn" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn-action view-btn" title="Quick View">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h5 class="product-title">Wireless Headphones</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="text-muted ms-1">(4.5)</span>
                                    </div>
                                    <div class="product-price">$99.99 <span class="text-muted text-decoration-line-through">$129.99</span></div>
                                    <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card product-card">
                                <div class="product-image">
                                    <i class="fas fa-watch"></i>
                                    <span class="product-badge sale">Sale</span>
                                    <div class="product-actions">
                                        <button class="btn-action wishlist-btn" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn-action view-btn" title="Quick View">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h5 class="product-title">Smart Watch Pro</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="text-muted ms-1">(5.0)</span>
                                    </div>
                                    <div class="product-price">$199.99 <span class="text-muted text-decoration-line-through">$249.99</span></div>
                                    <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3 -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card product-card">
                                <div class="product-image">
                                    <i class="fas fa-laptop"></i>
                                    <span class="product-badge">Hot</span>
                                    <div class="product-actions">
                                        <button class="btn-action wishlist-btn" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn-action view-btn" title="Quick View">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h5 class="product-title">Gaming Laptop</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="text-muted ms-1">(4.0)</span>
                                    </div>
                                    <div class="product-price">$1,299.99</div>
                                    <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 4 -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card product-card">
                                <div class="product-image">
                                    <i class="fas fa-camera"></i>
                                    <span class="product-badge">New</span>
                                    <div class="product-actions">
                                        <button class="btn-action wishlist-btn" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn-action view-btn" title="Quick View">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h5 class="product-title">Digital Camera 4K</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="text-muted ms-1">(4.7)</span>
                                    </div>
                                    <div class="product-price">$499.99</div>
                                    <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 5 -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card product-card">
                                <div class="product-image">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span class="product-badge">Trending</span>
                                    <div class="product-actions">
                                        <button class="btn-action wishlist-btn" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn-action view-btn" title="Quick View">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h5 class="product-title">Smartphone Pro</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="text-muted ms-1">(5.0)</span>
                                    </div>
                                    <div class="product-price">$899.99 <span class="text-muted text-decoration-line-through">$999.99</span></div>
                                    <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 6 -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card product-card">
                                <div class="product-image">
                                    <i class="fas fa-tablet-alt"></i>
                                    <span class="product-badge sale">Sale</span>
                                    <div class="product-actions">
                                        <button class="btn-action wishlist-btn" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn-action view-btn" title="Quick View">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h5 class="product-title">Tablet Air</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="text-muted ms-1">(4.0)</span>
                                    </div>
                                    <div class="product-price">$599.99 <span class="text-muted text-decoration-line-through">$699.99</span></div>
                                    <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 7 -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card product-card">
                                <div class="product-image">
                                    <i class="fas fa-gamepad"></i>
                                    <span class="product-badge">New</span>
                                    <div class="product-actions">
                                        <button class="btn-action wishlist-btn" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn-action view-btn" title="Quick View">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h5 class="product-title">Gaming Console</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="text-muted ms-1">(4.7)</span>
                                    </div>
                                    <div class="product-price">$399.99</div>
                                    <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 8 -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card product-card">
                                <div class="product-image">
                                    <i class="fas fa-headphones"></i>
                                    <span class="product-badge">Hot</span>
                                    <div class="product-actions">
                                        <button class="btn-action wishlist-btn" title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn-action view-btn" title="Quick View">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <h5 class="product-title">Noise Cancelling Headphones</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="text-muted ms-1">(5.0)</span>
                                    </div>
                                    <div class="product-price">$299.99</div>
                                    <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #6366f1, #ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.sidebar-card, .special-offer-card, .top-bar-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.filter-title {
    font-weight: 600;
    color: #1e293b;
    border-bottom: 2px solid #6366f1;
    padding-bottom: 0.5rem;
}

.filter-section {
    border-bottom: 1px solid #e2e8f0;
    padding-bottom: 1rem;
}

.filter-section:last-child {
    border-bottom: none;
}

.form-check-input:checked {
    background-color: #6366f1;
    border-color: #6366f1;
}

.price-value {
    font-weight: 600;
    color: #6366f1;
}

.special-offer-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.special-offer-card h5, .special-offer-card h6 {
    color: white;
}

.special-offer-card .text-muted {
    color: rgba(255,255,255,0.8) !important;
}

/* Product Card Enhancements */
.product-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    height: 100%;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.product-image {
    height: 250px;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: #6366f1;
    position: relative;
    overflow: hidden;
}

.product-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #ec4899;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.product-badge.sale {
    background: #10b981;
}

.product-actions {
    position: absolute;
    top: 15px;
    left: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    opacity: 0;
    transition: opacity 0.3s;
}

.product-card:hover .product-actions {
    opacity: 1;
}

.btn-action {
    background: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: all 0.3s;
    color: #6366f1;
}

.btn-action:hover {
    background: #6366f1;
    color: white;
    transform: scale(1.1);
}

.product-body {
    padding: 1.5rem;
}

.product-title {
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
    color: #1e293b;
    height: 2.6rem;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.product-price {
    font-size: 1.5rem;
    font-weight: 700;
    color: #6366f1;
    margin-bottom: 1rem;
}

.product-rating {
    color: #fbbf24;
    margin-bottom: 1rem;
}

.btn-add-cart {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    font-weight: 600;
    background: #6366f1;
    border: none;
    color: white;
    transition: background 0.3s;
}

.btn-add-cart:hover {
    background: #ec4899;
}

/* Pagination */
.page-link {
    color: #6366f1;
    border: none;
    margin: 0 5px;
    border-radius: 10px;
}

.page-item.active .page-link {
    background: #6366f1;
    border-color: #6366f1;
}

.page-link:hover {
    color: #ec4899;
}
</style>

<script>
// Price Range
const priceRange = document.getElementById('priceRange');
const priceValue = document.querySelector('.price-value');

priceRange.addEventListener('input', function() {
    const value = this.value;
    priceValue.textContent = `$0 - $${value}`;
});

// Clear Filters
document.getElementById('clearFilters').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
    priceRange.value = 500;
    priceValue.textContent = '$0 - $500';
});

// Add to cart animation
document.querySelectorAll('.btn-add-cart').forEach(btn => {
    btn.addEventListener('click', function() {
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
        this.style.background = '#10b981';
        
        setTimeout(() => {
            this.innerHTML = originalText;
            this.style.background = '';
        }, 2000);
    });
});

// Wishlist functionality
document.querySelectorAll('.wishlist-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const icon = this.querySelector('i');
        if (icon.classList.contains('far')) {
            icon.classList.remove('far');
            icon.classList.add('fas');
            icon.style.color = '#ec4899';
        } else {
            icon.classList.remove('fas');
            icon.classList.add('far');
            icon.style.color = '';
        }
    });
});
</script>
@endsection