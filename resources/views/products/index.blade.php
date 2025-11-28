@extends('layouts.app')

@section('content')
<style>
    .products-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding: 2rem;
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
    }

    .btn-add-product {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 12px;
        padding: 0.8rem 1.5rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-add-product:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        color: white;
    }

    .products-table-container {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .table-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 1.5rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .table-actions {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .search-box {
        position: relative;
        background: rgba(255,255,255,0.2);
        border-radius: 10px;
        padding: 0.5rem 1rem;
    }

    .search-input {
        background: transparent;
        border: none;
        color: white;
        padding: 0.3rem 0;
        width: 200px;
    }

    .search-input::placeholder {
        color: rgba(255,255,255,0.8);
    }

    .search-input:focus {
        outline: none;
    }

    .table-controls {
        display: flex;
        gap: 0.5rem;
    }

    .btn-control {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        border: none;
        background: rgba(255,255,255,0.2);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-control:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
    }

    .table {
        margin: 0;
        border-collapse: collapse;
    }

    .table th {
        background: #f8fafc;
        padding: 1.2rem 1rem;
        font-weight: 600;
        color: var(--dark-color);
        border-bottom: 2px solid #e5e7eb;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
    }

    .table td {
        padding: 1.2rem 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #e5e7eb;
        color: #4b5563;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: #f8fafc;
        transform: translateY(-1px);
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .product-image {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #e5e7eb;
    }

    .product-details {
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 0.2rem;
    }

    .product-category {
        font-size: 0.8rem;
        color: #6b7280;
        background: #f3f4f6;
        padding: 0.2rem 0.6rem;
        border-radius: 20px;
        display: inline-block;
        width: fit-content;
    }

    .price {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 1.1rem;
    }

    .description {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #6b7280;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-action {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .btn-edit {
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary-color);
    }

    .btn-edit:hover {
        background: var(--primary-color);
        color: white;
        transform: scale(1.1);
    }

    .btn-view {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .btn-view:hover {
        background: var(--warning-color);
        color: white;
        transform: scale(1.1);
    }

    .btn-delete {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
        border: none;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: var(--danger-color);
        color: white;
        transform: scale(1.1);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6b7280;
    }

    .empty-icon {
        font-size: 4rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .empty-text {
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }

    .table-footer {
        padding: 1.5rem 2rem;
        background: #f8fafc;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #e5e7eb;
    }

    .pagination-info {
        color: #6b7280;
        font-size: 0.9rem;
    }

    .pagination {
        margin: 0;
        display: flex;
        gap: 0.5rem;
    }

    .page-link {
        padding: 0.5rem 0.8rem;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        color: var(--dark-color);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .page-link:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .page-link.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-icon.products { background: rgba(99, 102, 241, 0.1); color: var(--primary-color); }
    .stat-icon.categories { background: rgba(16, 185, 129, 0.1); color: var(--success-color); }
    .stat-icon.value { background: rgba(245, 158, 11, 0.1); color: var(--warning-color); }

    .stat-info {
        flex: 1;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--dark-color);
        line-height: 1;
        margin-bottom: 0.3rem;
    }

    .stat-label {
        color: #6b7280;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .table-header {
            flex-direction: column;
            gap: 1rem;
        }

        .table-actions {
            width: 100%;
            justify-content: space-between;
        }

        .search-box {
            flex: 1;
        }

        .table-footer {
            flex-direction: column;
            gap: 1rem;
        }

        .action-buttons {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>

<div class="products-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-boxes me-2"></i>Products 
        </h1>
        <a href="{{ route('products.create') }}" class="btn-add-product">
            <i class="fas fa-plus"></i>
            Add New Product
        </a>
    </div>

    <!-- Statistics -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon products">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $products->count() }}</div>
                <div class="stat-label">Total Products</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon categories">
                <i class="fas fa-tags"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $products->pluck('category')->unique()->count() }}</div>
                <div class="stat-label">Categories</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon value">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">${{ number_format($products->sum('price'), 2) }}</div>
                <div class="stat-label">Total Value</div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="products-table-container">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-list"></i>
                Products List
            </h3>
           
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="{{ $product->image ?? 'https://via.placeholder.com/50' }}" 
                                     alt="{{ $product->name }}" 
                                     class="product-image">
                                <div class="product-details">
                                    <div class="product-name">{{ $product->name }}</div>
                                    <span class="product-category">{{ $product->category }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="description" title="{{ $product->description }}">
                                {{ $product->description }}
                            </div>
                        </td>
                        <td>
                            <div class="price">${{ number_format($product->price, 2) }}</div>
                        </td>
                        <td>
                            <span class="product-category">{{ $product->category }}</span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('products.edit', $product->id) }}" 
                                   class="btn-action btn-edit"
                                   title="Edit Product">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <a href="{{ route('products.show', $product->id) }}" 
                                   class="btn-action btn-view"
                                   title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" 
                                      method="POST" 
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn-action btn-delete"
                                            title="Delete Product"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-box-open"></i>
                                </div>
                                <div class="empty-text">No products found</div>
                                <p>Get started by adding your first product.</p>
                                <a href="{{ route('products.create') }}" class="btn-add-product">
                                    <i class="fas fa-plus"></i>
                                    Add Product
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        @if($products->count() > 0)
        <div class="table-footer">
            <div class="pagination-info">
                Showing {{ $products->count() }} products
            </div>
            <!-- Add pagination links if needed -->
            <!-- <div class="pagination">
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
            </div> -->
        </div>
        @endif
    </div>
</div>

<script>
    // Simple search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.search-input');
        const tableRows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Refresh button
        document.querySelector('.btn-control[title="Refresh"]').addEventListener('click', function() {
            window.location.reload();
        });
    });
</script>
@endsection