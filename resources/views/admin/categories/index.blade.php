<!DOCTYPE html>
<html>
<head>
    <title>Admin Categories | LootMarket</title>

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

        .admin-logo{
            font-size:25px;
            font-weight:800;
            color:#d46f8d;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:12px;
            margin-bottom:50px;
            text-decoration:none;
            background:transparent;
            padding:0;
            border-radius:0;
        }

        .admin-logo img{
            width:38px;
            height:38px;
            border-radius:14px;
            margin:0;
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

        .sidebar a.admin-logo{
            display:flex;
            background:transparent;
            padding:0;
            margin-bottom:50px;
        }

        .sidebar a.admin-logo:hover{
            transform:none;
            background:transparent;
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

        .category-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
            gap:24px;
        }

        .category-card{
            padding:28px;
            border-radius:30px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,248,251,0.92),
                    rgba(248,244,252,0.92),
                    rgba(236,244,255,0.92)
                );

            border:1px solid rgba(255,255,255,0.75);

            box-shadow:
                0 22px 55px rgba(160,170,255,0.14);

            transition:0.3s;
        }

        .category-card:hover{
            transform:translateY(-5px);
            box-shadow:
                0 28px 70px rgba(160,170,255,0.22);
        }

        .category-icon{
            width:58px;
            height:58px;
            border-radius:20px;

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:28px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,126,182,0.35),
                    rgba(143,141,255,0.28)
                );

            margin-bottom:18px;
        }

        .category-card h2{
            font-size:25px;
            margin:0 0 18px;
            color:#d46f8d;
        }

        .category-stats{
            display:flex;
            flex-direction:column;
            gap:12px;
        }

        .stat-row{
            display:flex;
            justify-content:space-between;
            padding:12px 14px;
            border-radius:16px;
            background:rgba(255,255,255,0.55);
            color:#555;
            font-weight:700;
        }

        .stat-row strong{
            color:#d46f8d;
        }

        .view-products{
            display:inline-block;
            margin-top:22px;
            padding:13px 20px;
            border-radius:18px;
            text-decoration:none;
            color:white;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            box-shadow:
                0 12px 28px rgba(170,160,255,0.22);
        }

        .empty{
            padding:60px;
            text-align:center;
            background:rgba(255,255,255,0.86);
            border-radius:28px;
            color:#777;
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
        <a href="/admin/categories">Categories</a>
        <a href="/admin/orders">Orders</a>
        <a href="/admin/users">Users</a>
        <div class="admin-profile-box">
            <div class="admin-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div>
                <strong>{{ auth()->user()->name }}</strong>
                <span>Admin Panel</span>
            </div>
        </div>

        <form action="/logout" method="POST" class="admin-logout-form">
            @csrf

            <button type="submit" class="admin-logout-btn">
                Logout
            </button>
        </form>

    </div>

    <div class="content">

        <div class="page-title">
            <h1>Categories</h1>
        </div>

        @if($categories->count() > 0)

            <div class="category-grid">

                @foreach($categories as $category)

                    <div class="category-card">

                        <div class="category-icon">
                            @if($category->category == 'Skins')
                                🎨
                            @elseif($category->category == 'Knives')
                                🗡️
                            @elseif($category->category == 'Gift Cards')
                                💳
                            @elseif($category->category == 'Game Currency')
                                🎮
                            @elseif($category->category == 'Gaming Setup')
                                🖥️
                            @elseif($category->category == 'Setup Decor')
                                ✨
                            @elseif($category->category == 'Streaming Gear')
                                🎙️
                            @else
                                📦
                            @endif
                        </div>

                        <h2>{{ $category->category }}</h2>

                        <div class="category-stats">

                            <div class="stat-row">
                                <span>Products</span>
                                <strong>{{ $category->product_count }}</strong>
                            </div>

                            <div class="stat-row">
                                <span>Total Stock</span>
                                <strong>{{ $category->total_stock }}</strong>
                            </div>

                            <div class="stat-row">
                                <span>Average Price</span>
                                <strong>${{ number_format($category->average_price, 2) }}</strong>
                            </div>

                        </div>

                        <a
                            href="/admin/products?category={{ urlencode($category->category) }}"
                            class="view-products"
                        >
                            View Products
                        </a>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                No categories found.
            </div>

        @endif

    </div>

</div>

</body>
</html>
