@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                <!-- Header with gradient background -->
                <div class="card-header bg-gradient-primary text-white text-center py-4 border-0">
                    <h2 class="fw-bold mb-1">{{ __('Create Account') }}</h2>
                    <p class="mb-0 opacity-75">{{ __('Join us today') }}</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold text-dark">{{ __('Full Name') }}</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-start-0 ps-2" 
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                       placeholder="Enter your full name">
                            </div>
                            @error('name')
                                <div class="text-danger small mt-2">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-dark">{{ __('Email Address') }}</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-start-0 ps-2" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="Enter your email">
                            </div>
                            @error('email')
                                <div class="text-danger small mt-2">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-dark">{{ __('Password') }}</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-start-0 ps-2" 
                                       name="password" required autocomplete="new-password"
                                       placeholder="Create a password">
                                <button type="button" class="input-group-text bg-light border-start-0 toggle-password" data-target="password">
                                    <i class="fas fa-eye text-muted"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-2">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="password-strength mt-2">
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar" id="password-strength-bar" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small class="text-muted" id="password-strength-text">Password strength</small>
                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold text-dark">{{ __('Confirm Password') }}</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password-confirm" type="password" class="form-control border-start-0 ps-2" 
                                       name="password_confirmation" required autocomplete="new-password"
                                       placeholder="Confirm your password">
                                <button type="button" class="input-group-text bg-light border-start-0 toggle-password" data-target="password-confirm">
                                    <i class="fas fa-eye text-muted"></i>
                                </button>
                            </div>
                            <div id="password-match" class="mt-2"></div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label text-muted" for="terms">
                                    I agree to the <a href="#" class="text-primary text-decoration-none">Terms of Service</a> and <a href="#" class="text-primary text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold shadow-sm" id="register-btn">
                                <i class="fas fa-user-plus me-2"></i>{{ __('Create Account') }}
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="text-center mb-4">
                            <span class="text-muted">or sign up with</span>
                        </div>

                        <!-- Social Register (Optional) -->
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-dark btn-lg w-100 py-2">
                                    <i class="fab fa-google me-2"></i>Google
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-primary btn-lg w-100 py-2">
                                    <i class="fab fa-facebook me-2"></i>Facebook
                                </button>
                            </div>
                        </div>

                        <!-- Login Link -->
                        @if (Route::has('login'))
                            <div class="text-center">
                                <span class="text-muted">Already have an account?</span>
                                <a class="text-decoration-none fw-semibold text-primary ms-1" href="{{ route('login') }}">
                                    {{ __('Sign in') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.min-vh-100 {
    min-height: 100vh;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

.card {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
}

.form-control {
    border-radius: 0.375rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    border-color: #667eea;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.btn-primary:disabled {
    opacity: 0.6;
    transform: none;
    box-shadow: none;
}

.input-group-text {
    transition: all 0.3s ease;
}

.toggle-password {
    cursor: pointer;
}

.toggle-password:hover {
    background-color: #e9ecef;
}

.password-strength .progress-bar {
    transition: width 0.3s ease;
}

/* Floating animation */
.card {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Password strength colors */
.strength-weak { background-color: #dc3545; }
.strength-fair { background-color: #fd7e14; }
.strength-good { background-color: #ffc107; }
.strength-strong { background-color: #198754; }
</style>

<script>
// Toggle password visibility
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
        const target = this.getAttribute('data-target');
        const passwordInput = document.getElementById(target);
        const icon = this.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});

// Password strength indicator
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthBar = document.getElementById('password-strength-bar');
    const strengthText = document.getElementById('password-strength-text');
    
    let strength = 0;
    let text = 'Password strength';
    let color = '';
    
    if (password.length >= 8) strength += 25;
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 25;
    if (password.match(/\d/)) strength += 25;
    if (password.match(/[^a-zA-Z\d]/)) strength += 25;
    
    strengthBar.style.width = strength + '%';
    
    if (strength < 25) {
        text = 'Very Weak';
        color = 'strength-weak';
    } else if (strength < 50) {
        text = 'Weak';
        color = 'strength-weak';
    } else if (strength < 75) {
        text = 'Fair';
        color = 'strength-fair';
    } else if (strength < 100) {
        text = 'Good';
        color = 'strength-good';
    } else {
        text = 'Strong';
        color = 'strength-strong';
    }
    
    strengthText.textContent = text;
    strengthBar.className = 'progress-bar ' + color;
});

// Password match validation
document.getElementById('password-confirm').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    const matchDiv = document.getElementById('password-match');
    
    if (confirmPassword === '') {
        matchDiv.innerHTML = '';
    } else if (password === confirmPassword) {
        matchDiv.innerHTML = '<small class="text-success"><i class="fas fa-check-circle me-1"></i>Passwords match</small>';
    } else {
        matchDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times-circle me-1"></i>Passwords do not match</small>';
    }
});

// Terms validation
document.getElementById('terms').addEventListener('change', function() {
    const registerBtn = document.getElementById('register-btn');
    registerBtn.disabled = !this.checked;
});

// Add focus effects
const inputs = document.querySelectorAll('input');
inputs.forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.classList.add('shadow-sm');
    });
    
    input.addEventListener('blur', function() {
        this.parentElement.classList.remove('shadow-sm');
    });
});

// Initialize register button as disabled
document.getElementById('register-btn').disabled = true;
</script>
@endsection