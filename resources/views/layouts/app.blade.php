<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'ZERONADE')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header>
    <div class="logo">ZERONADE</div>
    <nav>
      <ul>
        <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ url('/') }}#catalog">Bikes</a></li>
        <li><a href="{{ url('/cart') }}" class="{{ request()->is('cart') ? 'active' : '' }}">Cart</a></li>
        <li><a href="{{ url('admin/products') }}">Admin</a></li>
      </ul>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="footer">
    &copy; 2025 ZERONADE Motorworks — Powered by Balach
  </footer>
</body>
</html>
