@extends('layouts.app')

@section('title', 'Suzuki GSX-R750')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/Suzuki_750.webp') }}" alt="Suzuki GSX-R750" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Suzuki GSX-R750</h2>
      <p class="bike-description">
        The Suzuki GSX-R750 defines the perfect balance between agility and raw power.
        Its race-inspired 750cc inline-four engine delivers exhilarating performance,
        while maintaining the lightweight handling that made the GSX-R a legend.
        A pure blend of precision, heritage, and adrenaline.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 89%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 87%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 83%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 84%"></span></div>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Suzuki GSX-R750">
        <input type="hidden" name="bike_price" value="354186000">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
