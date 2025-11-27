<style>
       :root {
            --primary-color: #6366f1;
            --secondary-color: #ec4899;
            --dark-color: #1e293b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            color: var(--dark-color);
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .btn-cart {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -13px;
            background: var(--secondary-color);
            color: white;
            border-radius: 50%;
            width: 15px;
           
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
</style>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">ShopHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Deals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="#" class="nav-link me-3"><i class="fas fa-search"></i></a>
                    <a href="/login" class="nav-link me-3">Login</a>
                    <a href="/register" class="nav-link me-3">Register</a>
                    <a href="#" class="nav-link btn-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-badge">3</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
