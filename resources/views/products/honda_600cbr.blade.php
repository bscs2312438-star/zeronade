@extends('layouts.app')

@section('title', 'Honda CBR600RR')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/Honda_600.jpg') }}" alt="Honda CBR600RR" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Honda CBR600RR</h2>
      <p class="bike-description">
        The Honda CBR600RR combines razor-sharp handling, smooth power delivery,
        and race-inspired technology for pure sport riding excitement.
        Lightweight and agile, it’s designed for riders who crave both track precision
        and everyday usability.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 88%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 86%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 82%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 84%"></span></div>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Honda CBR600RR">
        <input type="hidden" name="bike_price" value="365430000">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
