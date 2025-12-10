<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ZERONADE')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Optional small styles for admin login button */
        .nav-btn {
            background: black;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .nav-btn:hover {
            background: maroon;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">ZERONADE</div>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('/') }}#catalog">Bikes</a></li>
            <li><a href="{{ url('/cart') }}" class="{{ request()->is('cart') ? 'active' : '' }}">Cart</a></li>

            <!-- Admin Login / Panel Link -->
            @if(!session('admin'))
                <li><a href="{{ route('login') }}" class="nav-btn">Admin Login</a></li>
            @else
                <li><a href="{{ url('admin/products') }}" class="nav-btn">Admin Panel</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-btn">Logout</button>
                    </form>
                </li>
            @endif
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
