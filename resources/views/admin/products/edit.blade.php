@extends('layouts.app')

@section('title', 'Admin - Edit Product')

@section('content')
    <div class="container" style="margin-top: 100px; padding-bottom: 50px;">
        <h1 style="margin-bottom: 20px; text-align: center; color: white; text-shadow: 2px 2px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Edit Product</h1>

        @if ($errors->any())
            <div style="background: #f8d7da; padding: 10px; margin-bottom: 15px; border-radius:5px; color:#721c24;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="form-card">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-input" rows="4">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <div style="display:flex; gap:10px; align-items:center;">
                    <select name="category_id" class="form-input" style="flex:1;">
                        <option value="">Select Existing Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <span style="font-weight:bold; color:white;">OR</span>
                    <input type="text" name="new_category" placeholder="Create New Category" class="form-input" style="flex:1;">
                </div>
            </div>

            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="image" class="form-input">
                @if($product->image)
                    <div style="margin-top: 10px;">
                        <img src="{{ asset('images/' . $product->image) }}" width="120" style="border-radius:5px; border:1px solid #ccc;">
                    </div>
                @endif
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Update Product</button>
                <a href="{{ route('products.index') }}" class="btn-cancel">Back to List</a>
            </div>
        </form>
    </div>
</div>

<style>
    body {
        background-image: url("{{ asset('images/boom.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
    .form-card {
        background: #1e1e1e; /* Dark Card */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.5);
        max-width: 700px;
        margin: 0 auto;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #fff; /* White Label */
        font-weight: bold;
    }
    .form-input {
        width: 100%;
        padding: 12px;
        border: 1px solid #444; /* Dark Border */
        border-radius: 6px;
        background: #2d2d2d; /* Dark Input */
        color: #fff; /* White Text */
        font-size: 16px;
    }
    .form-actions {
        margin-top: 30px;
        text-align: center;
        display: flex;
        gap: 15px;
        justify-content: center;
    }
    .btn-submit {
        background: #28a745;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }
    .btn-cancel {
        background: #007bff;
        color: white;
        padding: 12px 25px;
        text-decoration: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
    }
    .btn-submit:hover, .btn-cancel:hover { opacity: 0.9; }
</style>
@endsection
