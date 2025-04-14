<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
            color: #374151;
        }
        .content {
            text-align: center;
        }
        .links > a {
            color: #636b6f;
            padding: 0 15px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            text-transform: uppercase;
        }
        .login-link {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        p {
            font-size: 36px;
        }
    </style>
</head>
<body>
    <div class="content">
        @if (Route::has('login'))
            <div class="login-link">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log In</a>
                @endauth
            </div>
        @endif
        <div class="logo d-flex align-items-center w-auto">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
        </div>
        <h1>Welcome to</h1>
        <p>Diezza Rezqi Inventory Management System</p>
    </div>
</body>
</html>