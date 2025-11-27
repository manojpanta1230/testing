@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHub - Your Premium Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #ec4899;
            --dark-color: #1e293b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-hero {
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            font-weight: 600;
            transition: transform 0.3s;
        }

        .btn-hero:hover {
            transform: translateY(-3px);
        }

        /* Categories */
        .category-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            height: 200px;
            position: relative;
            background: white;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .category-content {
            position: relative;
            z-index: 1;
            color: black;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .category-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Products */
        .product-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            background: white;
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
            color: var(--primary-color);
            position: relative;
            overflow: hidden;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .product-body {
            padding: 1.5rem;
        }

        .product-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
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
            background: var(--primary-color);
            border: none;
            color: white;
            transition: background 0.3s;
        }

        .btn-add-cart:hover {
            background: var(--secondary-color);
        }

        /* Features */
        .features-section {
            background: #f8fafc;
            padding: 80px 0;
        }

        .feature-box {
            text-align: center;
            padding: 2rem;
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .feature-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        /* Newsletter */
        .newsletter-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 60px 0;
        }

        .newsletter-input {
            border-radius: 50px 0 0 50px;
            border: none;
            padding: 15px 25px;
        }

        .newsletter-btn {
            border-radius: 0 50px 50px 0;
            padding: 15px 35px;
            border: none;
            background: white;
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Welcome Message */
        .welcome-alert {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        /* Stats Cards */
        .stats-section {
            padding: 60px 0;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--dark-color);
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Summer Collection 2024</h1>
                    <p class="hero-subtitle">Discover amazing products at unbeatable prices. Shop the latest trends now!</p>
                    <button class="btn btn-light btn-hero">Shop Now <i class="fas fa-arrow-right ms-2"></i></button>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-shopping-bag" style="font-size: 15rem; opacity: 0.2;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Welcome Message for Logged-in Users -->
    @auth
    <div class="container mt-4">
        <div class="welcome-alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x me-3"></i>
                <div>
                    <h4 class="mb-1">Welcome back, {{ Auth::user()->name }}! </h4>
                    <p class="mb-0">You are successfully logged in. Start exploring our latest collection.</p>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <!-- Quick Stats -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-number">1.5K+</div>
                        <div class="stat-label">Happy Customers</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Products</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Brands</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Shop by Category</h2>
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-content">
                            <i class="fas fa-tshirt category-icon"></i>
                            <h3 class="category-title">Fashion</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-content">
                            <i class="fas fa-laptop category-icon"></i>
                            <h3 class="category-title">Electronics</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-content">
                            <i class="fas fa-home category-icon"></i>
                            <h3 class="category-title">Home & Living</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-content">
                            <i class="fas fa-dumbbell category-icon"></i>
                            <h3 class="category-title">Sports</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Featured Products</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="fas fa-headphones"></i>
                            <span class="product-badge">New</span>
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
                            <div class="product-price">$99.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="fas fa-watch"></i>
                            <span class="product-badge">Sale</span>
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
                            <div class="product-price">$199.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="fas fa-camera"></i>
                            <span class="product-badge">Hot</span>
                        </div>
                        <div class="product-body">
                            <h5 class="product-title">Digital Camera 4K</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="text-muted ms-1">(4.0)</span>
                            </div>
                            <div class="product-price">$499.99</div>
                            <button class="btn btn-add-cart"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card">
                        <div class="product-image">
                            <i class="fas fa-gamepad"></i>
                            <span class="product-badge">New</span>
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
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-shipping-fast feature-icon"></i>
                        <h5 class="feature-title">Free Shipping</h5>
                        <p class="text-muted">On orders over $50</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-undo feature-icon"></i>
                        <h5 class="feature-title">Easy Returns</h5>
                        <p class="text-muted">30-day return policy</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-lock feature-icon"></i>
                        <h5 class="feature-title">Secure Payment</h5>
                        <p class="text-muted">100% secure transactions</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-headset feature-icon"></i>
                        <h5 class="feature-title">24/7 Support</h5>
                        <p class="text-muted">Dedicated support team</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="mb-3">Subscribe to Our Newsletter</h2>
                    <p class="mb-4">Get the latest updates on new products and upcoming sales</p>
                    <div class="input-group">
                        <input type="email" class="form-control newsletter-input" placeholder="Enter your email">
                        <button class="btn newsletter-btn">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
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

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
@endsection