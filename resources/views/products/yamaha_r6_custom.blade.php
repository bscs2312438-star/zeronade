@extends('layouts.app')

@section('title', 'Yamaha R6 Custom Edition')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/Yamaha_r6_custom.jpg') }}" alt="Yamaha R6 Custom Edition" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Yamaha R6 — Custom Edition</h2>
      <p class="bike-description">
        The R6 Custom keeps its screaming 599cc DNA but adds titanium exhaust,
        lightweight race fairings, and upgraded ECU tuning. A pure track weapon
        redesigned for precision and control, with sharper lines and aerodynamic enhancements.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 91%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 92%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 89%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 91%"></span></div>
      </div>

      <h3>Performance Comparison (vs Stock)</h3>
      <ul>
        <li>+8% Acceleration</li>
        <li>+6% Traction</li>
        <li>-4 kg Weight Reduction</li>
      </ul>

      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Yamaha R6 Custom Edition">
        <input type="hidden" name="bike_price" value="3935400.00">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
