@extends('layouts.app')

@section('title', $product->name)

@section('content')
<section class="bike-detail" style="padding-top: 100px;"> <!-- add padding for navbar -->
    <div class="bike-card" style="display:flex; flex-wrap:wrap; gap:30px; background:#111; padding:20px; border-radius:10px; max-width:1000px; margin:0 auto; color:#fff;">
        
        <!-- Bike Image -->
        <div class="bike-image" style="flex:1; min-width:300px;">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:100%; border-radius:10px; object-fit:cover;">
        </div>

        <!-- Bike Info -->
        <div class="bike-info" style="flex:1; min-width:300px;">
            <h2 style="font-size:2rem; margin-bottom:15px;">{{ $product->name }}</h2>
            <p style="margin-bottom:15px;">{{ $product->description }}</p>
            <p style="font-weight:bold; font-size:1.2rem; margin-bottom:20px;">Price: PKR {{ number_format($product->price, 2) }}</p>

            <!-- Optional Stats (example, can be dynamic later) -->
            <div class="bike-stats" style="margin-bottom:20px;">
                <p>Top Speed</p>
                <div class="stat-bar" style="background:#333; height:10px; border-radius:5px; margin-bottom:10px;">
                    <span style="display:block; width:85%; background:#ff1e00; height:100%; border-radius:5px;"></span>
                </div>

                <p>Acceleration</p>
                <div class="stat-bar" style="background:#333; height:10px; border-radius:5px; margin-bottom:10px;">
                    <span style="display:block; width:84%; background:#ff1e00; height:100%; border-radius:5px;"></span>
                </div>

                <p>Braking</p>
                <div class="stat-bar" style="background:#333; height:10px; border-radius:5px; margin-bottom:10px;">
                    <span style="display:block; width:80%; background:#ff1e00; height:100%; border-radius:5px;"></span>
                </div>

                <p>Traction</p>
                <div class="stat-bar" style="background:#333; height:10px; border-radius:5px; margin-bottom:10px;">
                    <span style="display:block; width:83%; background:#ff1e00; height:100%; border-radius:5px;"></span>
                </div>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="bike_name" value="{{ $product->name }}">
                <input type="hidden" name="bike_price" value="{{ $product->price }}">
                <button type="submit" style="background:#ff1e00; color:white; padding:12px 25px; border:none; border-radius:6px; font-weight:bold; cursor:pointer;">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
