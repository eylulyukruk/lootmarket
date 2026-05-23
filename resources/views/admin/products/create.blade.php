<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

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
        }

        .content{
            flex:1;
            padding:50px;
        }

        h1{
            font-size:42px;
            margin-bottom:30px;
        }

        form{

            background:
                rgba(255,255,255,0.9);

            padding:40px;

            border-radius:28px;

            max-width:700px;

            box-shadow:
                0 15px 35px rgba(0,0,0,0.06);
        }

        input{

            width:100%;

            padding:18px;

            margin-bottom:20px;

            border-radius:16px;

            border:1px solid #eee;

            font-size:16px;

            box-sizing:border-box;
        }

        button{

            padding:16px 26px;

            border:none;

            border-radius:18px;

            cursor:pointer;

            font-size:16px;

            font-weight:700;

            color:white;

            background:
                linear-gradient(
                    135deg,
                    #d8b4be,
                    #9fb7c9
                );
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

        <h1>Add Product</h1>

        <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="name" placeholder="Product Name">

            <input type="text" name="game" placeholder="Game / Brand">

            <input type="text" name="category" placeholder="Category">

            <input type="text" name="type" placeholder="Type">

            <input type="file" name="image" accept="image/*">

            <input type="number" step="0.01" name="price" placeholder="Price">

            <input type="number" name="stock" placeholder="Stock">

            <input type="text" name="description" placeholder="Description">

            <button>
                Add Product
            </button>

        </form>

    </div>

</div>

</body>
</html>
