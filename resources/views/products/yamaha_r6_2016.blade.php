@extends('layouts.app')

@section('title', 'Yamaha R6 (2016)')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/Yamaha_r6.jpg') }}" alt="Yamaha R6 (2016)" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Yamaha R6 (2016)</h2>
      <p class="bike-description">
        The 2016 Yamaha R6 is a lightweight supersport engineered for pure precision.
        Its 599cc inline-four engine screams to 16,000 RPM, while its race-inspired chassis,
        aggressive ergonomics, and razor-sharp handling make it one of the most agile
        track and street bikes in the world. A timeless machine for true enthusiasts.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 87%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 85%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 83%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 86%"></span></div>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Yamaha R6 (2016)">
        <input type="hidden" name="bike_price" value="337320000">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
