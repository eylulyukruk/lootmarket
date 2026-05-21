<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed | LootMarket</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            min-height:100vh;
            color:#2f2f3a;

            background:
                radial-gradient(circle at 8% 18%, rgba(255,145,210,0.35), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120,165,255,0.32), transparent 24%),
                radial-gradient(circle at 50% 95%, rgba(255,210,235,0.45), transparent 30%),
                linear-gradient(135deg,#ffe9f7,#efe5ff,#dceeff);
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
            min-height:calc(100vh - 100px);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:60px 30px;
        }

        .success-card{
            width:100%;
            max-width:760px;
            text-align:center;
            padding:60px 50px;
            border-radius:38px;

            background:rgba(255,255,255,0.68);
            backdrop-filter:blur(24px);
            border:1px solid rgba(255,255,255,0.75);

            box-shadow:
                0 30px 90px rgba(160,170,255,0.22);
        }

        .check{
            width:110px;
            height:110px;
            margin:0 auto 28px;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;

            color:white;
            font-size:54px;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #7d8fff
                );

            box-shadow:
                0 22px 55px rgba(150,130,255,0.35);

            animation: pop 0.7s ease;
        }

        h1{
            font-size:52px;
            margin:0 0 14px;

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

        p{
            color:#6f6f80;
            font-size:18px;
            line-height:1.7;
        }

        .order-box{
            margin:34px auto;
            max-width:460px;
            padding:22px;
            border-radius:24px;
            background:rgba(255,255,255,0.7);
            border:1px solid rgba(255,255,255,0.8);
        }

        .order-box strong{
            color:#d46f8d;
        }

        .actions{
            display:flex;
            justify-content:center;
            gap:18px;
            flex-wrap:wrap;
            margin-top:34px;
        }

        .primary-btn,
        .secondary-btn{
            padding:16px 26px;
            border-radius:20px;
            text-decoration:none;
            font-weight:900;
            transition:0.3s;
        }

        .primary-btn{
            color:white;
            background:linear-gradient(135deg,#ff62a9,#7d8fff);
            box-shadow:0 18px 45px rgba(150,130,255,0.30);
        }

        .secondary-btn{
            color:#d46f8d;
            background:rgba(255,255,255,0.72);
        }

        .primary-btn:hover,
        .secondary-btn:hover{
            transform:translateY(-4px);
        }

        @keyframes pop{
            0%{
                transform:scale(0.5);
                opacity:0;
            }

            70%{
                transform:scale(1.08);
            }

            100%{
                transform:scale(1);
                opacity:1;
            }
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
            <a href="/profile">Account</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>
</nav>

<div class="page">

    <div class="success-card">

        <div class="check">✓</div>

        <h1>Order Confirmed</h1>

        <p>
            Your LootMarket order has been placed successfully.
            This is a demo payment flow, so no real payment was processed.
        </p>

        <div class="order-box">
            <p>
                <strong>Order Number:</strong>
                LM-{{ rand(10000, 99999) }}
            </p>

            <p>
                <strong>Delivery:</strong>
                Instant digital delivery / standard item processing
            </p>
        </div>

        <div class="actions">
            <a href="/products" class="primary-btn">
                Continue Shopping
            </a>

            <a href="#" class="secondary-btn">
                My Orders
            </a>
        </div>

    </div>

</div>

</body>
</html>
