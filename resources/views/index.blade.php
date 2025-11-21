@extends('layouts.app')

@section('title', 'ZERONADE - Home')

@section('content')
<!-- HERO SECTION -->
<section id="hero" class="hero" style="background: url('{{ asset('images/Back.webp') }}') center/cover no-repeat;">
    <div class="hero-content">
        <h1>Ride Beyond Limits</h1>
        <p>Unleash the power of precision with ZERONADE Sport Bikes.</p>
        <a href="#catalog">Explore Catalog</a>
    </div>
</section>

<!-- CATALOG SECTION -->
<section id="catalog" class="catalog">
    @foreach($products as $product)
        <a href="{{ route('product.show', $product->slug) }}" class="card">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
            <div class="info">
                <h3>{{ $product->name }}</h3>
                <p>PKR {{ number_format($product->price, 2) }}</p>
            </div>
        </a>
    @endforeach
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

<!-- KEEP ALL CSS YOU HAD BEFORE -->
<style>
/* HERO SECTION */
.hero {
    color: white;
    text-align: center;
    height: 100vh; 
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
    max-width: 300px; /* limit box width */
    margin: 0 auto;
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
@endsection
