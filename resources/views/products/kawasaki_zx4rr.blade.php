@extends('layouts.app')

@section('title', 'Kawasaki ZX-4RR')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/kawasaki_zx4rr.jpg') }}" alt="Kawasaki ZX-4RR" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Kawasaki ZX-4RR</h2>
      <p class="bike-description">
        The Kawasaki ZX-4RR brings superbike DNA to the lightweight class. Powered by a screaming
        400cc inline-four, it delivers track-level precision, cornering agility, and signature Ninja
        styling. Ideal for riders seeking the perfect balance of performance, control, and excitement
        in a compact package.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 85%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 84%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 80%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 83%"></span></div>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Kawasaki ZX-4RR">
        <input type="hidden" name="bike_price" value="505980000">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
