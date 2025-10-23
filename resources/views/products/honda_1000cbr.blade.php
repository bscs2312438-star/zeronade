@extends('layouts.app')

@section('title', 'Honda CBR1000RR Fireblade')

@section('content')
<section class="bike-detail">
  <div class="bike-card">
    <img src="{{ asset('images/Honda_CBR.avif') }}" alt="Honda CBR1000RR Fireblade" class="bike-image">

    <div class="bike-info">
      <h2 class="bike-title">Honda CBR1000RR Fireblade</h2>
      <p class="bike-description">
        The Honda CBR1000RR Fireblade is a superbike icon — crafted with precision engineering,
        lightweight chassis, and aerodynamics inspired by MotoGP.
        It delivers incredible speed, razor-sharp handling, and seamless control for riders
        who demand performance at every turn.
      </p>

      <div class="bike-stats">
        <p>Top Speed</p><div class="stat-bar"><span style="width: 93%"></span></div>
        <p>Acceleration</p><div class="stat-bar"><span style="width: 90%"></span></div>
        <p>Braking</p><div class="stat-bar"><span style="width: 85%"></span></div>
        <p>Traction</p><div class="stat-bar"><span style="width: 86%"></span></div>
      </div>

      <!-- Add to Cart Form -->
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="bike_name" value="Honda CBR1000RR Fireblade">
        <input type="hidden" name="bike_price" value="5200350">
        <button type="submit" class="add-btn">Add to Cart</button>
      </form>
    </div>
  </div>
</section>
@endsection
