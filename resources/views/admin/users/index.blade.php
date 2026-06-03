<!DOCTYPE html>
<html>
<head>
    <title>Admin Users | LootMarket</title>

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

        .users-table{
            width:100%;
            border-collapse:collapse;
            background:
                linear-gradient(
                    135deg,
                    rgba(255,248,251,0.92),
                    rgba(248,244,252,0.92),
                    rgba(236,244,255,0.92)
                );
            border-radius:28px;
            overflow:hidden;
            box-shadow:0 22px 55px rgba(160,170,255,0.14);
            border:1px solid rgba(255,255,255,0.75);
        }

        th{
            background:rgba(255,220,235,0.65);
            padding:18px;
            text-align:left;
            color:#3a3a3a;
        }

        td{
            padding:18px;
            border-bottom:1px solid rgba(210,210,230,0.35);
        }

        tr:hover{
            background:rgba(255,255,255,0.45);
        }

        .role-badge{
            display:inline-block;
            padding:10px 18px;
            border-radius:999px;
            color: #ffffff;
            font-weight:800;
            font-size:15px;
            background:linear-gradient(135deg,#ff7eb6,#8f8dff);
        }

        .role-admin{
            background:
                linear-gradient(
                    135deg,
                    #ffa0c8,
                    #d6aaff
                );
        }

        .role-user{
            background:
                linear-gradient(
                    135deg,
                    #c8eaff,
                    #b0c2fb
                );
        }
        }
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

    </div>

    <div class="content">

        <div class="page-title">
            <h1>Users</h1>
        </div>

        <table class="users-table">

            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered Date</th>
            </tr>

            @foreach($users as $user)

                <tr>
                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        @php
                            $roleName = $user->roles->first()->name ?? 'user';
                        @endphp

                        <span class="role-badge {{ $roleName == 'admin' ? 'role-admin' : 'role-user' }}">
    {{ ucfirst($roleName) }}
</span>
                    </td>

                    <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                </tr>

            @endforeach

        </table>

    </div>

</div>

</body>
</html>
