@extends('layouts.app')

@section('title', 'Admin - Products')

@section('content')
<div class="container" style="margin-top: 100px; padding-bottom: 50px;">
    <h1 style="margin-bottom: 20px;">Products</h1>

    <table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: center;">
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
            @foreach($products as $product)
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
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px; text-align: center;">
        <a href="{{ route('products.create') }}" class="btn btn-success" style="padding:10px 20px; font-size:16px;">Add New Product</a>
    </div>
</div>

<!-- Optional inline CSS for spacing and buttons -->
<style>
    .btn {
        display: inline-block;
        text-decoration: none;
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        font-weight: bold;
    }
    .btn-primary { background-color: #007bff; }
    .btn-danger { background-color: #dc3545; }
    .btn-success { background-color: #28a745; }
    .btn:hover { opacity: 0.9; }
</style>
@endsection

