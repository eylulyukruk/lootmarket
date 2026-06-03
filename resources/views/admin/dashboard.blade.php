<!DOCTYPE html>
<html>
<head>
    <title>LootMarket Admin</title>

    <style>

        body{
            margin:0;
            font-family:Arial,sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #fff7f8,
                    #f8f5f2,
                    #edf5f8
                );
        }

        .layout{
            display:flex;
            min-height:100vh;
        }

        .sidebar{

            width:300px;

            background:
                linear-gradient(
                    180deg,
                    #ffdfe8,
                    #f4dbe2,
                    #dbeaf1
                );

            padding:40px 24px;

            box-sizing:border-box;

            box-shadow:
                0 10px 40px rgba(0,0,0,0.08);

        }

        .admin-logo{
            font-size:26px;
            font-weight:800;
            color:#d46f8d;
            display:flex;
            align-items:center;
            margin-bottom:50px;
            text-decoration:none;
            background:transparent;
            padding:0;
            border-radius:0;
        }

        .admin-logo img{
            width:42px;
            height:42px;
            border-radius:14px;
            margin-right:14px;
        }

        .sidebar .admin-logo{
            background:transparent;
            padding:0;
            margin-bottom:50px;
        }

        .sidebar .admin-logo:hover{
            transform:none;
            background:transparent;
        }

        .sidebar a{

            display:block;

            padding:16px 20px;

            margin-bottom:14px;

            text-decoration:none;

            color:#3a3a3a;

            border-radius:18px;

            background:
                rgba(255,255,255,0.45);

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

        h1{
            font-size:42px;
            margin-bottom:40px;
        }

        .stats{

            display:grid;

            grid-template-columns:
            repeat(auto-fit,minmax(240px,1fr));

            gap:28px;
        }

        .card{

            background:
                rgba(255,255,255,0.85);

            padding:30px;

            border-radius:28px;

            box-shadow:
                0 15px 35px rgba(0,0,0,0.06);

            border:
                1px solid rgba(212,111,141,0.15);
        }

        .card h2{
            margin:0;
            font-size:20px;
            color:#777;
        }

        .number{

            font-size:52px;

            font-weight:800;

            margin-top:16px;

            color:#d46f8d;
        }
        .sidebar a.admin-logo{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:12px;

            padding:0;
            margin-bottom:50px;

            background:transparent;
            border-radius:0;

            text-decoration:none;
            color:#d46f8d;

            transform:none;
        }

        .sidebar a.admin-logo:hover{
            background:transparent;
            transform:none;
        }

        .sidebar a.admin-logo img{
            width:42px;
            height:42px;
            border-radius:14px;
            margin:0;
        }

        .sidebar a.admin-logo span{
            font-size:26px;
            font-weight:800;
            color:#d46f8d;
            letter-spacing:-0.5px;
        }
        .stats-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:22px;
            margin-bottom:42px;
        }

        .stat-card{
            display:flex;
            align-items:center;
            gap:18px;

            padding:26px;

            border-radius:28px;

            background:
                linear-gradient(
                    135deg,
                    rgb(255 225 238 / 0.92),
                    rgb(246 237 255 / 0.92),
                    rgb(220 234 253 / 0.92)
                );

            border:1px solid rgba(255,255,255,0.75);

            box-shadow:
                0 22px 55px rgba(160,170,255,0.14);

            transition:0.3s;
        }

        .stat-card:hover{
            transform:translateY(-5px);
            box-shadow:
                0 28px 70px rgba(160,170,255,0.22);
        }

        .stat-icon{
            width:58px;
            height:58px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:20px;

            font-size:28px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,126,182,0.35),
                    rgba(143,141,255,0.28)
                );
        }

        .stat-card h3{
            margin:0 0 8px;
            font-size:16px;
            color:#666;
        }

        .stat-card p{
            margin:0;
            font-size:30px;
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

        .recent-section{
            margin-top:20px;
        }

        .section-title h2{
            font-size:30px;
            margin-bottom:22px;
        }

        .recent-orders{
            display:flex;
            flex-direction:column;
            gap:16px;
        }

        .recent-order-card{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;

            padding:20px 24px;

            border-radius:24px;

            background:
                linear-gradient(
                    135deg,
                    rgb(255 235 245 / 0.88),
                    rgb(229 239 255 / 0.88)
                );

            border:1px solid rgba(255,255,255,0.75);

            box-shadow:
                0 16px 42px rgba(160,170,255,0.12);
        }

        .recent-order-card p{
            margin:6px 0 0;
            color:#777;
        }

        .recent-right{
            display:flex;
            align-items:center;
            gap:16px;
        }

        .status-badge{
            padding:8px 16px;
            border-radius:999px;
            color:white;
            font-weight:800;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );
        }

        .empty-box{
        .empty-box{
            padding:40px;
            border-radius:24px;
            background:rgba(255,255,255,0.75);
            color:#777;
            text-align:center;
        }

    </style>

</head>
<body>

<div class="layout">

    <div class="sidebar">

        <a href="/admin" class="admin-logo">
            <img src="/images/logo.png">
            <span>LootMarket</span>
        </a>

        <a href="/admin">Dashboard</a>
        <a href="/admin/products">Products</a>
        <a href="#">Categories</a>
        <a href="/admin/orders">Orders</a>
        <a href="/admin/users">Users</a>

    </div>

    <div class="content">

        <div class="page-title">
            <h1>Dashboard</h1>
        </div>

        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon">📦</div>
                <div>
                    <h3>Total Products</h3>
                    <p>{{ $totalProducts }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🧾</div>
                <div>
                    <h3>Total Orders</h3>
                    <p>{{ $totalOrders }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div>
                    <h3>Total Users</h3>
                    <p>{{ $totalUsers }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">💸</div>
                <div>
                    <h3>Total Revenue</h3>
                    <p>${{ $totalRevenue }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">⏳</div>
                <div>
                    <h3>Pending Orders</h3>
                    <p>{{ $pendingOrders }}</p>
                </div>
            </div>

        </div>

        <div class="recent-section">

            <div class="section-title">
                <h2>Recent Orders</h2>
            </div>

            @if($recentOrders->count() > 0)

                <div class="recent-orders">

                    @foreach($recentOrders as $order)

                        <div class="recent-order-card">

                            <div>
                                <strong>Order #LM-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</strong>

                                <p>
                                    {{ $order->user->name ?? 'Unknown User' }}
                                    —
                                    {{ $order->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>

                            <div class="recent-right">
                        <span class="status-badge">
                            {{ $order->status }}
                        </span>

                                <strong>${{ $order->total }}</strong>
                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-box">
                    No recent orders yet.
                </div>

            @endif

        </div>
    </div>

</div>

</body>
</html>
