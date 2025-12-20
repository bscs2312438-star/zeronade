@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<main class="cart-container">
  <h2>Your Cart</h2>

  @if(session('message'))
    <div class="msg">{{ session('message') }}</div>
  @endif

  @if(!empty($cart))
  <div class="table-responsive">
    <table class="cart-table">
      <thead>
        <tr>
          <th>Remove</th>
          <th>Bike</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $index => $item)
          <tr>
            <td>
              <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <button type="submit" name="remove" value="{{ $index }}" class="btn-effect btn-delete">✖</button>
              </form>
            </td>
            <td>{{ $item['name'] }}</td>
            <td>Rs {{ number_format($item['price']) }}</td>
            <td>
              <form action="{{ route('cart.update') }}" method="POST" class="update-form">
                @csrf
                <input type="hidden" name="index" value="{{ $index }}">
                <input type="number" name="quantity" value="{{ $item['quantity'] ?? 1 }}" min="1">
                <button type="submit" class="btn-effect btn-edit">Update</button>
              </form>
            </td>
            <td>Rs {{ number_format($item['price'] * ($item['quantity'] ?? 1)) }}</td>
          </tr>
          @php $total += $item['price'] * ($item['quantity'] ?? 1); @endphp
        @endforeach
      </tbody>
    </table>
  </div>

  <h3 class="total">Total: Rs {{ number_format($total) }}</h3>

  <form action="{{ route('cart.checkout') }}" method="POST" class="checkout-form">
    @csrf
    <h3>Checkout</h3>
    <input type="text" name="fullname" placeholder="Full Name" required>
    <input type="text" name="account" placeholder="Account Number" required>
    <input type="text" name="address" placeholder="Shipping Address" required>
    <button type="submit" class="btn-effect checkout-btn">Proceed to Checkout</button>
  </form>

  @else
    <div class="empty">Your cart is empty.</div>
  @endif
</main>

<style>
/* Body & Container */
body {
    background: url('{{ asset("images/boom.jpg") }}') center/cover no-repeat fixed;
    color: #fff;
    font-family: 'Roboto', sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
}
.cart-container {
    width: 90%;
    margin: 40px auto;
    flex: 1;
}

/* Table Styles */
.table-responsive {
    overflow-x: auto;
}
.cart-table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(30,30,30,0.9);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.5);
}
.cart-table th, .cart-table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #333;
    vertical-align: middle;
    color: #fff;
}
.cart-table th {
    background-color: #ff1e00;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 1px;
}
.cart-table tr:hover {
    background-color: #2d2d2d;
}

/* Universal Button Effect */
.btn-effect {
    position: relative;
    display: inline-block;
    padding: 8px 20px;
    background: linear-gradient(135deg, #ff1e00, #ff6a00);
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 50px;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 6px 15px rgba(255, 30, 0, 0.5);
}
.btn-effect::after {
    content: "";
    position: absolute;
    top: 0;
    left: -75%;
    width: 50%;
    height: 100%;
    background: rgba(255, 255, 255, 0.2);
    transform: skewX(-25deg);
    transition: all 0.5s ease;
}
.btn-effect:hover::after {
    left: 125%;
}
.btn-effect:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(255, 30, 0, 0.6);
}

/* Button variations */
.btn-edit { min-width: 80px; }
.btn-delete { min-width: 50px; }
.checkout-btn { width: 100%; padding: 12px; font-size: 16px; }

/* Update Form */
.update-form input[type="number"] {
    width: 60px;
    padding: 6px;
    border-radius: 6px;
    border: none;
    text-align: center;
}

/* Checkout Form */
.checkout-form {
    background: rgba(28,28,28,0.9);
    padding: 20px;
    border-radius: 10px;
    margin-top: 30px;
}
.checkout-form input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: none;
    border-radius: 6px;
    background: #222;
    color: #fff;
}

/* Messages and Empty Cart */
.msg { text-align:center; color:lime; font-weight:bold; margin-bottom:20px; }
.empty {
    text-align: center;
    padding: 60px 20px;
    color: #ff1e00;
    font-size: 2rem;
    font-weight: bold;
    text-shadow: 
        -2px -2px 0 #000, 
        2px -2px 0 #000, 
        -2px 2px 0 #000, 
        2px 2px 0 #000;
}

/* Total */
.total {
    text-align: right;
    font-size: 1.5rem;
    margin-top: 10px;
    margin-bottom: 20px;
}

/* Footer Sticky to Bottom */
footer {
    margin-top: auto;
}

/* Responsive */
@media (max-width: 600px) {
    .cart-table th, .cart-table td {
        font-size: 12px;
        padding: 10px;
    }
    .checkout-form input { padding: 10px; }
    .empty { font-size: 1.5rem; padding: 40px 10px; }
}
</style>
@endsection
