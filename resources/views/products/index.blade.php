<!DOCTYPE html>
<html>
<head>
    <title>LootMarket</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(216,180,182,0.28), transparent 28%),
                radial-gradient(circle at top right, rgba(157,180,192,0.25), transparent 30%),
                linear-gradient(135deg,#fffafc,#f8f5f2,#f3f8fa);

            min-height:100vh;
            color: #3a3a3a;
        }

        .navbar {
            padding: 24px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #ffe4ec, #f4dbe2, #dbeaf1);
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
            box-shadow: 0 6px 18px rgba(216,180,182,0.35);
        }

        .nav-links a {
            margin-left: 24px;
            text-decoration: none;
            color: #3a3a3a;
            font-weight: 500;
        }

        .hero {
            padding: 80px 60px 50px;
            text-align: center;
        }

        .hero h1 {

            font-size: 76px;
            line-height: 1.18;
            margin-bottom: 24px;
            font-weight: 800;
            padding-bottom: 12px;
            overflow: visible;

            background: linear-gradient(
                135deg,
                #d46f8d,
                #8faec0
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            text-shadow:
                0 10px 30px rgba(212,111,141,0.15);

        }

        .hero p {
            font-size: 18px;
            color: #6b6b6b;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 320px));
            gap: 36px;
            padding: 40px 60px 80px;
            justify-content: center;
        }

        .card {
            background: rgba(255,255,255,0.88);
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 18px 40px rgba(157,180,192,0.13);
            border: 1px solid rgba(212,111,141,0.22);
            transition: 0.3s ease;
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            width: 100%;
            box-sizing: border-box;

        }
        .product-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 18px;
            margin-bottom: 18px;
            background: #f1e7e8;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 55px rgba(212,111,141,0.18);
            border-color: rgba(212,111,141,0.38);
        }

        .badge {

            display:inline-flex;
            flex-wrap:wrap;

            gap:8px;

            margin-bottom:16px;

            align-items:center;

            justify-content:center;

            padding:8px 16px;

            border-radius:999px;

            background:#d8b4b6;

            color:white;

            font-size:15px;

            white-space:nowrap;

        }
        .card span {
            width: fit-content;
        }

        .game {
            background: #9db4c0;
        }

        .card h2 {
            font-size: 24px;
            margin: 10px 0;
        }

        .description {
            color: #6b6b6b;
            min-height: 55px;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #c89fa3;
            margin-top: 20px;
        }

        .stock {
            font-size: 14px;
            color: #777;
        }

        .button {
            margin-top: auto;
            display: inline-block;
            width: fit-content;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            padding: 13px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #d8b4b6, #9db4c0);
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .button:hover {
            opacity: 0.9;
            box-shadow: 0 10px 25px rgba(212,111,141,0.25);
        }
        .view-button {

            margin-top: auto;

            align-self: flex-start;

            display: inline-block;

            padding: 13px 22px;

            border-radius: 16px;

            background:
                linear-gradient(
                    135deg,
                    #d8b4b6,
                    #9db4c0
                );

            color: white;

            font-size: 15px;

            font-weight: bold;

            text-decoration: none;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;

        }
        .view-button:hover {

            transform: scale(1.08);

            box-shadow:
                0 10px 25px rgba(212,111,141,0.25);

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

<section class="hero">
    <h1>Soft Gaming Marketplace</h1>
    <p>Discover premium game skins, items, and digital collectibles in a calm and elegant marketplace.</p>
</section>
<form action="/products" method="GET" style="text-align:center; margin: 10px 0 25px;">

    <input
        type="text"
        name="search"
        placeholder="Search products..."
        value="{{ request('search') }}"
        style="
            width: 320px;
            padding: 14px 18px;
            border-radius: 18px;
            border: 1px solid rgba(216, 180, 182, 0.6);
            outline: none;
            font-size: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        "
    >

    <button type="submit" class="button" style="width:auto; margin-left:8px;">
        Search
    </button>

</form>
<div style="text-align:center; margin: 10px 0 20px;">
    <a href="/products" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">All</a>

    <a href="/products?category=Skins" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">Skins</a>

    <a href="/products?category=Knives" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">Knives</a>

    <a href="/products?category=Gear" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">Gear</a>

    <a href="/products?category=Setup" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">Setup</a>
</div>

<section class="products">
    @foreach($products as $product)
        <div class="card">
            @if($product->image)
                <img src="{{ $product->image }}" class="product-image" alt="{{ $product->name }}">
            @endif
                <div class="badges">

                    <span class="badge game">{{ $product->game }}</span>

                    <span class="badge">{{ $product->category }}</span>

                    <span class="badge">{{ $product->type }}</span>

                </div>

            <h2>{{ $product->name }}</h2>

            <p class="description">{{ $product->description }}</p>

            <div class="price">${{ $product->price }}</div>
            <p class="stock">Stock: {{ $product->stock }}</p>

                <a href="/products/{{ $product->id }}" class="view-button">
                    View Item
                </a>
        </div>
    @endforeach
</section>

</body>
</html>
