@extends('layouts.app')

@section('title', 'Admin - Products')

@section('content')
    <div class="container" style="margin-top: 100px; padding-bottom: 50px;">

        <!-- Header -->
        <div style="display:flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h1 style="color: white; text-shadow: 2px 2px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Products</h1>
            <div>
                <a href="{{ route('orders.index') }}" class="btn btn-warning" style="padding:10px 15px; font-size:16px; background:#ffc107; color:black; margin-right:10px;">Order History</a>
                <a href="{{ route('members.index') }}" class="btn btn-info"
                   style="padding:10px 15px; font-size:16px; background:#6c757d;">Go to Members Page</a>
            </div>
        </div>
        <!-- Simple Search Bar -->
    <!-- Simple Search Bar -->
    <form action="{{ route('products.index') }}" method="GET" style="margin-bottom:20px; display:flex; gap:10px; align-items:center;">
        <input type="text" name="search" id="search-input" value="{{ $search ?? '' }}" placeholder="Search by Name or Slug" class="form-input">
        <button type="submit" class="btn-search">Search</button>
    </form>

    <div class="table-responsive">
        <table class="admin-table" id="productsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="products-table-body">
                @include('admin.products.partials.product_rows')
            </tbody>
        </table>
    </div>

    <!-- Add New Product Button -->
    <div style="margin-top: 20px; text-align: center;">
        <a href="{{ route('products.create') }}" class="btn-action btn-add">Add New Product</a>
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
    .admin-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #1e1e1e; /* Dark Bg */
        color: #ffffff; /* White Text */
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.5);
    }
    .admin-table th, .admin-table td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #333;
        color: #ffffff;
        vertical-align: middle;
    }
    .admin-table th {
        background-color: #ff1e00;
        color: #ffffff;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
    }
    .admin-table tr:hover {
        background-color: #2d2d2d;
    }

    .form-input {
        padding: 8px 12px;
        border-radius: 5px;
        border: 1px solid #444; /* Dark Border */
        width: 250px;
        color: white; /* White Text */
        background: #2d2d2d; /* Dark Input */
    }
    .btn-search {
        padding: 8px 15px;
        border-radius: 5px;
        border: none;
        background: #ff1e00;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }
    .btn-search:hover { background: #d61a00; }
    
    /* Action Buttons */
    .btn { display: inline-block; text-decoration: none; color: white; padding: 8px 15px; border-radius: 5px; font-weight: bold; }
    .btn-warning { background-color: #ffc107; color: black; }
    .btn-info { background-color: #6c757d; }
    
    .btn-action {
        display: inline-block;
        padding: 6px 15px;
        border-radius: 4px;
        margin: 0 5px;
        text-decoration: none;
        font-weight: bold;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }
    .btn-edit { background-color: #007bff; color: white; }
    .btn-delete { background-color: #dc3545; color: white; }
    .btn-add { background-color: #28a745; color: white; padding: 10px 20px; font-size: 16px; }
    
    .btn-action:hover, .btn:hover { opacity: 0.9; }
</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search-input').on('keyup', function () {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('products.index') }}",
                    type: "GET",
                    data: {'search': query},
                    success: function (data) {
                        $('#products-table-body').html(data);
                    }
                })
            });
        });
    </script>
@endsection
