@extends('layouts.app')

@section('content')
<style>
    .edit-product-container {
        max-width: 800px;
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
        font-size: 2.2rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
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

    .form-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }

    .form-section {
        margin-bottom: 2.5rem;
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 1.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: var(--primary-color);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 0.7rem;
        font-size: 1rem;
    }

    .form-label .required {
        color: var(--danger-color);
        margin-left: 4px;
    }

    .form-control, .form-select, .form-textarea {
        width: 100%;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 0.9rem 1.2rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus, .form-select:focus, .form-textarea:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        outline: none;
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
        line-height: 1.5;
    }

    .form-hint {
        display: block;
        color: #6b7280;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }

    .error-message {
        display: block;
        color: var(--danger-color);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        font-weight: 500;
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.2);
        color: var(--danger-color);
        padding: 1.2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 1.2rem;
    }

    .alert-danger li {
        margin-bottom: 0.3rem;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        align-items: center;
        padding-top: 2rem;
        border-top: 2px solid #f1f5f9;
        margin-top: 2rem;
    }

    .btn-update {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 12px;
        padding: 1rem 2rem;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
    }

    .btn-cancel {
        background: white;
        color: var(--dark-color);
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 1rem 2rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-cancel:hover {
        border-color: var(--dark-color);
        color: var(--dark-color);
        transform: translateY(-2px);
    }

    .btn-delete {
        background: var(--danger-color);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 1rem 2rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #dc2626;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
    }

    .image-upload {
        border: 2px dashed #e5e7eb;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .image-upload:hover {
        border-color: var(--primary-color);
        background: rgba(99, 102, 241, 0.02);
    }

    .upload-icon {
        font-size: 3rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .upload-text {
        color: #6b7280;
        margin-bottom: 1rem;
    }

    .btn-upload {
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.6rem 1.2rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-upload:hover {
        background: #4f46e5;
    }

    .preview-container {
        margin-top: 1rem;
        text-align: center;
    }

    .current-image {
        max-width: 200px;
        max-height: 200px;
        border-radius: 10px;
        border: 2px solid #e5e7eb;
        margin-bottom: 1rem;
    }

    .image-preview {
        max-width: 200px;
        max-height: 200px;
        border-radius: 10px;
        border: 2px solid #e5e7eb;
        display: none;
    }

    .category-suggestions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.8rem;
    }

    .category-tag {
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary-color);
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .category-tag:hover {
        background: var(--primary-color);
        color: white;
    }

    .price-input-container {
        position: relative;
    }

    .price-symbol {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        font-weight: 600;
    }

    .price-input-container .form-control {
        padding-left: 2.5rem;
    }

    .product-info-badge {
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary-color);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 1rem;
    }

    .delete-section {
        background: rgba(239, 68, 68, 0.05);
        border: 1px solid rgba(239, 68, 68, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 2rem;
    }

    .delete-section-title {
        color: var(--danger-color);
        font-weight: 600;
        margin-bottom: 0.8rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .delete-warning {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .edit-product-container {
            padding: 10px;
        }

        .page-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-update, .btn-cancel, .btn-delete {
            text-align: center;
            justify-content: center;
        }
    }
</style>

<div class="edit-product-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-edit"></i>
            Edit Product
        </h1>
        <a href="{{ route('products.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i>
            Back to Products
        </a>
    </div>

    <!-- Product Info Badge -->
    <div class="product-info-badge">
        <i class="fas fa-info-circle"></i>
        Product ID: {{ $product->id }} • Created: {{ $product->created_at->format('M d, Y') }}
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Product Form -->
    <div class="form-card">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Basic Information Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i>
                    Basic Information
                </h3>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            Product Name <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ old('name', $product->name) }}" required maxlength="255"
                               placeholder="Enter product name">
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">
                            Category <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" id="category" name="category" 
                               value="{{ old('category', $product->category) }}" required maxlength="100"
                               placeholder="e.g., Electronics, Clothing">
                        @error('category')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        
                        <!-- Category Suggestions -->
                        <div class="category-suggestions">
                            <span class="category-tag" onclick="setCategory('Electronics')">Electronics</span>
                            <span class="category-tag" onclick="setCategory('Clothing')">Clothing</span>
                            <span class="category-tag" onclick="setCategory('Books')">Books</span>
                            <span class="category-tag" onclick="setCategory('Home & Garden')">Home & Garden</span>
                            <span class="category-tag" onclick="setCategory('Sports')">Sports</span>
                        </div>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="description" class="form-label">Product Description</label>
                    <textarea class="form-control form-textarea" id="description" name="description" 
                              rows="4" placeholder="Describe the product features, benefits, and specifications...">{{ old('description', $product->description) }}</textarea>
                    <span class="form-hint">Provide detailed information about the product to help customers make informed decisions.</span>
                    @error('description')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Pricing & Inventory Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-tags"></i>
                    Pricing & Inventory
                </h3>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="price" class="form-label">
                            Price <span class="required">*</span>
                        </label>
                        <div class="price-input-container">
                            <span class="price-symbol">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" 
                                   value="{{ old('price', $product->price) }}" required 
                                   placeholder="0.00">
                        </div>
                        <span class="form-hint">Enter the product price in USD</span>
                        @error('price')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stock_quantity" class="form-label">
                            Stock Quantity <span class="required">*</span>
                        </label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" 
                               value="{{ old('stock_quantity', $product->stock_quantity) }}" required min="0"
                               placeholder="Enter available quantity">
                        <span class="form-hint">Set to 0 if out of stock</span>
                        @error('stock_quantity')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ route('products.index') }}" class="btn-cancel">
                    <i class="fas fa-times"></i>
                    Cancel
                </a>
                <button type="submit" class="btn-update">
                    <i class="fas fa-save"></i>
                    Update Product
                </button>
            </div>
        </form>

        <!-- Delete Section -->
        <div class="delete-section">
            <h4 class="delete-section-title">
                <i class="fas fa-exclamation-triangle"></i>
                Danger Zone
            </h4>
            <p class="delete-warning">
                Once you delete a product, there is no going back. Please be certain.
            </p>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                    <i class="fas fa-trash"></i>
                    Delete Product
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function setCategory(category) {
        document.getElementById('category').value = category;
    }

    function previewImage(input) {
        const previewContainer = document.getElementById('previewContainer');
        const preview = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
                
                // Hide current image when new image is selected
                const currentImage = document.getElementById('currentImage');
                if (currentImage) {
                    currentImage.style.display = 'none';
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeNewImage() {
        document.getElementById('image').value = '';
        document.getElementById('previewContainer').style.display = 'none';
        
        // Show current image again
        const currentImage = document.getElementById('currentImage');
        if (currentImage) {
            currentImage.style.display = 'block';
        }
    }

    function removeCurrentImage() {
        document.getElementById('removeImage').value = '1';
        const currentImage = document.getElementById('currentImage');
        if (currentImage) {
            currentImage.style.display = 'none';
        }
        
        // Show message
        alert('Current image will be removed when you update the product.');
    }

    // Auto-calculate and format price
    document.getElementById('price').addEventListener('blur', function() {
        if (this.value) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    });

    // Character counter for description
    const description = document.getElementById('description');
    if (description) {
        const charCount = document.createElement('div');
        charCount.className = 'form-hint';
        charCount.style.marginTop = '0.5rem';
        description.parentNode.insertBefore(charCount, description.nextSibling);

        function updateCharCount() {
            const count = description.value.length;
            const maxChars = 1000;
            charCount.textContent = `${count}/${maxChars} characters`;
            
            if (count > maxChars * 0.9) {
                charCount.style.color = 'var(--warning-color)';
            } else {
                charCount.style.color = '#6b7280';
            }
        }

        description.addEventListener('input', updateCharCount);
        updateCharCount(); // Initial call
    }

    // Confirm before leaving page if changes were made
    let formChanged = false;
    const form = document.querySelector('form');
    const formInputs = form.querySelectorAll('input, select, textarea');
    
    formInputs.forEach(input => {
        input.addEventListener('input', () => {
            formChanged = true;
        });
    });

    window.addEventListener('beforeunload', (e) => {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = '';
        }
    });

    form.addEventListener('submit', () => {
        formChanged = false;
    });
</script>
@endsection