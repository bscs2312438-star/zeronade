@extends('layouts.app')

@section('title', 'Kawasaki Ninja HEV')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/kawasaki_hev.jpg') }}" alt="Kawasaki Ninja HEV" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Kawasaki Ninja HEV</h2>
      <p class="bike-description">
        The Kawasaki Ninja HEV marks a bold leap into the future — the world’s first hybrid-electric
        supersport motorcycle. Combining the high-revving thrill of a traditional engine with
        instantaneous electric torque, it delivers unmatched performance and eco-conscious innovation
        for the next generation of riders.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 90%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 88%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 82%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 85%"></span></div>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Kawasaki Ninja HEV">
        <input type="hidden" name="bike_price" value="12649500.00">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
