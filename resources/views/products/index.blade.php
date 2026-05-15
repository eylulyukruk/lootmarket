<!DOCTYPE html>
<html>
<head>
    <title>LootMarket</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f5f2;
            color: #3a3a3a;
        }

        .navbar {
            padding: 24px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.05);
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #c89fa3;
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
            font-size: 48px;
            margin-bottom: 16px;
            color: #3a3a3a;
        }

        .hero p {
            font-size: 18px;
            color: #6b6b6b;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
            padding: 40px 60px 80px;
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            border: 1px solid rgba(216, 180, 182, 0.35);
            transition: 0.3s ease;
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
            box-shadow: 0 22px 45px rgba(0,0,0,0.12);
        }

        .badge {
            display: inline-block;
            padding: 7px 14px;
            border-radius: 999px;
            background: #d8b4b6;
            color: white;
            font-size: 13px;
            margin-bottom: 14px;
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
            min-height: 45px;
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
            margin-top: 18px;
            width: 100%;
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
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">LootMarket</div>
    <div class="nav-links">
        <a href="/products">Products</a>
        <a href="#">Cart</a>
        <a href="#">Login</a>
    </div>
</nav>

<section class="hero">
    <h1>Soft Gaming Marketplace</h1>
    <p>Discover premium game skins, items, and digital collectibles in a calm and elegant marketplace.</p>
</section>

<section class="products">
    @foreach($products as $product)
        <div class="card">
            @if($product->image)
                <img src="{{ $product->image }}" class="product-image" alt="{{ $product->name }}">
            @endif
            <span class="badge game">{{ $product->game }}</span>
            <span class="badge">{{ $product->type }}</span>

            <h2>{{ $product->name }}</h2>

            <p class="description">{{ $product->description }}</p>

            <div class="price">${{ $product->price }}</div>
            <p class="stock">Stock: {{ $product->stock }}</p>

            <button class="button">View Item</button>
        </div>
    @endforeach
</section>

</body>
</html>
