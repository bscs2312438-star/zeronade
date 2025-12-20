<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
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

        /* Sign Up Box */
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

        /* Inputs & Select */
        input, select {
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

        /* Links */
        .link {
            text-align: center;
            margin-top: 20px;
        }
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
    <h2>Sign Up</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('signup.submit') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        
        <select name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit" class="btn-effect">Sign Up</button>
    </form>

    <div class="link">
        <a href="{{ route('login') }}">Already have an account? Login</a>
    </div>
</div>

</body>
</html>
