@extends('layouts.app')

@section('title', $product->name)

@section('content')
<section class="bike-detail" style="padding-top: 100px; background: url('{{ asset('images/boom.jpg') }}') center/cover no-repeat fixed; min-height: 100vh; color: #fff;">
    <div class="bike-card" style="display:flex; flex-wrap:wrap; gap:30px; background: rgba(17,17,17,0.9); padding:20px; border-radius:10px; max-width:1000px; margin:0 auto;">
        
        <!-- Bike Image -->
        <div class="bike-image" style="flex:1; min-width:300px;">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:100%; border-radius:10px; object-fit:cover;">
        </div>

        <!-- Bike Info -->
        <div class="bike-info" style="flex:1; min-width:300px;">
            <h2 style="font-size:2rem; margin-bottom:15px;">{{ $product->name }}</h2>
            <p style="margin-bottom:15px;">{{ $product->description }}</p>
            <p style="font-weight:bold; font-size:1.2rem; margin-bottom:20px;">Price: PKR {{ number_format($product->price, 2) }}</p>

            <!-- Optional Stats -->
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
                <button type="submit" class="btn-effect">Add to Cart</button>
            </form>
        </div>
    </div>
</section>

<style>
/* Universal Button Effect (same as home & cart pages) */
.btn-effect {
    position: relative;
    display: inline-block;
    padding: 12px 25px;
    background: linear-gradient(135deg, #ff1e00, #ff6a00);
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 50px;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 6px 15px rgba(255, 30, 0, 0.5);
}
.btn-effect::after {
    content: "";
    position: absolute;
    top: 0;
    left: -75%;
    width: 50%;
    height: 100%;
    background: rgba(255, 255, 255, 0.2);
    transform: skewX(-25deg);
    transition: all 0.5s ease;
}
.btn-effect:hover::after {
    left: 125%;
}
.btn-effect:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(255, 30, 0, 0.6);
}

/* Optional: stat bars hover effect */
.stat-bar span {
    transition: width 0.5s ease;
}
</style>
@endsection
