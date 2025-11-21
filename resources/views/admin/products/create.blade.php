@extends('layouts.app')

@section('title', 'Admin - Add Product')

@section('content')
<div class="container" style="margin-top: 100px; padding-bottom: 50px; max-width: 700px;">
    <h1 style="margin-bottom: 20px;">Add New Product</h1>

    @if ($errors->any())
        <div style="background: #f8d7da; padding: 10px; margin-bottom: 15px; border-radius:5px; color:#721c24;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf
        <input type="text" name="name" placeholder="Product Name" class="form-input" required>
        <textarea name="description" placeholder="Description" class="form-input" rows="4"></textarea>
        <input type="number" step="0.01" name="price" placeholder="Price" class="form-input" required>
        <input type="file" name="image" class="form-input">

        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" class="btn btn-success">Add Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </form>
</div>

<style>
    .form-input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
        background: #f9f9f9;
    }
    .btn {
        display: inline-block;
        text-decoration: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        margin: 5px;
    }
    .btn-primary { background-color: #007bff; }
    .btn-success { background-color: #28a745; }
    .btn:hover { opacity: 0.9; }
</style>
@endsection
