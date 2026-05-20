<!DOCTYPE html>
<html>
<head>
    <title>LootMarket</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background:

                radial-gradient(
                    circle at left,
                    rgba(255,210,230,0.45),
                    transparent 28%
                ),

                radial-gradient(
                    circle at right,
                    rgba(200,220,255,0.40),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #fff6fb,
                    #f7f0ff,
                    #edf6ff
                );

            overflow-x:hidden;

            position:relative;

            min-height:100vh;
            color: #3a3a3a;
        }

        .navbar {
            padding: 24px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background:

                linear-gradient(
                    90deg,
                    rgba(255,235,245,0.88),
                    rgba(235,242,255,0.88)
                );

            backdrop-filter:blur(18px);

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
        .dropdown{
            position:relative;
            display:inline-block;
        }

        .dropdown-menu{

            display:none;

            position:absolute;

            right:0;

            top:42px;

            width:220px;

            padding:16px;

            border-radius:28px;

            background:

                linear-gradient(
                    180deg,
                    rgba(255,240,247,0.96),
                    rgba(232,240,255,0.96)
                );

            backdrop-filter:blur(24px);

            border:
                1px solid rgba(255,255,255,0.7);

            box-shadow:
                0 18px 55px rgba(170,180,255,0.18);

            z-index:999;
        }


        .dropdown:hover .dropdown-menu{
            display:block;
        }
        .profile-top{

            display:flex;

            align-items:center;

            gap:14px;

            margin-bottom:18px;
        }

        .profile-avatar{

            width:52px;
            height:52px;

            border-radius:50%;

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:28px;
            font-weight:700;

            color:white;

            background:

                linear-gradient(
                    135deg,
                    #ff5fa2,
                    #ff79c2
                );
        }

        .profile-name{

            font-size:18px;
            font-weight:800;

            color:#f05fa5;
        }

        .profile-welcome{

            font-size:14px;

            color:#7a7a8c;

            margin-top:3px;
        }
        .dropdown-divider{

            height:1px;

            background:
                rgba(210,210,230,0.4);

            margin:14px 0;
        }

        .dropdown-item{

            display:flex;

            align-items:center;

            gap:14px;

            padding:12px 14px;

            border-radius:16px;

            text-decoration:none;

            color:#3f3f52;

            font-size:16px;

            transition:0.22s;
        }
        .dropdown-item:hover{

            background:
                rgba(255,255,255,0.55);
        }

        .dropdown-item i{

            color:#f05fa5;

            font-size:20px;

            width:22px;
        }

        .logout-button{

            width:100%;

            border:none;

            background:none;

            cursor:pointer;

            text-align:left;
        }
        .dropdown-menu a{

            display:block;

            margin:0;

            margin-bottom:8px;

            padding:12px 14px;

            border-radius:14px;

            text-decoration:none;

            color:#3a3a3a;

            transition:0.2s;
        }


        .dropdown-menu a:hover{
            background:#fff1f5;
        }

        .dropdown-username{

            padding:12px 14px;

            color:#f05fa5;
            font-size:24px;
            font-weight:800;

            margin-bottom:10px;
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
        body::before{

            content:"";

            position:fixed;

            left:-120px;
            bottom:-120px;

            width:340px;
            height:340px;

            border-radius:50%;

            background:
                radial-gradient(
                    circle at 30% 30%,
                    rgba(255,255,255,0.9),
                    rgba(255,210,230,0.75),
                    rgba(220,200,255,0.45)
                );

            filter:blur(2px);

            z-index:-1;
        }
        body::after{

            content:"";

            position:fixed;

            right:-220px;
            bottom:-220px;

            width:650px;
            height:650px;

            border-radius:50%;

            background:
                radial-gradient(
                    circle at 30% 30%,
                    rgba(255,255,255,0.92),
                    rgba(220,210,255,0.58),
                    rgba(190,220,255,0.32)
                );

            z-index:-1;

            opacity:0.8;
        }
        .dropdown-menu i{

            width:22px;

            margin-right:10px;

            color:#f05fa5;

            font-size:18px;
        }
        .cosmic-bg{
            position:fixed;
            inset:0;
            overflow:hidden;
            pointer-events:none;
            z-index:0;
        }

        .hero,
        .products,
        .navbar{
            position:relative;
            z-index:2;
        }

        /* SOL GEZEGEN */

        .planet-left{

            position:absolute;

            left:-90px;
            top:430px;

            width:250px;
            height:250px;

            border-radius:50%;

            background:

                radial-gradient(
                    circle at 30% 25%,
                    #ffe8f8 0%,
                    #ffb0da 22%,
                    #ef87ff 48%,
                    #9d8fff 78%,
                    #7d86ff 100%
                );

            box-shadow:
                0 0 120px rgba(255,160,220,0.42),
                inset -50px -60px 90px rgba(100,120,255,0.22);

            overflow:hidden;
            animation:
                floatPlanet 9s ease-in-out infinite;
        }

        .planet-left::after{

            content:"";

            position:absolute;

            inset:0;

            border-radius:50%;

            background:

                repeating-linear-gradient(
                    160deg,
                    rgba(255,255,255,0.12) 0px,
                    rgba(255,255,255,0.12) 14px,
                    transparent 14px,
                    transparent 34px
                );

            mix-blend-mode:screen;

            opacity:0.7;
        }

        .planet-left::before{

            content:"";

            position:absolute;

            width:360px;
            height:105px;

            left:-62px;
            top:72px;

            border-radius:50%;

            border:
                4px solid rgba(220,250,255,0.72);

            transform:rotate(24deg);

            box-shadow:
                0 0 35px rgba(220,255,255,0.55);
        }

        /* texture */

        .planet-left::after{

            content:"";

            position:absolute;

            inset:0;

            border-radius:50%;

            background:

                repeating-linear-gradient(
                    160deg,
                    rgba(255,255,255,0.10) 0px,
                    rgba(255,255,255,0.10) 12px,
                    transparent 12px,
                    transparent 26px
                );

            opacity:0.55;
        }

        /* halka */

        .planet-left::before{

            content:"";

            position:absolute;

            width:330px;
            height:90px;

            left:-58px;
            top:66px;

            border-radius:50%;

            border:
                3px solid rgba(210,240,255,0.65);

            transform:rotate(25deg);

            box-shadow:
                0 0 28px rgba(220,255,255,0.45);
        }

        /* SAĞ GEZEGEN */

        .planet-right{

            position:absolute;

            right:-170px;
            top:470px;

            width:430px;
            height:430px;

            border-radius:50%;

            background:

                radial-gradient(
                    circle at 30% 25%,
                    #fff1fc 0%,
                    #f2c8ff 25%,
                    #d3a4ff 50%,
                    #9e9eff 78%,
                    #7d8fff 100%
                );

            box-shadow:
                0 0 150px rgba(180,190,255,0.42),
                inset -70px -80px 120px rgba(120,140,255,0.22);

            overflow:hidden;
            animation:
                floatPlanetReverse 12s ease-in-out infinite;
        }

        .planet-right::after{

            content:"";

            position:absolute;

            inset:0;

            border-radius:50%;

            background:

                repeating-linear-gradient(
                    160deg,
                    rgba(255,255,255,0.10) 0px,
                    rgba(255,255,255,0.10) 18px,
                    transparent 18px,
                    transparent 42px
                );

            opacity:0.65;

            mix-blend-mode:screen;
        }

        .planet-right::before{

            content:"";

            position:absolute;

            width:620px;
            height:145px;

            left:-110px;
            top:145px;

            border-radius:50%;

            border:
                4px solid rgba(235,255,255,0.78);

            transform:rotate(-18deg);

            box-shadow:
                0 0 42px rgba(220,255,255,0.58);
        }

        /* texture */

        .planet-right::after{

            content:"";

            position:absolute;

            inset:0;

            border-radius:50%;

            background:

                repeating-linear-gradient(
                    160deg,
                    rgba(255,255,255,0.08) 0px,
                    rgba(255,255,255,0.08) 16px,
                    transparent 16px,
                    transparent 34px
                );

            opacity:0.5;
        }

        /* halka */

        .planet-right::before{

            content:"";

            position:absolute;

            width:520px;
            height:120px;

            left:-90px;
            top:110px;

            border-radius:50%;

            border:
                3px solid rgba(225,255,255,0.62);

            transform:rotate(-18deg);

            box-shadow:
                0 0 36px rgba(220,255,255,0.45);
        }

        /* küçük gezegen */

        .tiny-planet{

            position:absolute;

            right:320px;
            top:560px;

            width:46px;
            height:46px;

            border-radius:50%;

            background:

                radial-gradient(
                    circle at 30% 30%,
                    #ffd8f5,
                    #dd8fff,
                    #9199ff
                );

            box-shadow:
                0 0 35px rgba(255,160,230,0.4);
            animation:
                floatPlanet 7s ease-in-out infinite;
        }

        /* yıldızlar */

        .star{

            position:absolute;

            width:4px;
            height:4px;

            border-radius:50%;

            background: #dd8fff;

            box-shadow:
                0 0 18px rgb(255 145 240 / 0.84);
            animation:
                twinkle 4s ease-in-out infinite;
        }

        .s1{ left:18%; top:220px; }
        .s2{ left:48%; top:170px; }
        .s3{ right:18%; top:260px; }
        .s4{ right:9%; top:620px; }
        .s5{ left:38%; top:560px; }

        @keyframes floatPlanet {

            0%{
                transform:translateY(0px) rotate(0deg);
            }

            50%{
                transform:translateY(-14px) rotate(1deg);
            }

            100%{
                transform:translateY(0px) rotate(0deg);
            }
        }

        @keyframes floatPlanetReverse {

            0%{
                transform:translateY(0px) rotate(0deg);
            }

            50%{
                transform:translateY(10px) rotate(-1deg);
            }

            100%{
                transform:translateY(0px) rotate(0deg);
            }
        }

        @keyframes twinkle {

            0%{
                opacity:0.4;
            }

            50%{
                opacity:1;
            }

            100%{
                opacity:0.4;
            }
        }
    </style>
</head>
<body>
<div class="cosmic-bg">

    <div class="planet-left"></div>

    <div class="planet-right"></div>

    <div class="tiny-planet"></div>

    <div class="star s1"></div>
    <div class="star s2"></div>
    <div class="star s3"></div>
    <div class="star s4"></div>
    <div class="star s5"></div>

</div>
<nav class="navbar">
    <div class="logo">
        <img src="/images/logo.png">

        <span>LootMarket</span>
    </div>
    <div class="nav-links">
        <a href="/products">Products</a>
        <a href="/cart">Cart</a>

        @auth
            <div class="dropdown">

                <a href="#">
                    Account ▼
                </a>

                <div class="dropdown-menu">

                    <div class="profile-top">

                        <div class="profile-avatar">
                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                        </div>

                        <div>

                            <div class="profile-name">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="profile-welcome">
                                Welcome back!
                            </div>

                        </div>

                    </div>

                    <a href="#" class="dropdown-item">

                        <i class="fa-solid fa-cube"></i>

                        My Orders

                    </a>

                    <a href="#" class="dropdown-item">

                        <i class="fa-regular fa-heart"></i>

                        Wishlist

                    </a>

                    <div class="dropdown-divider"></div>

                    <form action="/logout" method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="dropdown-item logout-button"
                        >

                            <i class="fa-solid fa-right-from-bracket"></i>

                            Logout

                        </button>

                    </form>

                </div>

            </div>
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

    <a href="/products?category=Gaming Setup" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">Gaming Setup</a>

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
