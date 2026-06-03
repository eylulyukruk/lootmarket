<!DOCTYPE html>
<html>
<head>
    <title>Admin Products</title>

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
            margin-bottom:30px;
        }

        table{

            width:100%;

            border-collapse:collapse;

            background:
                rgba(255,255,255,0.88);

            border-radius:24px;

            overflow:hidden;

            box-shadow:
                0 15px 35px rgba(0,0,0,0.06);
        }

        th{

            background:#f4dbe2;

            padding:18px;

            text-align:left;
        }

        td{
            padding:18px;
            border-bottom:1px solid #eee;
        }

        tr:hover{
            background:#fff7fa;
        }

        .product-image{

            width:70px;
            height:70px;

            object-fit:cover;

            border-radius:16px;
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

        <div
            style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
    "
        >

            <h1>Products</h1>

            <a
                href="/admin/products/create"

                style="
            padding:16px 24px;
            border-radius:18px;
            text-decoration:none;
            color:white;
            font-weight:700;

            background:
            linear-gradient(
            135deg,
            #d8b4be,
            #9fb7c9
            );
        "
            >
                + Add Product
            </a>

        </div>

        <table>

            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Game / Brand</th>
                <th>Category</th>
                <th>Type</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>

            @foreach($products as $product)

                <tr>

                    <td>
                        <img
                            src="{{ $product->image }}"
                            class="product-image"
                        >
                    </td>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->game }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->type }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>

                        <div
                            style="
            display:flex;
            gap:10px;
        "
                        >

                            <a
                                href="/admin/products/edit/{{ $product->id }}"

                                style="
                padding:10px 16px;
                border-radius:12px;
                text-decoration:none;
                color:white;
                font-weight:700;

                background:
                linear-gradient(
                135deg,
                #d8b4be,
                #9fb7c9
                );
            "
                            >
                                Edit
                            </a>

                            <form action="/admin/products/delete/{{ $product->id }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"

                                    onclick="return confirm('Delete this product?')"

                                    style="
            padding:10px 16px;
            border-radius:12px;
            border:none;
            color:white;
            font-weight:700;
            cursor:pointer;

            background:
            linear-gradient(
            135deg,
            #f29ca3,
            #f07178
            );
        "
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @endforeach

        </table>

    </div>

</div>

</body>
</html>
