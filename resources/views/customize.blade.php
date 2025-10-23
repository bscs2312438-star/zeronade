@extends('layouts.app')

@section('title', 'Customize Your Ride')

@section('content')
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Customize Your Ride</title>
  <style>
    /* HERO SECTION */
    .hero {
      background: url('{{ asset('images/custom.jpg') }}') center/cover no-repeat;
      color: white;
      text-align: center;
      height: 70vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .hero::after {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.6);
    }
    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 800px;
      padding: 0 20px;
      animation: fadeIn 1.5s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .hero h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      letter-spacing: 3px;
      font-weight: 800;
      text-transform: uppercase;
    }
    .hero p {
      font-size: 1.3rem;
      color: #ddd;
    }

    /* BIKE GRID SECTION */
    .bike-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
      padding: 80px 20px;
      background: #111;
      color: #fff;
    }
    .bike-card {
      background: #1a1a1a;
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      text-align: center;
    }
    .bike-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 25px rgba(255, 0, 0, 0.3);
    }
    .bike-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .bike-info {
      padding: 20px;
    }
    .bike-info h3 {
      margin-bottom: 10px;
      font-size: 1.3rem;
      color: #fff;
    }
    .bike-info p {
      color: #aaa;
      font-size: 0.95rem;
      margin-bottom: 15px;
    }
    .view-btn {
      background: #ff1e00;
      color: #fff;
      border: none;
      padding: 12px 25px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }
    .view-btn:hover {
      background: #e60000;
      transform: scale(1.05);
    }

    footer {
      text-align: center;
      padding: 20px;
      background: #111;
      color: #777;
    }

    @media (max-width: 768px) {
      .hero h1 { font-size: 2rem; }
      .hero p { font-size: 1rem; }
    }
  </style>
</head>
<body>

  <!-- HERO SECTION -->
  <section class="hero">
    <div class="hero-content">
      <h1>Customize Your Ride</h1>
      <p>Transform your favorite machines into unique performance beasts.</p>
    </div>
  </section>

  <!-- CUSTOM BIKE GRID -->
  <section class="bike-grid">
    <div class="bike-card">
      <img src="{{ asset('images/Yamaha_r1_custom.jpg') }}" alt="Yamaha R1 Custom">
      <div class="bike-info">
        <h3>Yamaha R1 Custom</h3>
        <p>Carbon frame, titanium exhaust, and raw track-ready power.</p>
        <a href="{{ route('product.show', 'yamaha_r1_custom') }}">
          <button class="view-btn">View Custom Details</button>
        </a>
      </div>
    </div>

    <div class="bike-card">
      <img src="{{ asset('images/Yamaha_r6_custom.jpg') }}" alt="Yamaha R6 Custom">
      <div class="bike-info">
        <h3>Yamaha R6 Custom</h3>
        <p>Sharper aerodynamics and ECU tuning for ultimate control.</p>
        <a href="{{ route('product.show', 'yamaha_r6_custom') }}">
          <button class="view-btn">View Custom Details</button>
        </a>
      </div>
    </div>

    <div class="bike-card">
      <img src="{{ asset('images/Suzuki_750_custom.jpg') }}" alt="Suzuki GSX-R750 Custom">
      <div class="bike-info">
        <h3>Suzuki GSX-R750 Custom</h3>
        <p>Carbon fairings and race-grade clutch for elite handling.</p>
        <a href="{{ route('product.show', 'suzuki_gsxr750_custom') }}">
          <button class="view-btn">View Custom Details</button>
        </a>
      </div>
    </div>
  </section>

</body>
</html>
@endsection
