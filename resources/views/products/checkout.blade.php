<!DOCTYPE html>
<html>
<head>
    <title>Checkout | LootMarket</title>

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
            padding:24px 60px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            background:linear-gradient(90deg,rgba(255,235,245,0.9),rgba(235,242,255,0.9));
            backdrop-filter:blur(18px);
            box-shadow:0 10px 35px rgba(212,111,141,0.10);
            border-bottom:1px solid rgba(212,111,141,0.18);
            position:sticky;
            top:0;
            z-index:100;
        }

        .logo{
            font-size:30px;
            font-weight:800;
            color:#d46f8d;
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

        .nav-links a{
            margin-left:24px;
            text-decoration:none;
            color:#3a3a3a;
            font-weight:600;
        }

        .page{
            max-width:1250px;
            margin:60px auto;
            padding:0 40px;
            position:relative;
            z-index:2;
        }

        .checkout-header{
            text-align:center;
            margin-bottom:45px;
        }

        .checkout-header h1{
            font-size:54px;
            margin:0 0 12px;

            background:linear-gradient(90deg,#ff5fa2,#c078ff,#7f9cff);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .checkout-header p{
            color:#6f6f80;
            font-size:17px;
        }

        .checkout-layout{
            display:grid;
            grid-template-columns:1.1fr 0.8fr;
            gap:34px;
            align-items:start;
        }

        .payment-card,
        .summary-card{
            background:rgba(255,255,255,0.68);
            backdrop-filter:blur(24px);
            border:1px solid rgba(255,255,255,0.72);
            border-radius:34px;
            padding:34px;
            box-shadow:0 24px 70px rgba(160,170,255,0.18);
        }

        .section-title{
            font-size:28px;
            margin:0 0 24px;
            color:#d46f8d;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:700;
            color:#4a4a58;
        }

        input{
            width:100%;
            padding:17px 18px;
            border-radius:18px;
            border:1px solid rgba(210,210,230,0.7);
            outline:none;
            font-size:16px;
            margin-bottom:20px;
            background:rgba(255,255,255,0.82);
            box-sizing:border-box;
        }

        input:focus{
            border-color:#ff7eb6;
            box-shadow:0 0 0 4px rgba(255,126,182,0.12);
        }

        .form-row{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
        }

        .payment-methods{
            display:flex;
            gap:14px;
            flex-wrap:wrap;
            margin-bottom:28px;
        }

        .method{
            padding:14px 18px;
            border-radius:18px;
            background:rgba(255,255,255,0.7);
            border:1px solid rgba(255,255,255,0.75);
            font-weight:800;
            color:#555;
        }

        .method.active{
            color:white;
            background:linear-gradient(135deg,#ff7eb6,#8f8dff);
            box-shadow:0 14px 35px rgba(170,160,255,0.22);
        }

        .fake-card{
            margin:10px 0 30px;
            padding:28px;
            border-radius:30px;
            color:white;
            min-height:165px;
            background:
                radial-gradient(circle at top right, rgba(255,255,255,0.24), transparent 25%),
                linear-gradient(135deg,#ff7eb6,#9a8cff,#7aa8ff);
            box-shadow:0 24px 60px rgba(150,130,255,0.28);
        }

        .fake-card-top{
            display:flex;
            justify-content:space-between;
            font-weight:800;
            margin-bottom:42px;
        }

        .fake-card-number{
            font-size:24px;
            letter-spacing:3px;
            margin-bottom:24px;
        }

        .fake-card-bottom{
            display:flex;
            justify-content:space-between;
            font-size:14px;
            opacity:0.95;
        }

        .summary-item{
            display:flex;
            gap:14px;
            align-items:center;
            padding:14px 0;
            border-bottom:1px solid rgba(210,210,230,0.35);
        }

        .summary-img{
            width:72px;
            height:52px;
            object-fit:cover;
            border-radius:14px;
        }

        .summary-info{
            flex:1;
        }

        .summary-info h3{
            margin:0 0 4px;
            font-size:16px;
        }

        .summary-info p{
            margin:0;
            color:#777;
            font-size:14px;
        }

        .summary-price{
            font-weight:900;
            color:#d46f8d;
        }

        .summary-row{
            display:flex;
            justify-content:space-between;
            margin-top:16px;
            color:#5f5f70;
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
            background:linear-gradient(90deg,#ff5fa2,#8f8dff);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .pay-btn{
            width:100%;
            margin-top:28px;
            padding:18px 24px;
            border:none;
            border-radius:22px;
            color:white;
            font-weight:900;
            font-size:17px;
            cursor:pointer;
            background:linear-gradient(135deg,#ff62a9,#7d8fff);
            box-shadow:0 18px 45px rgba(150,130,255,0.32);
            transition:0.3s;
        }

        .pay-btn:hover{
            transform:translateY(-4px);
            box-shadow:0 25px 55px rgba(150,130,255,0.42);
        }

        .back-btn{
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

        .secure-note{
            margin-top:20px;
            color:#777;
            font-size:14px;
            line-height:1.6;
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
            .checkout-layout{
                grid-template-columns:1fr;
            }

            .form-row{
                grid-template-columns:1fr;
            }
        }
    </style>
</head>

<body>

<div class="glow glow-1"></div>
<div class="glow glow-2"></div>

<nav class="navbar">
    <div class="logo">
        <img src="/images/logo.png">
        <span>LootMarket</span>
    </div>

    <div class="nav-links">
        <a href="/products">Products</a>
        <a href="/cart">Cart</a>

        @auth
            <a href="/profile">Account</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>
</nav>

<div class="page">

    <div class="checkout-header">
        <h1>Checkout</h1>
        <p>Complete your order with a secure mock payment flow.</p>
    </div>

    @php
        $total = 0;
    @endphp

    @foreach($cart as $item)
        @php
            $total += $item['price'] * $item['quantity'];
        @endphp
    @endforeach

    @php
        $tax = round($total * 0.08, 2);
        $grandTotal = $total + $tax;
    @endphp

    <div class="checkout-layout">

        <div class="payment-card">

            <h2 class="section-title">Payment Details</h2>

            <div class="payment-methods">
                <div class="method active">Visa</div>
                <div class="method">Mastercard</div>
                <div class="method">PayPal</div>
                <div class="method">Steam Wallet</div>
            </div>

            <div class="fake-card">
                <div class="fake-card-top">
                    <span>LootMarket Card</span>
                    <span>VISA</span>
                </div>

                <div class="fake-card-number">
                    **** **** **** 2048
                </div>

                <div class="fake-card-bottom">
                    <span>CARD HOLDER<br>Gamer User</span>
                    <span>EXPIRES<br>12/29</span>
                </div>
            </div>

            <form action="/checkout/pay" method="POST">
                @csrf

                <label>Full Name</label>
                <input type="text" placeholder="Eylül Yükrük">

                <label>Email Address</label>
                <input type="email" placeholder="example@mail.com">

                <label>Card Number</label>
                <input type="text" placeholder="1234 5678 9012 3456">

                <div class="form-row">
                    <div>
                        <label>Expiry Date</label>
                        <input type="text" placeholder="MM/YY">
                    </div>

                    <div>
                        <label>CVV</label>
                        <input type="text" placeholder="123">
                    </div>
                </div>

                <button type="submit" class="pay-btn">
                    Pay ${{ $grandTotal }}
                </button>
            </form>

            <p class="secure-note">
                🔒 This is a project demo payment screen. No real payment is processed.
            </p>

        </div>

        <div class="summary-card">

            <h2 class="section-title">Order Summary</h2>

            @foreach($cart as $item)

                <div class="summary-item">
                    <img src="{{ $item['image'] }}" class="summary-img">

                    <div class="summary-info">
                        <h3>{{ $item['name'] }}</h3>
                        <p>Quantity: {{ $item['quantity'] }}</p>
                    </div>

                    <div class="summary-price">
                        ${{ $item['price'] * $item['quantity'] }}
                    </div>
                </div>

            @endforeach

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

            <a href="/cart" class="back-btn">
                Back to Cart
            </a>

        </div>

    </div>

</div>

</body>
</html>
