@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<main class="cart-container">
  <h2><br><h2>

  @if(session('message'))
    <div class="msg">{{ session('message') }}</div>
  @endif

  @if(!empty($cart))
  <table>
    <tr>
      <th>Remove</th>
      <th>Bike</th>
      <th>Price</th>
    </tr>
    @php $total = 0; @endphp
    @foreach($cart as $index => $item)
      <tr>
        <td>
          <form action="{{ route('cart.remove') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" name="remove" value="{{ $index }}" class="remove-btn">✖</button>
          </form>
        </td>
        <td>{{ $item['name'] }}</td>
        <td>Rs {{ number_format($item['price']) }}</td>
      </tr>
      @php $total += $item['price']; @endphp
    @endforeach
  </table>

  <h3>Total: Rs {{ number_format($total) }}</h3>

  <form action="{{ route('cart.checkout') }}" method="POST" class="checkout-form">
    @csrf
    <h3>Checkout</h3>
    <input type="text" name="fullname" placeholder="Full Name" required>
    <input type="text" name="account" placeholder="Account Number" required>
    <input type="text" name="address" placeholder="Shipping Address" required>
    <button type="submit" class="checkout-btn">Proceed to Checkout</button>
  </form>

  @else
    <div class="empty">Your cart is empty.</div>
  @endif
</main>

<style>
  body { background:#111; color:#fff; font-family:'Roboto',sans-serif; }
  .cart-container { width:90%; margin:40px auto; }
  table { width:100%; border-collapse:collapse; margin-bottom:20px; }
  th, td { padding:12px; border-bottom:1px solid #333; text-align:center; }
  th { background:#8b0000; color:#fff; }
  tr:hover { background:#1f1f1f; }
  .checkout-form { background:#1c1c1c; padding:20px; border-radius:10px; margin-top:30px; }
  .checkout-form input { width:100%; padding:10px; margin:10px 0; border:none; border-radius:6px; }
  .checkout-btn { background:#8b0000; color:#fff; padding:12px 20px; border:none; border-radius:6px; cursor:pointer; width:100%; }
  .checkout-btn:hover { background:#a00000; }
  .remove-btn { background:red; color:#fff; border:none; border-radius:6px; padding:5px 10px; cursor:pointer; }
  .empty { text-align:center; padding:40px; color:#999; }
  .msg { text-align:center; color:lime; font-weight:bold; margin-bottom:20px; }
</style>
@endsection
