<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body{
            background: #1a1a1a;
            font-family: Arial;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            margin:0;
        }
        .box{
            background:#2d0000;
            padding:30px;
            border-radius:8px;
            width:350px;
            box-shadow: 0px 0px 10px black;
            color:white;
        }
        h2{
            text-align:center;
            color: maroon;
            margin-bottom: 20px;
        }
        input, button{
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius:5px;
            border:none;
            box-sizing: border-box; /* ensures width includes padding */
            font-size: 16px;
        }
        input{
            background: #fff;
            color: #000;
        }
        button{
            background:black;
            color:white;
            cursor:pointer;
        }
        button:hover{
            background: maroon;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Admin Login</h2>

    @if(session('error'))
        <p style="color:yellow;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <input type="text" name="temp_id" placeholder="Enter Admin ID" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>

