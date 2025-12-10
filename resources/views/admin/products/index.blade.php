@extends('layouts.app')

@section('title', 'Admin - Products')

@section('content')
    <div class="container" style="margin-top: 100px; padding-bottom: 50px;">

        <!-- Header -->
        <div style="display:flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h1>Products</h1>
            <a href="{{ route('members.index') }}" class="btn btn-info"
               style="padding:10px 15px; font-size:16px; background:#6c757d;">Go to Members Page</a>
        </div>
        <!-- Simple Search Bar -->
        <form action="{{ route('products.index') }}" method="GET"
              style="margin-bottom:20px; display:flex; gap:10px; align-items:center;">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by Name or Slug"
                   style="padding:8px 12px; border-radius:5px; border:1px solid #ccc; width:250px; color: black;">
            <button type="submit"
                    style="padding:8px 15px; border-radius:5px; border:none; background:#ff1e00; color:white; font-weight:bold; cursor:pointer; transition:0.3s;">
                Search
            </button>
        </form>


        <!-- Products Table -->
        <table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: center;" id="productsTable">
            <thead>
            <tr style="background: #ff1e00; color: #fff;">
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary" style="margin-right:5px;">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No products found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Add New Product Button -->
        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('products.create') }}" class="btn btn-success" style="padding:10px 20px; font-size:16px;">Add New Product</a>
        </div>
    </div>

    <!-- CSS for buttons -->
    <style>
        .btn { display: inline-block; text-decoration: none; color: white; padding: 8px 15px; border-radius: 5px; font-weight: bold; }
        .btn-primary { background-color: #007bff; }
        .btn-danger { background-color: #dc3545; }
        .btn-success { background-color: #28a745; }
        .btn-info { background-color: #6c757d; }
        .btn:hover { opacity: 0.9; }
    </style>
@endsection
