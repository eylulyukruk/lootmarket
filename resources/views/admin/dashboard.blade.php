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

        .logo{
            font-size:28px;
            font-weight:800;
            color:#d46f8d;

            display:flex;
            align-items:center;

            margin-bottom:50px;
        }

        .logo img{
            width:60px;
            height:60px;
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

        <h1>Admin Dashboard</h1>

        <div class="stats">

            <div class="card">

                <h2>Total Products</h2>

                <div class="number">
                    {{ $productCount }}
                </div>

            </div>

            <div class="card">

                <h2>Total Users</h2>

                <div class="number">
                    {{ $userCount }}
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
