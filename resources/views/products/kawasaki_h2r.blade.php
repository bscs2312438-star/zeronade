@extends('layouts.app')

@section('title', 'Kawasaki Ninja H2R')

@section('content')
<main class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/Kawasaki_H2R.jpg') }}" alt="Kawasaki Ninja H2R" class="bike-image">
    <div class="bike-info">
      <h2 class="bike-title">Kawasaki Ninja H2R</h2>
      <p class="bike-description">
        The ultimate supercharged track monster producing over 300 horsepower and exceeding 240 mph, 
        designed purely for closed-course performance.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 98%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 95%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 80%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 90%"></span></div>
      </div>

      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Kawasaki Ninja H2R">
        <input type="hidden" name="bike_price" value="15460500.00">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</main>
@endsection
