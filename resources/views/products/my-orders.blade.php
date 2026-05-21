<!DOCTYPE html>
<html>
<head>
    <title>My Orders | LootMarket</title>

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
        }

        .page{
            max-width:1150px;
            margin:60px auto;
            padding:0 40px;
        }

        .header{
            text-align:center;
            margin-bottom:45px;
        }

        .header h1{
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

        .header p{
            color:#6f6f80;
            font-size:17px;
        }

        .order-card{
            background:rgba(255,255,255,0.68);
            backdrop-filter:blur(24px);
            border:1px solid rgba(255,255,255,0.72);
            border-radius:32px;
            padding:28px;
            margin-bottom:28px;

            box-shadow:
                0 24px 70px rgba(160,170,255,0.18);
        }

        .order-top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
            margin-bottom:22px;
            flex-wrap:wrap;
        }

        .order-number{
            font-size:22px;
            font-weight:900;
            color:#d46f8d;
        }

        .status{
            padding:9px 18px;
            border-radius:999px;
            color:white;
            font-size:14px;
            font-weight:800;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );
        }
        .status-pending{
            background:
                linear-gradient(
                    135deg,
                    #ffb3d6,
                    #b9a7ff
                );
        }

        .status-processing{
            background:
                linear-gradient(
                    135deg,
                    #9db4ff,
                    #8fd3ff
                );
        }

        .status-delivered{
            background:
                linear-gradient(
                    135deg,
                    #79e6b0,
                    #7fbfff
                );
        }

        .status-cancelled{
            background:
                linear-gradient(
                    135deg,
                    #ff8aa5,
                    #f05f7f
                );
        }

        .order-meta{
            color:#777;
            margin-top:6px;
        }

        .items{
            display:flex;
            flex-direction:column;
            gap:16px;
            margin-top:20px;
        }

        .item{
            display:grid;
            grid-template-columns:90px 1fr auto;
            gap:18px;
            align-items:center;

            background:rgba(255,255,255,0.62);
            border-radius:22px;
            padding:16px;
        }

        .item img{
            width:90px;
            height:65px;
            object-fit:cover;
            border-radius:16px;
        }

        .item h3{
            margin:0 0 6px;
            font-size:18px;
        }

        .item p{
            margin:0;
            color:#777;
            font-size:14px;
        }

        .item-price{
            font-weight:900;
            color:#d46f8d;
        }

        .order-total{
            margin-top:22px;
            text-align:right;
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

        .empty{
            text-align:center;
            padding:70px 30px;
            background:rgba(255,255,255,0.68);
            backdrop-filter:blur(24px);
            border-radius:32px;
            box-shadow:0 24px 70px rgba(160,170,255,0.18);
        }

        .empty h2{
            color:#d46f8d;
            font-size:34px;
        }

        .shop-btn{
            display:inline-block;
            margin-top:22px;
            padding:16px 26px;
            border-radius:20px;
            text-decoration:none;
            color:white;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff62a9,
                    #7d8fff
                );
        }
    </style>
</head>

<body>

@include('partials.navbar')

<div class="page">

    <div class="header">
        <h1>My Orders</h1>
        <p>Track your LootMarket purchases and digital deliveries.</p>
    </div>

    @if($orders->count() > 0)

        @foreach($orders as $order)

            <div class="order-card">

                <div class="order-top">
                    <div>
                        <div class="order-number">
                            Order #LM-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                        </div>

                        <div class="order-meta">
                            {{ $order->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>

                    <div
                        class="status
    @if($order->status == 'Pending') status-pending @endif
    @if($order->status == 'Processing') status-processing @endif
    @if($order->status == 'Delivered') status-delivered @endif
    @if($order->status == 'Cancelled') status-cancelled @endif"
                    >
                        {{ $order->status }}
                    </div>
                </div>

                <div class="items">

                    @foreach($order->items as $item)

                        <div class="item">
                            <img src="{{ $item->product_image }}">

                            <div>
                                <h3>{{ $item->product_name }}</h3>
                                <p>Quantity: {{ $item->quantity }}</p>
                            </div>

                            <div class="item-price">
                                ${{ $item->price * $item->quantity }}
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="order-total">
                    Total: ${{ $order->total }}
                </div>

            </div>

        @endforeach

    @else

        <div class="empty">
            <h2>No orders yet</h2>
            <p>You have not placed any LootMarket orders yet.</p>

            <a href="/products" class="shop-btn">
                Start Shopping
            </a>
        </div>

    @endif

</div>

</body>
</html>
