<!DOCTYPE html>
<html>
<head>
    <title>LootMarket Cart</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:#f8f5f2;
            color:#3a3a3a;
        }

        .container{
            max-width:1100px;
            margin:50px auto;
            padding:20px;
        }

        h1{
            margin-bottom:30px;
        }

        .cart-item{
            display:flex;
            align-items:center;
            gap:20px;
            background:white;
            padding:20px;
            border-radius:24px;
            margin-bottom:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .cart-image{
            width:140px;
            height:100px;
            object-fit:cover;
            border-radius:18px;
        }

        .info{
            flex:1;
        }

        .price{
            font-size:22px;
            font-weight:bold;
            color:#c89fa3;
        }

        .quantity{
            color:#777;
            margin-top:8px;
        }

        .total{
            text-align:right;
            margin-top:40px;
            font-size:30px;
            font-weight:bold;
        }

        .button{
            display:inline-block;
            margin-top:30px;
            padding:14px 24px;
            border-radius:16px;
            text-decoration:none;
            background:linear-gradient(135deg,#d8b4b6,#9db4c0);
            color:white;
            font-weight:bold;
        }
        .navbar {
            padding: 24px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #ffe4ec, #f4dbe2, #dbeaf1);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 35px rgba(212,111,141,0.10);
            border-bottom: 1px solid rgba(212,111,141,0.18);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 30px;
            font-weight: 800;
            color: #d46f8d;
            display: flex;
            align-items: center;
            letter-spacing: -1px;
        }

        .logo img {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            margin-right: 12px;
        }

        .nav-links a {
            margin-left: 24px;
            text-decoration: none;
            color: #3a3a3a;
            font-weight: 500;
        }

    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src="/images/logo.png">
        <span>LootMarket</span>
    </div>

    <div class="nav-links">
        <a href="/products">Products</a>
        <a href="/cart">Cart</a>

        @auth
            <a href="/dashboard">Dashboard</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>
</nav>
<div class="container">

    <h1>🛒 Your Cart</h1>

    @php $total = 0; @endphp

    @forelse($cart as $id => $item)

        @php
            $total += $item['price'] * $item['quantity'];
        @endphp

        <div class="cart-item">

            <img src="{{ $item['image'] }}" class="cart-image">

            <div class="info">

                <h2>{{ $item['name'] }}</h2>

                <div class="price">
                    ${{ $item['price'] }}
                </div>

                <div class="quantity">
                    Quantity: {{ $item['quantity'] }}
                </div>

                <div style="display:flex; gap:8px; margin-top:12px;">
                    <form action="/cart/decrease/{{ $id }}" method="POST">
                        @csrf
                        <button type="submit" style="padding:8px 14px; border:none; border-radius:12px; background:#9db4c0; color:white; font-weight:bold; cursor:pointer;">
                            -
                        </button>
                    </form>

                    <form action="/cart/increase/{{ $id }}" method="POST">
                        @csrf
                        <button type="submit" style="padding:8px 14px; border:none; border-radius:12px; background:#d8b4b6; color:white; font-weight:bold; cursor:pointer;">
                            +
                        </button>
                    </form>
                </div>

                <form action="/cart/remove/{{ $id }}" method="POST" style="margin-top:12px;">
                    @csrf
                    <button type="submit" style="
        border:none;
        padding:10px 16px;
        border-radius:14px;
        background:#d8b4b6;
        color:white;
        cursor:pointer;
        font-weight:bold;
    ">
                        Remove
                    </button>
                </form>


            </div>

        </div>

    @empty

        <p>Your cart is empty.</p>

    @endforelse

    <div class="total">
        Total: ${{ $total }}
    </div>

    <a href="/products" class="button">
        Continue Shopping
    </a>

</div>

</body>
</html>
