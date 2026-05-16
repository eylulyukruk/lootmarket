<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }} | LootMarket</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f5f2;
            color: #3a3a3a;
        }

        .container {
            max-width: 1100px;
            margin: 60px auto;
            padding: 30px;
        }

        .detail-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            background: white;
            padding: 35px;
            border-radius: 28px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.08);
            border: 1px solid rgba(216, 180, 182, 0.35);
        }

        .detail-image {
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: 24px;
            background: #f1e7e8;
        }

        .badge {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 999px;
            background: #d8b4b6;
            color: white;
            font-size: 13px;
            margin-right: 8px;
            margin-bottom: 12px;
        }

        .game {
            background: #9db4c0;
        }

        h1 {
            font-size: 42px;
            margin: 15px 0;
        }

        .description {
            color: #6b6b6b;
            line-height: 1.7;
            font-size: 17px;
        }

        .price {
            font-size: 34px;
            font-weight: bold;
            color: #c89fa3;
            margin: 25px 0 10px;
        }

        .stock {
            color: #777;
            margin-bottom: 25px;
        }

        .button {
            display: inline-block;
            padding: 15px 26px;
            border-radius: 16px;
            text-decoration: none;
            background: linear-gradient(135deg, #d8b4b6, #9db4c0);
            color: white;
            font-weight: bold;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            color: #c89fa3;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 800px) {
            .detail-card {
                grid-template-columns: 1fr;
            }
        }
        .navbar {
            padding: 24px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #ffe4ec,
                    #f4dbe2,
                    #dbeaf1
                );

            backdrop-filter: blur(10px);

            box-shadow:
                0 10px 35px rgba(212,111,141,0.10);

            border-bottom:
                1px solid rgba(212,111,141,0.18);

            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 30px;
            font-weight: 800;
            color: #d46f8d;

            display:flex;
            align-items:center;

            letter-spacing:-1px;
        }

        .logo img{
            width:50px;
            height:50px;
            border-radius:14px;
            margin-right:12px;
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
    <div class="detail-card">
        <div>
            @if($product->image)
                <img src="{{ $product->image }}" class="detail-image" alt="{{ $product->name }}">
            @endif
        </div>

        <div>
            <span class="badge game">{{ $product->game }}</span>
            <span class="badge">{{ $product->category }}</span>
            <span class="badge">{{ $product->type }}</span>

            <h1>{{ $product->name }}</h1>

            <p class="description">{{ $product->description }}</p>

            <div class="price">${{ $product->price }}</div>
            <p class="stock">Available stock: {{ $product->stock }}</p>

            <form action="/cart/add/{{ $product->id }}" method="POST">
                @csrf
                <button type="submit" class="button">
                    Add to Cart
                </button>
            </form>
            <br>
            <a href="/products" class="back">← Back to products</a>
        </div>
    </div>
</div>

</body>
</html>
