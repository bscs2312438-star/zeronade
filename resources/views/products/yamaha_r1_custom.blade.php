@extends('layouts.app')

@section('title', 'Yamaha R1 Custom Edition')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/Yamaha_r1_custom.jpg') }}" alt="Yamaha R1 Custom Edition" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Yamaha R1 — Custom Edition</h2>
      <p class="bike-description">
        The Yamaha R1 Custom Edition redefines what a liter bike can be — with a lighter carbon frame, 
        high-flow titanium exhaust, and upgraded ECU tuning, it delivers mind-bending power and 
        track-ready precision. Built for riders who crave control, balance, and pure speed.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 95%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 94%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 89%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 90%"></span></div>
      </div>

      <div class="performance-comparison">
        <h3>Performance Comparison (vs Stock R1)</h3>
        <ul>
          <li>+10% Top Speed</li>
          <li>+12% Acceleration</li>
          <li>+8% Braking Stability</li>
        </ul>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Yamaha R1 Custom Edition">
        <input type="hidden" name="bike_price" value="5340900.00">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
