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

        <a href="#">Orders</a>

        <a href="#">Users</a>

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
