@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 100px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-4">Contact Us</h1>
                    <p class="lead mb-4">We'd love to hear from you. Get in touch with us!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form-card p-4">
                        <h3 class="mb-4">Send us a Message</h3>
                        <form id="contactForm" METHOD="POST" action="{{ route('store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fullname" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control form-control-lg" id="fullname" name="fullname" required placeholder="Enter your full name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" required placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="subject" class="form-label">Subject *</label>
                                        <input type="text" class="form-control form-control-lg" id="subject" name="subject" required placeholder="Enter subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message" class="form-label">Message *</label>
                                        <textarea class="form-control form-control-lg" id="message" name="message" rows="6" required placeholder="Enter your message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Contact Info -->
                    <div class="contact-info-card p-4 mb-4">
                        <h4 class="mb-4">Get in Touch</h4>
                        <div class="contact-item d-flex align-items-start mb-4">
                            <div class="contact-icon me-3">
                                <i class="fas fa-map-marker-alt fa-2x" style="color: #6366f1;"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Our Address</h6>
                                <p class="text-muted mb-0">123 Commerce Street<br>Business District<br>New York, NY 10001</p>
                            </div>
                        </div>
                        <div class="contact-item d-flex align-items-start mb-4">
                            <div class="contact-icon me-3">
                                <i class="fas fa-phone fa-2x" style="color: #6366f1;"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Phone Number</h6>
                                <p class="text-muted mb-0">+1 (555) 123-4567<br>+1 (555) 987-6543</p>
                            </div>
                        </div>
                        <div class="contact-item d-flex align-items-start mb-4">
                            <div class="contact-icon me-3">
                                <i class="fas fa-envelope fa-2x" style="color: #6366f1;"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Email Address</h6>
                                <p class="text-muted mb-0">info@shophub.com<br>support@shophub.com</p>
                            </div>
                        </div>
                        <div class="contact-item d-flex align-items-start">
                            <div class="contact-icon me-3">
                                <i class="fas fa-clock fa-2x" style="color: #6366f1;"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Working Hours</h6>
                                <p class="text-muted mb-0">Monday - Friday: 9:00 - 18:00<br>Saturday: 10:00 - 16:00<br>Sunday: Closed</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="social-card p-4">
                        <h4 class="mb-4">Follow Us</h4>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="social-link">
                                <i class="fab fa-facebook fa-2x"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-twitter fa-2x"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-linkedin fa-2x"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-youtube fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Find Us Here</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="map-card p-4">
                        <div class="map-placeholder" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 400px; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                            <div class="text-center">
                                <i class="fas fa-map fa-4x mb-3" style="color: #6366f1;"></i>
                                <h4>Interactive Map</h4>
                                <p class="text-muted">123 Commerce Street, New York, NY 10001</p>
                                <button class="btn btn-primary mt-3">
                                    <i class="fas fa-directions me-2"></i>Get Directions
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What are your shipping options?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer standard shipping (3-5 business days), express shipping (1-2 business days), and overnight shipping. Free shipping is available on orders over $50.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What is your return policy?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer a 30-day return policy for all items in original condition. Items must be unused and in their original packaging with all tags attached.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Do you ship internationally?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we ship to over 50 countries worldwide. International shipping times and costs vary by destination.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    How can I track my order?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Once your order ships, you'll receive a tracking number via email. You can also track your order by logging into your account on our website.
                                </div>
                            </div>
                        </div>
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

.contact-form-card, .contact-info-card, .social-card, .map-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    height: 100%;
}

.contact-icon {
    margin-top: 0.25rem;
}

.social-link {
    color: #6366f1;
    transition: color 0.3s;
}

.social-link:hover {
    color: #ec4899;
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e2e8f0;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
}

.accordion-button {
    background: white;
    border: none;
    font-weight: 600;
    color: #1e293b;
}

.accordion-button:not(.collapsed) {
    background: #6366f1;
    color: white;
}

.accordion-item {
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
}
</style>

@endsection