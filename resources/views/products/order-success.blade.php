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

        .page{
            min-height:calc(100vh - 100px);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:60px 30px;
        }

        .success-card{
            width:100%;
            max-width:980px;
            padding:48px;
            border-radius:38px;

            background:rgba(255,255,255,0.68);
            backdrop-filter:blur(24px);
            border:1px solid rgba(255,255,255,0.75);

            box-shadow:
                0 30px 90px rgba(160,170,255,0.22);
        }

        .success-header{
            text-align:center;
            margin-bottom:34px;
        }

        .check{
            width:105px;
            height:105px;
            margin:0 auto 26px;
            border-radius:50%;

            display:flex;
            align-items:center;
            justify-content:center;

            color:white;
            font-size:52px;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #7d8fff
                );

            box-shadow:
                0 22px 55px rgba(150,130,255,0.35);

            animation:pop 0.7s ease;
        }

        h1{
            font-size:50px;
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

        .success-text{
            margin:0 auto;
            max-width:680px;

            color:#6f6f80;
            font-size:18px;
            line-height:1.7;
        }

        .summary-grid{
            display:grid;
            grid-template-columns:repeat(4, minmax(0, 1fr));
            gap:16px;
            margin:34px 0;
        }

        .summary-box{
            padding:19px;
            border-radius:22px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,242,249,0.82),
                    rgba(232,239,255,0.78)
                );

            border:1px solid rgba(255,255,255,0.78);
        }

        .summary-box span{
            display:block;
            margin-bottom:8px;

            color:#77778a;
            font-size:13px;
            font-weight:800;
        }

        .summary-box strong{
            color:#3f3f4d;
            font-size:16px;
        }

        .summary-box.total strong{
            font-size:22px;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .details-layout{
            display:grid;
            grid-template-columns:1.15fr 0.85fr;
            gap:24px;
            align-items:start;
        }

        .section-card{
            padding:26px;
            border-radius:28px;

            background:rgba(255,255,255,0.62);
            border:1px solid rgba(255,255,255,0.75);

            box-shadow:
                0 18px 45px rgba(160,170,255,0.12);
        }

        .section-card h2{
            margin:0 0 20px;
            color:#d46f8d;
            font-size:24px;
        }

        .order-item{
            display:grid;
            grid-template-columns:82px 1fr auto;
            gap:16px;
            align-items:center;

            padding:14px 0;

            border-bottom:1px solid rgba(210,210,230,0.40);
        }

        .order-item:last-child{
            border-bottom:none;
        }

        .order-item img{
            width:82px;
            height:58px;
            object-fit:cover;
            border-radius:15px;
            background:#f0e8ef;
        }

        .order-item h3{
            margin:0 0 6px;
            font-size:17px;
        }

        .order-item p{
            margin:0;
            color:#777;
            font-size:14px;
        }

        .item-price{
            color:#d46f8d;
            font-weight:900;
            white-space:nowrap;
        }

        .info-row{
            margin-bottom:15px;
            color:#5f5f70;
            line-height:1.6;
        }

        .info-row strong{
            display:block;
            color:#3f3f4d;
            margin-bottom:3px;
        }

        .price-breakdown{
            margin-top:22px;
            padding-top:18px;
            border-top:1px solid rgba(210,210,230,0.45);
        }

        .price-row{
            display:flex;
            justify-content:space-between;
            margin-bottom:11px;
            color:#5f5f70;
        }

        .price-row.final{
            margin-top:15px;
            padding-top:14px;
            border-top:1px solid rgba(210,210,230,0.45);

            font-size:22px;
            font-weight:900;
        }

        .price-row.final span:last-child{
            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .actions{
            display:flex;
            justify-content:center;
            gap:18px;
            flex-wrap:wrap;
            margin-top:36px;
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

        @media(max-width:950px){
            .summary-grid,
            .details-layout{
                grid-template-columns:1fr;
            }

            .success-card{
                padding:32px 24px;
            }

            h1{
                font-size:38px;
            }

            .order-item{
                grid-template-columns:70px 1fr;
            }

            .item-price{
                grid-column:2;
            }
        }
    </style>
</head>

<body>

@include('partials.navbar')

<div class="page">

    <div class="success-card">

        <div class="success-header">

            <div class="check">✓</div>

            <h1>Order Confirmed</h1>

            <p class="success-text">
                Your LootMarket order has been placed successfully.
                This is a demo payment flow, so no real payment was processed.
            </p>

        </div>

        <div class="summary-grid">

            <div class="summary-box">
                <span>Order Number</span>
                <strong>
                    LM-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                </strong>
            </div>

            <div class="summary-box">
                <span>Status</span>
                <strong>{{ $order->status }}</strong>
            </div>

            <div class="summary-box">
                <span>Payment</span>
                <strong>{{ $order->payment_method }}</strong>
            </div>

            <div class="summary-box total">
                <span>Total</span>
                <strong>${{ number_format($order->total, 2) }}</strong>
            </div>

        </div>

        <div class="details-layout">

            <div class="section-card">

                <h2>Order Items</h2>

                @foreach($order->items as $item)

                    <div class="order-item">

                        <img
                            src="{{ $item->product_image }}"
                            alt="{{ $item->product_name }}"
                        >

                        <div>
                            <h3>{{ $item->product_name }}</h3>

                            <p>
                                Quantity:
                                {{ $item->quantity }}
                            </p>
                        </div>

                        <div class="item-price">
                            ${{ number_format($item->price * $item->quantity, 2) }}
                        </div>

                    </div>

                @endforeach

            </div>

            <div class="section-card">

                <h2>Delivery & Payment</h2>

                <div class="info-row">
                    <strong>Customer</strong>
                    {{ $order->name }}<br>
                    {{ $order->email }}<br>
                    {{ $order->phone ?: 'No phone provided' }}
                </div>

                <div class="info-row">
                    <strong>Delivery Address</strong>
                    {{ $order->address }}<br>
                    {{ $order->city }},
                    {{ $order->country }}
                    {{ $order->zip_code }}
                </div>

                <div class="info-row">
                    <strong>Shipping Method</strong>
                    {{ $order->shipping_method }}
                </div>

                <div class="price-breakdown">

                    <div class="price-row">
                        <span>Subtotal</span>
                        <span>${{ number_format($order->subtotal, 2) }}</span>
                    </div>

                    <div class="price-row">
                        <span>Shipping</span>
                        <span>${{ number_format($order->shipping_price, 2) }}</span>
                    </div>

                    <div class="price-row">
                        <span>Estimated Tax</span>
                        <span>
                            ${{ number_format($order->total - $order->subtotal - $order->shipping_price, 2) }}
                        </span>
                    </div>

                    <div class="price-row final">
                        <span>Total</span>
                        <span>${{ number_format($order->total, 2) }}</span>
                    </div>

                </div>

            </div>

        </div>

        <div class="actions">

            <a href="/products" class="primary-btn">
                Continue Shopping
            </a>

            <a href="/my-orders" class="secondary-btn">
                My Orders
            </a>

        </div>

    </div>

</div>

</body>
</html>
