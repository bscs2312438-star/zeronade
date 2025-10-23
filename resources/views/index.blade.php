@extends('layouts.app')

@section('title', 'ZERONADE - Home')

@section('content')
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ZERONADE</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* HERO SECTION */
    .hero {
      background: url('{{ asset('images/Back.webp') }}') center/cover no-repeat;">
      color: white;
      text-align: center;
      height: 100vh; /* full screen height */
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
      font-size: 4rem;
      margin-bottom: 20px;
      letter-spacing: 3px;
      font-weight: 800;
      text-transform: uppercase;
    }
    .hero p {
      font-size: 1.5rem;
      margin-bottom: 30px;
      color: #ddd;
    }
    .hero a {
      background: #ff1e00;
      color: white;
      padding: 14px 40px;
      border-radius: 40px;
      text-decoration: none;
      font-weight: bold;
      font-size: 1.1rem;
      transition: 0.3s;
    }
    .hero a:hover {
      background: #e60000;
      transform: scale(1.05);
    }

    /* CATALOG GRID */
    .catalog {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
      padding: 80px 20px;
      background: #111;
      color: #fff;
    }
    .catalog .card {
      background: #1a1a1a;
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      text-decoration: none;
      color: #fff;
    }
    .catalog .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 25px rgba(255, 0, 0, 0.2);
    }
    .catalog img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .catalog .info {
      padding: 15px;
      text-align: center;
    }

    /* CONTACT SECTION */
    .contact {
      padding: 80px 20px;
      text-align: center;
      background: #0d0d0d;
      color: white;
    }
    .contact h2 {
      font-size: 2.2rem;
      margin-bottom: 10px;
    }
    .contact p {
      margin-bottom: 30px;
      color: #aaa;
    }
    .contact form {
      max-width: 400px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .contact input, .contact textarea {
      padding: 12px;
      border: none;
      border-radius: 6px;
      background: #222;
      color: white;
    }
    .contact button {
      background: #ff1e00;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }
    .contact button:hover {
      background: #e60000;
    }

    footer {
      text-align: center;
      padding: 20px;
      background: #111;
      color: #777;
    }

    /* Responsive Tweaks */
    @media (max-width: 768px) {
      .hero h1 { font-size: 2.5rem; }
      .hero p { font-size: 1.1rem; }
    }
  </style>
</head>
<body>
 <!-- HERO SECTION -->
  <section id="hero" class="hero">
    <div class="hero-content">
      <h1>Ride Beyond Limits</h1>
      <p>Unleash the power of precision with ZERONADE Sport Bikes.</p>
      <a href="#catalog">Explore Catalog</a>
    </div>
  </section>

  <!-- CATALOG SECTION -->
  <section id="catalog" class="catalog">
    <a href="{{ route('product.show', 'kawasaki_h2r') }}" class="card">
      <img src="{{ asset('images/Kawasaki_H2R.jpg') }}" alt="Kawasaki Ninja H2R">
      <div class="info"><h3>Kawasaki Ninja H2R</h3><p>PKR 15460500.00</p></div>
    </a>

    <a href="{{ route('product.show', 'kawasaki_hev') }}" class="card">
      <img src="{{ asset('images/Kawasaki_HEV.jpg') }}" alt="Kawasaki HEV">
      <div class="info"><h3>Kawasaki Ninja HEV</h3><p>PKR 12649500.00</p></div>
    </a>

    <a href="{{ route('product.show', 'kawasaki_zx4rr') }}" class="card">
      <img src="{{ asset('images/Kawasaki_ZX4RR.jpg') }}" alt="Kawasaki ZX-4RR">
      <div class="info"><h3>Kawasaki ZX-4RR</h3><p>PKR 505980000</p></div>
    </a>

    <a href="{{ route('product.show', 'honda_600cbr') }}" class="card">
      <img src="{{ asset('images/Honda_600.jpg') }}" alt="Honda CBR600RR">
      <div class="info"><h3>Honda CBR600RR</h3><p>PKR 365430000</p></div>
    </a>

    <a href="{{ route('product.show', 'honda_1000cbr') }}" class="card">
      <img src="{{ asset('images/Honda_CBR.avif') }}" alt="Honda CBR1000RR">
      <div class="info"><h3>Honda CBR1000RR</h3><p>PKR 5200350</p></div>
    </a>

    <a href="{{ route('product.show', 'suzuki_750_gixxer') }}" class="card">
      <img src="{{ asset('images/Suzuki_750.webp') }}" alt="Suzuki GSX-R750">
      <div class="info"><h3>Suzuki GSX-R750</h3><p>PKR 354186000</p></div>
    </a>

    <a href="{{ route('product.show', 'yamaha_r1') }}" class="card">
      <img src="{{ asset('images/Yamaha_r1.webp') }}" alt="Yamaha R1">
      <div class="info"><h3>Yamaha R1</h3><p>PKR 5059800.00</p></div>
    </a>

    <a href="{{ route('product.show', 'yamaha_r6_2016') }}" class="card">
      <img src="{{ asset('images/Yamaha_r6.jpg') }}" alt="Yamaha R6 (2016)">
      <div class="info"><h3>Yamaha R6 (2016)</h3><p>PKR 337320000</p></div>
    </a>
  </section>

  <!-- CONTACT SECTION -->
  <section class="contact">
    <h2>Contact Us</h2>
    <p>Got questions? Feel free to ask.</p>
    <form action="#" method="POST">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" rows="4" placeholder="Your Message"></textarea>
      <button type="submit">Send Message</button>
    </form>
  </section>
</body>
</html
@endsection
