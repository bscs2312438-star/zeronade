@extends('layouts.app')

@section('title', 'Admin - Order Details')

@section('content')
<div class="container" style="margin-top: 100px; padding-bottom: 50px; max-width: 800px;">
    
    <div class="main-order-card">
        <div style="display:flex; justify-content:space-between; align-items:center; border-bottom: 2px solid #333; padding-bottom: 15px; margin-bottom: 20px;">
            <h1 style="color: white; margin: 0; text-shadow: 2px 2px 0 #000;">Order #{{ $order->id }}</h1>
        </div>

        <div class="order-info-card">
            <h3>Customer Details</h3>
            <p><strong>Name:</strong> {{ $order->fullname }}</p>
            <p><strong>Account Number:</strong> {{ $order->account_number }}</p>
            <p><strong>Shipping Address:</strong> {{ $order->address }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
        </div>

        <h3 style="margin-top: 30px; color: white;">Order Items</h3>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>Rs {{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rs {{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="3">Total Amount</td>
                    <td>Rs {{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('orders.index') }}" class="btn btn-primary" style="padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">Back to History</a>
        </div>
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
    .main-order-card {
        background: #1e1e1e; /* Dark background */
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.5);
        color: white; /* White text */
    }
    .order-info-card {
        background: #2d2d2d; /* Slightly lighter dark */
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
        border-left: 5px solid #ff1e00;
        color: #ffffff;
    }
    .order-info-card h3 { color: #ffffff !important; margin-top: 0; }
    .order-info-card p, .order-info-card strong, .order-info-card span {
        margin: 10px 0;
        font-size: 16px;
        color: #ffffff !important; /* Force white text */
        opacity: 1;
    }
    
    .order-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background: #2d2d2d; /* Dark table bg */
        color: #fff;
        border: 1px solid #444;
        border-radius: 8px;
        overflow: hidden;
    }
    .order-table th, .order-table td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #444;
        color: #fff;
    }
    .order-table th {
        background-color: #343a40;
        color: #fff;
        text-transform: uppercase;
    }
    .order-table tr:hover {
        background-color: #3d3d3d;
    }
    .total-row td {
        background-color: #333;
        font-weight: bold;
        font-size: 18px;
        color: #fff;
    }
</style>
@endsection
