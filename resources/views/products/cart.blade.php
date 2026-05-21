<!DOCTYPE html>
<html>
<head>
    <title>LootMarket Cart</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            color:#2f2f3a;
            min-height:100vh;

            background:
                radial-gradient(circle at 8% 18%, rgba(255,145,210,0.35), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120,165,255,0.32), transparent 24%),
                radial-gradient(circle at 50% 95%, rgba(255,210,235,0.45), transparent 30%),
                linear-gradient(135deg,#ffe9f7,#efe5ff,#dceeff);

            overflow-x:hidden;
        }

        .navbar {
            padding: 24px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;

            background:
                linear-gradient(
                    90deg,
                    rgba(255,235,245,0.9),
                    rgba(235,242,255,0.9)
                );

            backdrop-filter: blur(18px);
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
            font-weight: 600;
        }

        .page{
            max-width:1250px;
            margin:60px auto;
            padding:0 40px;
            position:relative;
            z-index:2;
        }

        .cart-header{
            text-align:center;
            margin-bottom:45px;
        }

        .cart-header h1{
            font-size:54px;
            margin:0 0 12px;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #c078ff,
                    #7f9cff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .cart-header p{
            color:#6f6f80;
            font-size:17px;
        }

        .cart-layout{
            display:grid;
            grid-template-columns:1.6fr 0.8fr;
            gap:34px;
            align-items:start;
        }

        .cart-list{
            display:flex;
            flex-direction:column;
            gap:22px;
        }

        .cart-item{
            display:grid;
            grid-template-columns:150px 1fr auto;
            gap:24px;
            align-items:center;

            background:rgba(255,255,255,0.62);
            backdrop-filter:blur(24px);
            border:1px solid rgba(255,255,255,0.72);
            border-radius:30px;
            padding:22px;

            box-shadow:
                0 22px 60px rgba(160,170,255,0.16);

            transition:0.3s;
        }

        .cart-item:hover{
            transform:translateY(-4px);
            box-shadow:
                0 30px 75px rgba(160,170,255,0.24);
        }

        .cart-image{
            width:150px;
            height:105px;
            object-fit:cover;
            border-radius:22px;
            background:white;
            box-shadow:
                0 12px 30px rgba(0,0,0,0.08);
        }

        .item-info h2{
            font-size:24px;
            margin:0 0 10px;
        }

        .item-price{
            font-size:24px;
            font-weight:900;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .item-meta{
            margin-top:8px;
            color:#777;
            font-size:15px;
        }

        .quantity-controls{
            display:flex;
            align-items:center;
            gap:10px;
            margin-top:16px;
        }

        .qty-btn{
            width:38px;
            height:38px;
            border:none;
            border-radius:13px;
            cursor:pointer;
            font-weight:900;
            color:white;
            font-size:18px;
            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            box-shadow:
                0 10px 24px rgba(170,160,255,0.22);

            transition:0.25s;
        }

        .qty-btn:hover{
            transform:scale(1.08);
        }

        .qty-number{
            min-width:42px;
            text-align:center;
            padding:9px 12px;
            border-radius:13px;
            background:white;
            font-weight:800;
        }

        .remove-btn{
            border:none;
            border-radius:16px;
            padding:12px 18px;
            color:white;
            font-weight:800;
            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    #ff8aa5,
                    #f05f7f
                );

            box-shadow:
                0 12px 28px rgba(240,95,127,0.22);

            transition:0.25s;
        }

        .remove-btn:hover{
            transform:translateY(-3px);
        }

        .summary-card{
            position:sticky;
            top:120px;

            background:rgba(255,255,255,0.68);
            backdrop-filter:blur(24px);
            border:1px solid rgba(255,255,255,0.72);
            border-radius:32px;
            padding:30px;

            box-shadow:
                0 24px 70px rgba(160,170,255,0.18);
        }

        .summary-card h2{
            font-size:30px;
            margin:0 0 24px;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .summary-row{
            display:flex;
            justify-content:space-between;
            margin-bottom:16px;
            color:#5f5f70;
            font-size:16px;
        }

        .summary-divider{
            height:1px;
            background:rgba(190,190,210,0.45);
            margin:22px 0;
        }

        .summary-total{
            display:flex;
            justify-content:space-between;
            align-items:center;
            font-size:25px;
            font-weight:900;
        }

        .total-price{
            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .checkout-btn{
            display:block;
            text-align:center;
            margin-top:28px;
            padding:18px 24px;
            border-radius:22px;
            text-decoration:none;
            color:white;
            font-weight:900;
            font-size:17px;

            background:
                linear-gradient(
                    135deg,
                    #ff62a9,
                    #7d8fff
                );

            box-shadow:
                0 18px 45px rgba(150,130,255,0.32);

            transition:0.3s;
        }

        .checkout-btn:hover{
            transform:translateY(-4px);
            box-shadow:
                0 25px 55px rgba(150,130,255,0.42);
        }

        .continue-btn{
            display:block;
            text-align:center;
            margin-top:16px;
            padding:15px 24px;
            border-radius:20px;
            text-decoration:none;
            color:#d46f8d;
            font-weight:800;
            background:rgba(255,255,255,0.62);
        }

        .empty-cart{
            text-align:center;
            padding:70px 30px;
            background:rgba(255,255,255,0.62);
            backdrop-filter:blur(24px);
            border-radius:32px;
            box-shadow:
                0 24px 70px rgba(160,170,255,0.18);
        }

        .empty-cart h2{
            font-size:34px;
            margin-bottom:12px;
            color:#d46f8d;
        }

        .empty-cart p{
            color:#777;
        }

        .glow{
            position:fixed;
            border-radius:50%;
            filter:blur(90px);
            opacity:0.25;
            z-index:0;
            pointer-events:none;
        }

        .glow-1{
            width:340px;
            height:340px;
            left:5%;
            top:240px;
            background:#ff8bcf;
        }

        .glow-2{
            width:420px;
            height:420px;
            right:6%;
            bottom:80px;
            background:#9d9cff;
        }

        @media(max-width:950px){
            .cart-layout{
                grid-template-columns:1fr;
            }

            .cart-item{
                grid-template-columns:1fr;
            }

            .cart-image{
                width:100%;
                height:220px;
            }

            .summary-card{
                position:static;
            }
        }
    </style>
</head>

<body>

<div class="glow glow-1"></div>
<div class="glow glow-2"></div>

@include('partials.navbar')

<div class="page">

    <div class="cart-header">
        <h1>Your Cart</h1>
        <p>Review your selected loot before checkout.</p>
    </div>

    @php
        $total = 0;
        $tax = 0;
        $shipping = 0;
    @endphp

    @if(count($cart) > 0)

        <div class="cart-layout">

            <div class="cart-list">

                @foreach($cart as $id => $item)

                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="cart-item">

                        <img src="{{ $item['image'] }}" class="cart-image" alt="{{ $item['name'] }}">

                        <div class="item-info">

                            <h2>{{ $item['name'] }}</h2>

                            <div class="item-price">
                                ${{ $item['price'] }}
                            </div>

                            <div class="item-meta">
                                Subtotal: ${{ $subtotal }}
                            </div>

                            <div class="quantity-controls">

                                <form action="/cart/decrease/{{ $id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="qty-btn">−</button>
                                </form>

                                <div class="qty-number">
                                    {{ $item['quantity'] }}
                                </div>

                                <form action="/cart/increase/{{ $id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="qty-btn">+</button>
                                </form>

                            </div>

                        </div>

                        <form action="/cart/remove/{{ $id }}" method="POST">
                            @csrf
                            <button type="submit" class="remove-btn">
                                Remove
                            </button>
                        </form>

                    </div>

                @endforeach

            </div>

            @php
                $tax = round($total * 0.08, 2);
                $grandTotal = $total + $tax + $shipping;
            @endphp

            <div class="summary-card">

                <h2>Order Summary</h2>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <strong>${{ $total }}</strong>
                </div>

                <div class="summary-row">
                    <span>Estimated Tax</span>
                    <strong>${{ $tax }}</strong>
                </div>

                <div class="summary-row">
                    <span>Digital Delivery</span>
                    <strong>Free</strong>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-total">
                    <span>Total</span>
                    <span class="total-price">${{ $grandTotal }}</span>
                </div>

                <a href="/checkout" class="checkout-btn">
                    Proceed to Checkout
                </a>

                <a href="/products" class="continue-btn">
                    Continue Shopping
                </a>

            </div>

        </div>

    @else

        <div class="empty-cart">
            <h2>Your cart is empty</h2>
            <p>Looks like you have not added any loot yet.</p>

            <a href="/products" class="checkout-btn" style="display:inline-block; margin-top:24px;">
                Start Shopping
            </a>
        </div>

    @endif

</div>

</body>
</html>
