@extends('layouts.app')

@section('title', 'Yamaha R1')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/yamaha_r1.webp') }}" alt="Yamaha R1" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Yamaha R1</h2>
      <p class="bike-description">
        The Yamaha R1 is the ultimate expression of racing performance and MotoGP technology.
        Its crossplane inline-four engine delivers instant throttle response and unmatched 
        high-rpm power, while the advanced electronics suite ensures precise control on both 
        street and track. A superbike crafted for riders who demand excellence.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 94%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 91%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 85%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 88%"></span></div>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Yamaha R1">
        <input type="hidden" name="bike_price" value="5059800.00">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
