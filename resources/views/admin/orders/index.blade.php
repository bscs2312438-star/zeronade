@extends('layouts.app')

@section('title', 'Admin - Order History')

@section('content')
<div class="container" style="margin-top: 100px; padding-bottom: 50px;">
    <h1 style="margin-bottom: 20px; color: white; text-shadow: 2px 2px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Order History</h1>

    <div class="table-responsive">
        <table class="order-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->fullname }}</td>
                        <td>Rs {{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            @if($order->status == 'pending')
                                <span class="status-badge pending">Pending</span>
                            @elseif($order->status == 'completed')
                                <span class="status-badge completed">Completed</span>
                            @elseif($order->status == 'cancelled')
                                <span class="status-badge cancelled">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="view-btn">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 20px; text-align: center;">
        <a href="{{ route('products.index') }}" class="btn btn-secondary" style="padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px;">Back to Products</a>
    </div>
</div>

<style>
body {
    background-image: url("{{ asset('images/boom.jpg') }}");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    color: #fff;
    font-family: 'Roboto', sans-serif;
}

.order-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: rgba(30,30,30,0.9); /* Semi-transparent dark */
    color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.6);
}

.order-table th, .order-table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #333;
    color: #fff;
    vertical-align: middle;
    text-shadow: 0 0 2px #000; /* subtle outline for readability */
}

.order-table th {
    background-color: #ff1e00;
    color: #ffffff;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 1px;
}

.order-table tr:hover {
    background-color: rgba(255, 30, 0, 0.1); /* subtle red hover */
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: bold;
    background: #333;
    color: #fff;
    display: inline-block;
}

.status-badge.pending { background: #ffc107; color: #000; }
.status-badge.completed { background: #28a745; color: #fff; }
.status-badge.cancelled { background: #dc3545; color: #fff; }

.view-btn {
    padding: 6px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: 0.3s;
}
.view-btn:hover {
    background-color: #0056b3;
}

/* Responsive */
@media (max-width: 768px) {
    .order-table th, .order-table td {
        padding: 10px;
        font-size: 13px;
    }
}
</style>
@endsection
