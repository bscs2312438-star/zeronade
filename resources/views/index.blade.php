@extends('layouts.app')

@section('title', 'ZERONADE - Home')

@section('content')

    <!-- HERO SECTION -->
    <section id="hero" class="hero" style="background: url('{{ asset('images/Back.webp') }}') center/cover no-repeat;">
        <div class="hero-content hero-bottom-left">
            <h1>Ride Beyond Limits</h1>
            <p>Unleash the power of precision with ZERONADE Sport Bikes.</p>
            <a href="#catalog" class="hero-btn btn-effect">Explore Catalog</a>
        </div>
    </section>

    <!-- FILTER SECTION -->
    <section class="filter-section">
        <a href="{{ route('home') }}" class="filter-btn btn-effect {{ !request('category') ? 'active' : '' }}">All</a>
        @foreach(\App\Models\Category::all() as $category)
            <a href="{{ route('home', ['category' => $category->slug]) }}"
               class="filter-btn btn-effect {{ request('category') == $category->slug ? 'active' : '' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </section>

    <!-- CATALOG SECTION -->
    <section id="catalog" class="catalog">
        <div class="catalog-background"></div>
        <div class="catalog-content">
            @foreach($products as $product)
                <a href="{{ route('product.show', $product->slug) }}" class="card">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="info">
                        <h3>{{ $product->name }}</h3>
                        <p>PKR {{ number_format($product->price, 2) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- CONTACT + MAP SECTION -->
    <section class="map-contact">
        <div class="contact-map-wrapper">
            <div class="contact-container">
                <h2>Contact Us</h2>
                <p>Got questions? Feel free to ask.</p>
                <form action="#" method="POST">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <textarea name="message" rows="4" placeholder="Your Message"></textarea>
                    <button type="submit" class="btn-effect">Send Message</button>
                </form>
            </div>

            <div class="map-container">
                <h2>Our Location</h2>
                <div id="map" class="map-square"></div>
            </div>
        </div>

        <!-- Leaflet CSS & JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var map = L.map('map').setView([24.850861, 67.029028], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);
                L.marker([24.850861, 67.029028])
                    .addTo(map)
                    .bindPopup("ZERONADE Bike Location")
                    .openPopup();
            });
        </script>
    </section>

    <!-- BUTTON EFFECT CSS -->
    <style>
        /* HERO SECTION */
        .hero {
            color: white;
            height: 100vh;
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            padding: 40px;
            box-sizing: border-box;
            background-position: center;
            background-size: cover;
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 600px;
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin: 0 0 15px 0;
            text-align: left;
        }
        .hero p {
            font-size: 1.5rem;
            color: #ddd;
            margin-bottom: 25px;
            text-align: left;
        }

        /* Universal Button Effect */
        .btn-effect {
            position: relative;
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #ff1e00, #ff6a00);
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            overflow: hidden;
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

        /* FILTER SECTION */
        .filter-section {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 30px 20px;
            background: #111;
        }
        .filter-btn {
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none; /* remove old borders, btn-effect handles styling */
        }

        /* CATALOG SECTION */
        .catalog {
            position: relative;
            display: grid;
            grid-template-columns: 1fr;
            padding: 80px 20px;
            color: #fff;
            overflow: hidden;
        }
        .catalog-background {
            position: absolute;
            inset: 0;
            background: url('{{ asset("images/boom.jpg") }}') center/cover no-repeat;
            filter: blur(10px);
            z-index: 0;
        }
        .catalog-content {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }
        .catalog .card {
            background: rgba(26,26,26,0.9);
            border-radius: 10px;
            overflow: hidden;
            transition: 0.3s;
            text-decoration: none;
            color: #fff;
        }
        .catalog .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(255, 0, 0, 0.3);
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

        /* CONTACT + MAP SECTION */
        .map-contact {
            padding: 50px 20px;
            background: #0d0d0d;
        }
        .contact-map-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            align-items: flex-start;
        }
        .contact-container {
            flex: 1 1 400px;
            max-width: 500px;
            background: rgba(28,28,28,0.9);
            padding: 30px;
            border-radius: 12px;
            color: #fff;
            text-align: center;
        }
        .contact-container h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        .contact-container p {
            margin-bottom: 25px;
            color: #ccc;
        }
        .contact-container input, .contact-container textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: none;
            background: #222;
            color: #fff;
        }

        .map-container {
            flex: 1 1 450px;
            max-width: 500px;
            text-align: center;
        }
        .map-container h2 {
            margin-bottom: 15px;
        }
        .map-square {
            width: 100%;
            height: 400px;
            border-radius: 20px;
            border: 4px solid #ff1e00;
            box-shadow: 0 0 25px rgba(255,0,0,0.4);
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .contact-map-wrapper {
                flex-direction: column;
                align-items: center;
            }
            .map-square {
                height: 350px;
            }
        }
    </style>

@endsection
