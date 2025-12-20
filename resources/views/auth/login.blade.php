<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Body & Background */
        body {
            background: url('{{ asset("images/boom.jpg") }}') center/cover no-repeat fixed;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        /* Login Box */
        .box {
            background: rgba(17,17,17,0.9);
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.8);
        }

        h2 {
            text-align: center;
            color: #ff1e00;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        /* Inputs */
        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 6px;
            border: none;
            box-sizing: border-box;
            font-size: 16px;
            background: #222;
            color: #fff;
        }
        input::placeholder {
            color: #ccc;
        }

        /* Universal Button Effect */
        .btn-effect {
            position: relative;
            display: inline-block;
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            background: linear-gradient(135deg, #ff1e00, #ff6a00);
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            overflow: hidden;
            cursor: pointer;
            font-size: 16px;
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

        /* Error Messages */
        .error {
            background: rgba(255,30,0,0.2);
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            color: #ff6a00;
            font-weight: bold;
        }

        /* Signup Link */
        .link a {
            color: #ff1e00;
            text-decoration: none;
            transition: color 0.3s;
        }
        .link a:hover {
            color: #ff6a00;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Login</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn-effect">Login</button>
    </form>

    <div class="link" style="text-align:center; margin-top:20px;">
        <a href="{{ route('signup') }}">Don't have an account? Sign Up</a>
    </div>
</div>

</body>
</html>
