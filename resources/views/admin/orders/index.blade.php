<!DOCTYPE html>
<html>
<head>
    <title>Admin Orders | LootMarket</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:
                radial-gradient(circle at 8% 18%, rgba(255,145,210,0.22), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120,165,255,0.20), transparent 24%),
                linear-gradient(135deg,#fff7f8,#f8f5f2,#edf5f8);
            color:#2f2f3a;
        }

        .layout{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:300px;
            background:linear-gradient(180deg,#ffdfe8,#f4dbe2,#dbeaf1);
            padding:40px 24px;
            box-sizing:border-box;
            box-shadow:0 10px 40px rgba(0,0,0,0.08);
        }

        .logo{
            font-size:26px;
            font-weight:800;
            color:#d46f8d;
            display:flex;
            align-items:center;
            margin-bottom:50px;
        }

        .logo img{
            width:42px;
            height:42px;
            border-radius:14px;
            margin-right:14px;
        }

        .sidebar a{
            display:block;
            padding:16px 20px;
            margin-bottom:14px;
            text-decoration:none;
            color:#3a3a3a;
            border-radius:18px;
            background:rgba(255,255,255,0.45);
            transition:0.25s;
        }

        .sidebar a:hover{
            transform:translateX(6px);
            background:white;
        }

        .content{
            flex:1;
            padding:50px;
        }

        .page-title{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:32px;
        }

        h1{
            font-size:42px;
            margin:0;
        }

        .orders{
            display:flex;
            flex-direction:column;
            gap:24px;
        }

        .order-card{
            background:
                linear-gradient(
                    135deg,
                    rgba(255,248,251,0.92),
                    rgba(248,244,252,0.92),
                    rgba(236,244,255,0.92)
                );
            border-radius:34px;
            padding:28px;
            box-shadow:0 22px 55px rgba(160,170,255,0.14);
            border:1px solid rgba(255,255,255,0.75);
            backdrop-filter:blur(16px);
            transition:0.3s;
        }

        .order-card:hover{
            transform:translateY(-3px);
            box-shadow:0 28px 70px rgba(160,170,255,0.20);
        }

        .order-top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:18px;
            flex-wrap:wrap;
            margin-bottom:22px;
        }

        .order-number{
            font-size:23px;
            font-weight:900;
            color:#d46f8d;
        }

        .meta{
            color:#777;
            margin-top:6px;
        }

        .status-form{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .custom-status{
            position:relative;
        }

        .custom-status-btn{
            min-width:150px;
            height:44px;

            display:flex;
            align-items:center;
            justify-content:space-between;

            padding:0 18px;

            border:none;
            border-radius:999px;

            color:white;
            font-weight:900;
            font-size:15px;

            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            box-shadow:
                0 12px 26px rgba(170,160,255,0.22);
        }

        .custom-status-menu{
            display:none;

            position:absolute;

            top:52px;
            left:0;

            width:180px;

            padding:10px;

            border-radius:20px;

            background:
                linear-gradient(
                    180deg,
                    rgba(255,240,247,0.98),
                    rgba(232,240,255,0.98)
                );

            backdrop-filter:blur(18px);

            border:
                1px solid rgba(255,255,255,0.8);

            box-shadow:
                0 18px 45px rgba(160,170,255,0.24);

            z-index:50;
        }

        .custom-status-menu.show{
            display:block;
        }

        .custom-status-menu button{
            width:100%;

            padding:12px 14px;

            border:none;
            border-radius:14px;

            background:transparent;

            text-align:left;

            color:#3f3f52;

            font-size:15px;
            font-weight:800;

            cursor:pointer;

            transition:0.2s;
        }

        .custom-status-menu button:hover{
            background:
                linear-gradient(
                    135deg,
                    rgba(255,126,182,0.22),
                    rgba(143,141,255,0.18)
                );

            color:#d46f8d;
        }
        .update-btn{
            height:42px;
            padding:0 18px;
            border:none;
            border-radius:999px;
            color:white;
            font-weight:800;
            cursor:pointer;
            background:linear-gradient(135deg,#d8b4be,#9fb7c9);
            transition:0.25s;
        }

        .update-btn:hover{
            transform:translateY(-2px);
        }

        .customer{
            background:rgba(255,255,255,0.62);
            padding:16px 18px;
            border-radius:20px;
            margin-bottom:20px;
            color:#555;
            border:1px solid rgba(255,255,255,0.65);
        }

        .items{
            display:flex;
            flex-direction:column;
            gap:14px;
        }

        .item{
            display:grid;
            grid-template-columns:80px 1fr auto;
            gap:16px;
            align-items:center;
            background:rgba(255,255,255,0.58);
            border-radius:20px;
            padding:14px;
            border:1px solid rgba(255,255,255,0.55);
        }

        .item img{
            width:80px;
            height:58px;
            object-fit:cover;
            border-radius:14px;
        }

        .item h3{
            margin:0 0 5px;
            font-size:17px;
        }

        .item p{
            margin:0;
            color:#777;
            font-size:14px;
        }

        .price{
            font-weight:900;
            color:#d46f8d;
        }

        .total{
            text-align:right;
            margin-top:20px;
            font-size:24px;
            font-weight:900;
            background:linear-gradient(90deg,#ff5fa2,#8f8dff);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .empty{
            padding:60px;
            text-align:center;
            background:rgba(255,255,255,0.86);
            border-radius:28px;
            color:#777;
        }
    </style>
</head>

<body>

<div class="layout">

    <div class="sidebar">

        <div class="logo">
            <img src="/images/logo.png">
            <span>LootMarket</span>
        </div>

        <a href="/admin">Dashboard</a>
        <a href="/admin/products">Products</a>
        <a href="#">Categories</a>
        <a href="/admin/orders">Orders</a>
        <a href="#">Users</a>

    </div>

    <div class="content">

        <div class="page-title">
            <h1>Orders</h1>
        </div>

        @if($orders->count() > 0)

            <div class="orders">

                @foreach($orders as $order)

                    <div class="order-card">

                        <div class="order-top">
                            <div>
                                <div class="order-number">
                                    Order #LM-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                                </div>

                                <div class="meta">
                                    {{ $order->created_at->format('d M Y, H:i') }}
                                </div>
                            </div>

                            <form action="/admin/orders/update-status/{{ $order->id }}" method="POST" class="status-form">
                                @csrf

                                <input
                                    type="hidden"
                                    name="status"
                                    value="{{ $order->status }}"
                                    id="status-input-{{ $order->id }}"
                                >

                                <div class="custom-status">
                                    <button
                                        type="button"
                                        class="custom-status-btn"
                                        onclick="toggleStatusMenu({{ $order->id }})"
                                    >
            <span id="status-label-{{ $order->id }}">
                {{ $order->status }}
            </span>

                                        <span>⌄</span>
                                    </button>

                                    <div class="custom-status-menu" id="status-menu-{{ $order->id }}">
                                        <button type="button" onclick="selectStatus({{ $order->id }}, 'Pending')">
                                            Pending
                                        </button>

                                        <button type="button" onclick="selectStatus({{ $order->id }}, 'Processing')">
                                            Processing
                                        </button>

                                        <button type="button" onclick="selectStatus({{ $order->id }}, 'Delivered')">
                                            Delivered
                                        </button>

                                        <button type="button" onclick="selectStatus({{ $order->id }}, 'Cancelled')">
                                            Cancelled
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" class="update-btn">
                                    Update
                                </button>
                            </form>
                        </div>

                        <div class="customer">
                            <strong>Customer:</strong>
                            {{ $order->user->name ?? 'Unknown User' }}
                            —
                            {{ $order->user->email ?? 'No email' }}
                        </div>

                        <div class="items">

                            @foreach($order->items as $item)

                                <div class="item">
                                    <img src="{{ $item->product_image }}">

                                    <div>
                                        <h3>{{ $item->product_name }}</h3>
                                        <p>Quantity: {{ $item->quantity }}</p>
                                    </div>

                                    <div class="price">
                                        ${{ $item->price * $item->quantity }}
                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <div class="total">
                            Total: ${{ $order->total }}
                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                No orders yet.
            </div>

        @endif

    </div>

</div>
<script>
    function toggleStatusMenu(orderId) {
        document
            .querySelectorAll('.custom-status-menu')
            .forEach(menu => {
                if (menu.id !== 'status-menu-' + orderId) {
                    menu.classList.remove('show');
                }
            });

        document
            .getElementById('status-menu-' + orderId)
            .classList
            .toggle('show');
    }

    function selectStatus(orderId, status) {
        document.getElementById('status-input-' + orderId).value = status;
        document.getElementById('status-label-' + orderId).innerText = status;
        document.getElementById('status-menu-' + orderId).classList.remove('show');
    }

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-status')) {
            document
                .querySelectorAll('.custom-status-menu')
                .forEach(menu => menu.classList.remove('show'));
        }
    });
</script>
</body>
</html>
