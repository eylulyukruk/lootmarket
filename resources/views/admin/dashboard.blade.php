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


        .admin-profile-box{
            margin-top:34px;
            padding:18px;

            display:flex;
            align-items:center;
            gap:14px;

            border-radius:22px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.58),
                    rgba(235,242,255,0.58)
                );

            border:1px solid rgba(255,255,255,0.65);
        }

        .admin-avatar{
            width:44px;
            height:44px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:50%;

            color:white;
            font-weight:900;
            font-size:19px;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );
        }

        .admin-profile-box strong{
            display:block;
            color:#2f2f3a;
            font-size:15px;
        }

        .admin-profile-box span{
            display:block;
            color:#777;
            font-size:13px;
            margin-top:3px;
        }

        .admin-logout-form{
            margin:14px 0 0;
        }

        .admin-logout-btn{
            width:100%;

            padding:15px 20px;

            border:none;
            border-radius:18px;

            color:white;
            font-weight:900;
            font-size:15px;

            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    #ff8aa5,
                    #f05f7f
                );

            box-shadow:
                0 12px 28px rgba(240,95,127,0.18);

            transition:0.25s;
        }

        .admin-logout-btn:hover{
            transform:translateY(-3px);
        }

        .empty-box{
            padding:40px;
            border-radius:24px;
            background:rgba(255,255,255,0.75);
            color:#777;
            text-align:center;
        }

        .admin-profile-box{
            margin-top:34px;
            padding:18px;

            display:flex;
            align-items:center;
            gap:14px;

            border-radius:22px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.58),
                    rgba(235,242,255,0.58)
                );

            border:1px solid rgba(255,255,255,0.65);
        }

        .admin-avatar{
            width:44px;
            height:44px;

            min-width:44px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:50%;

            color:white;
            font-weight:900;
            font-size:19px;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );
        }

        .admin-profile-box strong{
            display:block;
            color:#2f2f3a;
            font-size:15px;
        }

        .admin-profile-box span{
            display:block;
            color:#777;
            font-size:13px;
            margin-top:3px;
        }

        .admin-logout-form{
            margin:14px 0 0;
        }

        .admin-logout-btn{
            width:100%;

            padding:15px 20px;

            border:none;
            border-radius:18px;

            color:white;
            font-weight:900;
            font-size:15px;

            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    #ff8aa5,
                    #f05f7f
                );

            box-shadow:
                0 12px 28px rgba(240,95,127,0.18);

            transition:0.25s;
        }

        .admin-logout-btn:hover{
            transform:translateY(-3px);
        }
        .sales-section{
            margin-top:20px;
        }

        .section-title h2{
            font-size:34px;
            margin:0 0 22px;
            color:#2f2f3a;
        }

        .sales-chart-card{
            padding:32px;

            border-radius:32px;

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
        }

        .sales-chart-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
            margin-bottom:26px;
        }

        .sales-chart-header h3{
            margin:0 0 7px;
            font-size:23px;
            color:#2f2f3a;
        }

        .sales-chart-header p{
            margin:0;
            color:#777;
            font-size:15px;
        }

        .sales-chart-header strong{
            font-size:34px;
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

        .chart-wrapper{
            height:330px;
            padding:18px;

            border-radius:24px;

            background:rgba(255,255,255,0.48);

            border:1px solid rgba(255,255,255,0.65);
        }

        #salesChart{
            width:100%;
            height:100%;
        }
        .support-preview-section{
            margin-top:34px;
        }

        .support-preview-card{
            padding:28px;
            border-radius:30px;

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
        }

        .support-preview-list{
            display:flex;
            flex-direction:column;
            gap:16px;
        }

        .support-preview-item{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;

            padding:18px 20px;

            border-radius:22px;

            background:rgba(255,255,255,0.56);

            border:1px solid rgba(255,255,255,0.70);
        }

        .support-preview-item strong{
            display:block;
            margin-bottom:6px;
            color:#d46f8d;
            font-size:17px;
        }

        .support-preview-item p{
            margin:0;
            color:#777;
            line-height:1.5;
        }

        .message-status{
            flex-shrink:0;

            padding:8px 15px;

            border-radius:999px;

            color:white;
            font-size:13px;
            font-weight:900;
        }

        .message-open{
            background:
                linear-gradient(
                    135deg,
                    #ff9fc5,
                    #a892ff
                );
        }

        .message-answered{
            background:
                linear-gradient(
                    135deg,
                    #69d6ad,
                    #73aef5
                );
        }

        .view-messages-btn{
            display:inline-block;

            margin-top:22px;

            padding:14px 22px;

            border-radius:18px;

            color:white;
            text-decoration:none;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff62a9,
                    #7d8fff
                );

            box-shadow:
                0 14px 34px rgba(150,130,255,0.24);
        }
        .dashboard-management-grid{
            display:grid;
            grid-template-columns:repeat(2,minmax(0,1fr));
            gap:26px;
            margin-bottom:42px;
        }

        .dashboard-panel{
            min-width:0;
            padding:28px;

            border-radius:30px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,225,238,0.92),
                    rgba(246,237,255,0.92),
                    rgba(220,234,253,0.92)
                );

            border:1px solid rgba(255,255,255,0.75);

            box-shadow:
                0 22px 55px rgba(160,170,255,0.14);
        }

        .panel-header{
            display:flex;
            align-items:flex-start;
            justify-content:space-between;
            gap:20px;
            margin-bottom:22px;
        }

        .panel-header h2{
            margin:0 0 7px;
            color:#2f2f3a;
            font-size:25px;
        }

        .panel-header p{
            margin:0;
            color:#77778a;
            font-size:14px;
            line-height:1.5;
        }

        .panel-link{
            flex-shrink:0;

            padding:11px 16px;
            border-radius:16px;

            color:white;
            text-decoration:none;
            font-size:13px;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            box-shadow:
                0 11px 26px rgba(160,145,255,0.22);

            transition:0.24s;
        }

        .panel-link:hover{
            transform:translateY(-2px);
        }

        .stock-product-list,
        .latest-order-list{
            display:flex;
            flex-direction:column;
            gap:13px;
        }

        .stock-product-item,
        .latest-order-item{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:18px;

            padding:15px 17px;
            border-radius:21px;

            background:rgba(255,255,255,0.58);
            border:1px solid rgba(255,255,255,0.72);
        }

        .stock-product-main{
            min-width:0;

            display:flex;
            align-items:center;
            gap:13px;
        }

        .stock-product-main div:last-child{
            min-width:0;
        }

        .stock-product-image,
        .stock-product-placeholder{
            width:58px;
            height:48px;
            min-width:58px;

            border-radius:14px;
        }

        .stock-product-image{
            object-fit:cover;
        }

        .stock-product-placeholder{
            display:flex;
            align-items:center;
            justify-content:center;

            font-size:22px;
            background:rgba(255,255,255,0.70);
        }

        .stock-product-main strong{
            display:block;

            max-width:210px;

            color:#3f3f4d;
            font-size:15px;

            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
        }

        .stock-product-main span{
            display:block;
            margin-top:5px;

            color:#7a7a88;
            font-size:13px;
        }

        .stock-product-actions{
            flex-shrink:0;

            display:flex;
            align-items:center;
            gap:9px;
        }

        .stock-value{
            padding:8px 11px;
            border-radius:999px;

            font-size:12px;
            font-weight:900;
            white-space:nowrap;
        }

        .stock-low{
            color:#a66a00;
            background:rgba(255,194,74,0.22);
        }

        .stock-empty{
            color:#b03d5c;
            background:rgba(240,82,103,0.17);
        }

        .quick-edit-button{
            padding:8px 12px;
            border-radius:13px;

            color:#7652cf;
            text-decoration:none;
            font-size:12px;
            font-weight:900;

            background:rgba(225,218,255,0.70);
        }

        .latest-order-main{
            min-width:0;
        }

        .latest-order-main strong{
            display:block;
            color:#d46f8d;
            font-size:15px;
        }

        .latest-order-main span{
            display:block;

            max-width:220px;
            margin-top:5px;

            color:#555563;
            font-size:14px;

            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
        }

        .latest-order-main small{
            display:block;
            margin-top:5px;

            color:#90909d;
            font-size:12px;
        }

        .latest-order-right{
            flex-shrink:0;

            display:flex;
            flex-direction:column;
            align-items:flex-end;
            gap:8px;
        }

        .order-status{
            padding:7px 11px;
            border-radius:999px;

            color:white;
            font-size:11px;
            font-weight:900;
        }

        .status-pending{
            background:linear-gradient(135deg,#ff9fc5,#a892ff);
        }

        .status-processing{
            background:linear-gradient(135deg,#8c9cff,#6ec9ef);
        }

        .status-shipped{
            background:linear-gradient(135deg,#69cbe1,#658ff1);
        }

        .status-delivered,
        .status-completed{
            background:linear-gradient(135deg,#62d4a8,#68aef2);
        }

        .status-cancelled{
            background:linear-gradient(135deg,#ff7a92,#d94a69);
        }

        .latest-order-total{
            color:#d46f8d;
            font-size:15px;
        }

        .warning-stat{
            border-color:rgba(255,181,34,0.22);
        }

        .danger-stat{
            border-color:rgba(240,82,103,0.22);
        }

        @media(max-width:1150px){
            .dashboard-management-grid{
                grid-template-columns:1fr;
            }
        }

        @media(max-width:700px){
            .content{
                padding:28px 18px;
            }

            .panel-header,
            .stock-product-item,
            .latest-order-item{
                align-items:flex-start;
                flex-direction:column;
            }

            .stock-product-actions,
            .latest-order-right{
                width:100%;
                align-items:center;
                flex-direction:row;
                justify-content:space-between;
            }
        }
        .stat-card{
            min-width:0;
        }

        .stat-content{
            flex:1;
            min-width:0;
        }

        .revenue-card{
            grid-column:span 2;
        }

        .revenue-card .stat-content{
            flex:1;
            min-width:0;
        }

        .revenue-card p{
            font-size:38px;
            line-height:1.05;
            letter-spacing:-1px;
            white-space:nowrap;
        }

        @media(max-width:900px){
            .revenue-card{
                grid-column:span 1;
            }

            .revenue-card p{
                font-size:28px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="layout">

    @include('admin.partials.sidebar')

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

            <div class="stat-card revenue-card">
                <div class="stat-icon">💸</div>

                <div class="stat-content">
                    <h3>Total Revenue</h3>

                    <p>
                        ${{ number_format($totalRevenue, 2) }}
                    </p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">⏳</div>
                <div>
                    <h3>Pending Orders</h3>
                    <p>{{ $pendingOrders }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">💬</div>
                <div>
                    <h3>Open Messages</h3>
                    <p>{{ $openMessages }}</p>
                </div>
            </div>
            <div class="stat-card warning-stat">
                <div class="stat-icon">⚠️</div>

                <div>
                    <h3>Low Stock Products</h3>
                    <p>{{ $lowStockCount }}</p>
                </div>
            </div>

            <div class="stat-card danger-stat">
                <div class="stat-icon">🚫</div>

                <div>
                    <h3>Out of Stock</h3>
                    <p>{{ $outOfStockCount }}</p>
                </div>
            </div>

        </div>
        <div class="dashboard-management-grid">

            <div class="dashboard-panel">

                <div class="panel-header">
                    <div>
                        <h2>Low Stock Products</h2>

                        <p>
                            Products with five or fewer items remaining.
                        </p>
                    </div>

                    <a href="/admin/products" class="panel-link">
                        View Products
                    </a>
                </div>

                @if($lowStockProducts->count() > 0)

                    <div class="stock-product-list">

                        @foreach($lowStockProducts as $product)

                            <div class="stock-product-item">

                                <div class="stock-product-main">

                                    @if($product->image)
                                        <img
                                            src="{{ $product->image }}"
                                            alt="{{ $product->name }}"
                                            class="stock-product-image"
                                        >
                                    @else
                                        <div class="stock-product-placeholder">
                                            📦
                                        </div>
                                    @endif

                                    <div>
                                        <strong>{{ $product->name }}</strong>

                                        <span>
                                    {{ $product->game ?: 'No game / brand' }}
                                </span>
                                    </div>

                                </div>

                                <div class="stock-product-actions">

                            <span
                                class="stock-value
                                {{ $product->stock <= 0 ? 'stock-empty' : 'stock-low' }}"
                            >
                                @if($product->stock <= 0)
                                    Out of Stock
                                @else
                                    {{ $product->stock }} Left
                                @endif
                            </span>

                                    <a
                                        href="/admin/products/edit/{{ $product->id }}"
                                        class="quick-edit-button"
                                    >
                                        Edit
                                    </a>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-box">
                        All products currently have sufficient stock.
                    </div>

                @endif

            </div>

            <div class="dashboard-panel">

                <div class="panel-header">
                    <div>
                        <h2>Latest Orders</h2>

                        <p>
                            The five most recently placed customer orders.
                        </p>
                    </div>

                    <a href="/admin/orders" class="panel-link">
                        View Orders
                    </a>
                </div>

                @if($latestOrders->count() > 0)

                    <div class="latest-order-list">

                        @foreach($latestOrders as $order)

                            @php
                                $statusClass = strtolower($order->status);
                            @endphp

                            <div class="latest-order-item">

                                <div class="latest-order-main">

                                    <strong>
                                        Order #LM-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                                    </strong>

                                    <span>
                                {{ $order->name ?? $order->user->name ?? 'Unknown Customer' }}
                            </span>

                                    <small>
                                        {{ $order->created_at->format('d M Y, H:i') }}
                                    </small>

                                </div>

                                <div class="latest-order-right">

                            <span class="order-status status-{{ $statusClass }}">
                                {{ $order->status }}
                            </span>

                                    <strong class="latest-order-total">
                                        ${{ number_format($order->total, 2) }}
                                    </strong>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-box">
                        No orders have been placed yet.
                    </div>

                @endif

            </div>

        </div>

        <div class="sales-section">

            <div class="section-title">
                <h2>Sales Value</h2>
            </div>

            <div class="sales-chart-card">

                <div class="sales-chart-header">
                    <div>
                        <h3>Monthly Revenue</h3>
                        <p>Revenue trend based on customer orders.</p>
                    </div>

                    <strong>${{ number_format($totalRevenue, 2) }}</strong>
                </div>

                <div class="chart-wrapper">
                    <canvas id="salesChart"></canvas>
                </div>

            </div>

        </div>
        <div class="support-preview-section">

            <div class="section-title">
                <h2>Support Messages</h2>
            </div>

            <div class="support-preview-card">

                @if($latestMessages->count() > 0)

                    <div class="support-preview-list">

                        @foreach($latestMessages as $message)

                            <div class="support-preview-item">

                                <div>
                                    <strong>{{ $message->subject }}</strong>

                                    <p>
                                        {{ $message->user->name ?? 'Unknown User' }}
                                        —
                                        {{ \Illuminate\Support\Str::limit($message->message, 70) }}
                                    </p>
                                </div>

                                <span class="message-status {{ $message->status === 'Answered' ? 'message-answered' : 'message-open' }}">
                            {{ $message->status }}
                        </span>

                            </div>

                        @endforeach

                    </div>

                    <a href="/admin/support-messages" class="view-messages-btn">
                        View All Messages
                    </a>

                @else

                    <div class="empty-box">
                        No support messages yet.
                    </div>

                @endif

            </div>

        </div>
    </div>

</div>
<script>
    const salesCtx = document.getElementById('salesChart');

    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: @json($monthLabels),
            datasets: [{
                label: 'Sales Value',
                data: @json($salesValues),
                tension: 0.25,
                fill: true,
                borderWidth: 4,
                pointRadius: 5,
                pointHoverRadius: 7,
                borderColor: '#ff5fa2',
                backgroundColor: 'rgba(255, 126, 182, 0.18)',
                pointBackgroundColor: '#8f8dff',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Sales: $' + context.raw;
                        }
                    }
                }
            },

            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value;
                        }
                    },
                    grid: {
                        color: 'rgba(160,170,255,0.18)'
                    }
                },

                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
</body>
</html>
