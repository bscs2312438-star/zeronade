@extends('layouts.app')

@section('title', 'Admin - Edit Product')

@section('content')
    <div class="container" style="margin-top: 100px; padding-bottom: 50px; max-width: 700px;">
        <h1 style="margin-bottom: 20px;">Edit Product</h1>

        @if ($errors->any())
            <div style="background: #f8d7da; padding: 10px; margin-bottom: 15px; border-radius:5px; color:#721c24;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $product->name }}" placeholder="Product Name" class="form-input" required>
            <textarea name="description" placeholder="Description" class="form-input" rows="4">{{ $product->description }}</textarea>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" placeholder="Price" class="form-input" required>
            <input type="file" name="image" class="form-input">

            @if($product->image)
                <div>
                    <img src="{{ asset('images/' . $product->image) }}" width="120" alt="Product Image">
                </div>
            @endif

            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" class="btn btn-success">Update Product</button>
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
            background: #fff;     /* White background */
            color: #000;          /* Black text */
        }
        .form-input::placeholder {
            color: #888;          /* Gray placeholder like previous code */
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
