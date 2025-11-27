@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 100px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-4">About ShopHub</h1>
                    <p class="lead mb-4">Your trusted partner in online shopping since 2020</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title mb-4">Our Story</h2>
                    <p class="lead text-muted mb-4">
                        Founded in 2020, ShopHub started as a small startup with a big vision: to revolutionize 
                        the way people shop online. What began as a simple idea has grown into one of the most 
                        trusted e-commerce platforms in the industry.
                    </p>
                    <p class="text-muted mb-4">
                        We believe that shopping should be an experience, not just a transaction. That's why 
                        we've dedicated ourselves to creating a platform that offers not just products, but 
                        solutions that enhance your lifestyle.
                    </p>
                    <div class="row mt-5">
                        <div class="col-md-4 text-center">
                            <div class="stat-number">50K+</div>
                            <div class="stat-label">Happy Customers</div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="stat-number">5K+</div>
                            <div class="stat-label">Products</div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="stat-number">100+</div>
                            <div class="stat-label">Brands</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 400px; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-store" style="font-size: 8rem; color: #6366f1;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Our Values</h2>
                    <p class="text-muted">The principles that guide everything we do</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-card text-center p-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-users fa-3x" style="color: #6366f1;"></i>
                        </div>
                        <h4 class="value-title">Customer First</h4>
                        <p class="text-muted">Our customers are at the heart of everything we do. We listen, we learn, and we deliver.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card text-center p-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-shield-alt fa-3x" style="color: #6366f1;"></i>
                        </div>
                        <h4 class="value-title">Trust & Quality</h4>
                        <p class="text-muted">We maintain the highest standards of quality and build trust through transparency.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card text-center p-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-rocket fa-3x" style="color: #6366f1;"></i>
                        </div>
                        <h4 class="value-title">Innovation</h4>
                        <p class="text-muted">We constantly innovate to provide the best shopping experience and latest products.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Meet Our Team</h2>
                    <p class="text-muted">The passionate people behind ShopHub</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card text-center">
                        <div class="team-image mb-3" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 200px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; width: 200px;">
                            <i class="fas fa-user-tie fa-4x" style="color: #6366f1;"></i>
                        </div>
                        <h4 class="team-name">John Smith</h4>
                        <p class="team-role text-muted">CEO & Founder</p>
                        <p class="team-bio text-muted">Visionary leader with 10+ years in e-commerce</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card text-center">
                        <div class="team-image mb-3" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 200px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; width: 200px;">
                            <i class="fas fa-user-graduate fa-4x" style="color: #6366f1;"></i>
                        </div>
                        <h4 class="team-name">Sarah Johnson</h4>
                        <p class="team-role text-muted">CTO</p>
                        <p class="team-bio text-muted">Tech enthusiast driving innovation</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card text-center">
                        <div class="team-image mb-3" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 200px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; width: 200px;">
                            <i class="fas fa-user-md fa-4x" style="color: #6366f1;"></i>
                        </div>
                        <h4 class="team-name">Mike Chen</h4>
                        <p class="team-role text-muted">Head of Operations</p>
                        <p class="team-bio text-muted">Ensuring seamless customer experiences</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card text-center">
                        <div class="team-image mb-3" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 200px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; width: 200px;">
                            <i class="fas fa-user-edit fa-4x" style="color: #6366f1;"></i>
                        </div>
                        <h4 class="team-name">Emily Davis</h4>
                        <p class="team-role text-muted">Marketing Director</p>
                        <p class="team-bio text-muted">Building brands and connecting with customers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mission-card p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-bullseye fa-3x mb-3" style="color: #6366f1;"></i>
                            <h3>Our Mission</h3>
                        </div>
                        <p class="text-muted text-center">
                            To provide an exceptional online shopping experience by offering high-quality products, 
                            competitive prices, and outstanding customer service that exceeds expectations.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="vision-card p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-eye fa-3x mb-3" style="color: #6366f1;"></i>
                            <h3>Our Vision</h3>
                        </div>
                        <p class="text-muted text-center">
                            To become the world's most customer-centric e-commerce platform, where people can find 
                            and discover anything they want to buy online at the most affordable prices.
                        </p>
                    </div>
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

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #6366f1;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #1e293b;
    font-weight: 600;
}

.value-card, .team-card, .mission-card, .vision-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
    height: 100%;
}

.value-card:hover, .team-card:hover, .mission-card:hover, .vision-card:hover {
    transform: translateY(-5px);
}

.value-title, .team-name {
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 1rem;
}

.team-role {
    font-weight: 500;
    color: #6366f1;
}

.about-image, .team-image {
    transition: transform 0.3s;
}

.about-image:hover, .team-image:hover {
    transform: scale(1.05);
}
</style>
@endsection