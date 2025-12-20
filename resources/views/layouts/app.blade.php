<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ZERONADE')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* ===== NAV BUTTONS (Admin / Logout) ===== */
        .nav-btn {
            background: #ff1e00; /* solid color */
            color: #fff;
            padding: 6px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
            box-shadow: none; /* remove glow */
        }

        .nav-btn:hover {
            background: #ff6a00; /* solid hover color */
            color: #000;
            transform: translateY(-1px);
            box-shadow: none; /* remove glow */
        }

        /* ===== NAV LINKS ===== */
        nav ul {
            display: flex;          /* align all links/buttons in a row */
            list-style: none;
            gap: 10px;              /* spacing between items */
            padding: 0;
            margin: 0;
            align-items: center;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 6px;
            transition: background 0.3s ease, color 0.3s ease;
            box-shadow: none; /* remove any glow */
        }

        nav a:hover,
        nav a.active {
            background: #ff1e00; /* solid red */
            color: #ffffff;
            box-shadow: none; /* remove glow */
        }

        /* ===== CART BUBBLE ===== */
        .cart-bubble {
            background: #ff1e00; /* solid red */
            color: white;
            border-radius: 50%;
            padding: 2px 7px;
            font-size: 12px;
            font-weight: bold;
            position: absolute;
            top: -5px;
            right: -10px;
        }

        /* ===== HEADER COLOR ===== */
        header {
            background: #000;
        }

        /* ===== FOOTER COLOR ===== */
        .footer {
            background: #000;
            color: #ff1e00;
        }
    </style>
</head>
<body class="dark-mode">
<header>
    <div class="logo">ZERONADE</div>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('/') }}#catalog">Bikes</a></li>
            @if(!Auth::check() || Auth::user()->role !== 'admin')
                <li>
                    <a href="{{ url('/cart') }}" class="{{ request()->is('cart') ? 'active' : '' }}" style="position: relative;">
                        Cart
                        @php $cartCount = count(session('cart', [])); @endphp
                        @if($cartCount > 0)
                            <span class="cart-bubble">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>
            @endif

            <!-- Admin Login / Panel Link -->
            <!-- Authenticated User Links -->
            @auth
                @if(Auth::user()->role === 'admin' && !request()->is('admin*'))
                    <li><a href="{{ url('admin/products') }}" class="nav-btn">Admin Panel</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-btn">Logout</button>
                    </form>
                </li>
            @endauth
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
