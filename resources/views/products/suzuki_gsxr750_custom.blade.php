@extends('layouts.app')

@section('title', 'Suzuki GSX-R750 Custom Edition')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/Suzuki_750_custom.jpg') }}" alt="Suzuki GSX-R750 Custom Edition" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Suzuki GSX-R750 — Custom Edition</h2>
      <p class="bike-description">
        The GSX-R750 Custom combines Suzuki’s legendary middleweight performance with 
        cutting-edge upgrades: carbon composite fairings, tuned ECU mapping, and a 
        race-grade clutch system. Lightweight, aggressive, and precision-built for track and street.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 92%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 91%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 87%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 89%"></span></div>
      </div>

      <div class="performance-comparison">
        <h3>Performance Comparison (vs Stock)</h3>
        <ul>
          <li>+7% Top Speed</li>
          <li>+9% Acceleration</li>
          <li>+6% Traction</li>
        </ul>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Suzuki GSX-R750 Custom Edition">
        <input type="hidden" name="bike_price" value="4497600.00">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
