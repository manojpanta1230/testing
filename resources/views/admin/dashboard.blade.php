@extends('layouts.app')
@section('content')


    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #ec4899;
            --dark-color: #1e293b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color), #4f46e5);
            color: white;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .sidebar-brand i {
            color: #fbbf24;
        }

        .sidebar-menu {
            padding: 1rem 0;
            height: calc(100vh - 80px);
            overflow-y: auto;
        }

        .menu-item {
            padding: 0.8rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: #fbbf24;
        }

        .menu-item i {
            width: 20px;
            text-align: center;
        }

        .menu-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 1rem 1.5rem 0.5rem;
            color: rgba(255,255,255,0.5);
            font-weight: 600;
        }

        .submenu {
            padding-left: 2.5rem;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Header */
        .main-header {
            background: white;
            padding: 1rem 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        /* Cards */
        .dashboard-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .card-icon.primary { background: rgba(99, 102, 241, 0.1); color: var(--primary-color); }
        .card-icon.success { background: rgba(16, 185, 129, 0.1); color: var(--success-color); }
        .card-icon.warning { background: rgba(245, 158, 11, 0.1); color: var(--warning-color); }
        .card-icon.danger { background: rgba(239, 68, 68, 0.1); color: var(--danger-color); }

        .card-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .card-label {
            color: #6b7280;
            font-weight: 500;
        }

        /* Tables */
        .data-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .table-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: between;
            align-items: center;
            gap: 20px;
        }

        .table-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        .table-actions {
            display: flex;
            gap: 0.5rem;
        }

        .table {
            margin: 0;
        }

        .table th {
            background: #f8fafc;
            border-bottom: 2px solid #e5e7eb;
            font-weight: 600;
            color: var(--dark-color);
            padding: 1rem;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #e5e7eb;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-success {
            background: var(--success-color);
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-warning {
            background: var(--warning-color);
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background: var(--danger-color);
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-icon:hover {
            transform: scale(1.1);
        }

        /* Forms */
        .form-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        /* Status Badges */
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .badge-success { background: rgba(16, 185, 129, 0.1); color: var(--success-color); }
        .badge-warning { background: rgba(245, 158, 11, 0.1); color: var(--warning-color); }
        .badge-danger { background: rgba(239, 68, 68, 0.1); color: var(--danger-color); }
        .badge-info { background: rgba(99, 102, 241, 0.1); color: var(--primary-color); }

        /* Modal */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 15px 15px 0 0;
            border: none;
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
        }

        /* Toggle Button */
        .menu-toggle {
            display: none;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Charts and Stats */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .action-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            color: inherit;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            color: inherit;
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary-color);
        }

        .action-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .action-desc {
            color: #6b7280;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                <i class="fas fa-shopping-bag"></i>
                <span>ShopHub Admin</span>
            </a>
        </div>
        
        <div class="sidebar-menu">
            <div class="menu-label">MAIN</div>
            <a href="#" class="menu-item active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            
            <div class="menu-label">MANAGEMENT</div>
            <a href="{{ route('show') }}" class="menu-item">
                <i class="fas fa-box"></i>
                <span>Products</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-tags"></i>
                <span>Categories</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Customers</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-shopping-cart"></i>
                <span>Orders</span>
            </a>
            
            <div class="menu-label">CONTENT</div>
            <a href="#" class="menu-item">
                <i class="fas fa-newspaper"></i>
                <span>Blog Posts</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-images"></i>
                <span>Media Gallery</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-comments"></i>
                <span>Reviews</span>
            </a>
            
            <div class="menu-label">SETTINGS</div>
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-user-shield"></i>
                <span>Administrators</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span>Analytics</span>
            </a>
            
            <div class="menu-label">ACCOUNT</div>
            <a href="#" class="menu-item">
                <i class="fas fa-user-circle"></i>
                <span>Profile</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="main-header">
            <div class="d-flex align-items-center gap-3">
                <button class="menu-toggle d-lg-none">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="header-title">Admin Dashboard</h1>
            </div>
            <div class="header-actions">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">New order received</a></li>
                        <li><a class="dropdown-item" href="#">Product low in stock</a></li>
                        <li><a class="dropdown-item" href="#">New customer registered</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-2"></i>
                        Admin User
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="stat-grid">
            <div class="dashboard-card">
                <div class="card-icon primary">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="card-value">1,248</div>
                <div class="card-label">Total Orders</div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon success">
                    <i class="fas fa-box"></i>
                </div>
                <div class="card-value">568</div>
                <div class="card-label">Products</div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon warning">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-value">2,847</div>
                <div class="card-label">Customers</div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon danger">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-value">$48,256</div>
                <div class="card-label">Revenue</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="#" class="action-card" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <div class="action-icon">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="action-title">Add Product</div>
                <div class="action-desc">Create new product listing</div>
            </a>
            <a href="#" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="action-title">Manage Categories</div>
                <div class="action-desc">Organize product categories</div>
            </a>
            <a href="#" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="action-title">View Reports</div>
                <div class="action-desc">Sales and analytics</div>
            </a>
            <a href="#" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="action-title">Settings</div>
                <div class="action-desc">System configuration</div>
            </a>
        </div>

        <!-- Products Table -->
        <div class="data-table mb-4">
            <div class="table-header">
                <h3 class="table-title">
                    <i class="fas fa-box me-2"></i>Products Management
                </h3>
                <div class="table-actions">
                    <button class="btn btn-light btn-icon" title="Refresh">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <button class="btn btn-light btn-icon" title="Filter">
                        <i class="fas fa-filter"></i>
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="fas fa-plus me-2"></i>Add Product
                    </button>
                </div>
            </div>
          @foreach ( $products as $product )
                <div class="table-responsive">
                <table class="table table-hover">
                  
                    <tbody>
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                   <img src="https://plus.unsplash.com/premium_photo-1679513691474-73102089c117?q=80&w=1113&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded me-3 
                                    " alt="Product" style="width: 10%;">
                                    <div>
                                        <div class="fw-semibold">{{ $product->name }}</div>
                                        <small class="text-muted">{{ $product->category }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $product->category }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary btn-icon"  href="{{ route('products.edit', $product->id) }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-warning btn-icon"  href="{{ route('products.show', $product->id) }}" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-danger btn-icon"  href="{{ route('products.destroy', $product->id) }}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                  
                    </tbody>
                </table>
            </div>
          @endforeach  
          
        </div>

        <!-- Recent Orders Table -->
        <div class="data-table">
            <div class="table-header">
                <h3 class="table-title">
                    <i class="fas fa-shopping-cart me-2"></i>Recent Orders
                </h3>
                <div class="table-actions">
                    <button class="btn btn-light">View All</button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#ORD-001</td>
                            <td>John Doe</td>
                            <td>2024-01-15</td>
                            <td>$299.97</td>
                            <td><span class="badge badge-success">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary btn-icon" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning btn-icon" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#ORD-002</td>
                            <td>Jane Smith</td>
                            <td>2024-01-14</td>
                            <td>$159.99</td>
                            <td><span class="badge badge-warning">Processing</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary btn-icon" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning btn-icon" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus me-2"></i>Add New Product
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
              <div class="modal-body">
    <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select" required>
                    <option value="">Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Home & Living">Home & Living</option>
                    <option value="Sports">Sports</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" placeholder="0.00" step="0.01" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Stock Quantity</label>
                <input type="number" name="stock_quantity" class="form-control" placeholder="0" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter product description"></textarea>
        </div>
         <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="SUMBIT" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Product
                    </button>
                </div>
    </form>
</div>

              
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile sidebar toggle
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Add active class to clicked menu items
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

       
        // Form submission simulation
        document.querySelector('#addProductModal .btn-primary').addEventListener('click', function() {
            // Here you would normally handle form submission
            alert('Product added successfully!');
            var modal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
            modal.hide();
            document.querySelector('#addProductModal form').reset();
        });
    </script>

@endsection