<div class="sidebar">

    <a href="/admin" class="admin-logo">
        <img src="/images/logo.png" alt="LootMarket">
        <span>LootMarket</span>
    </a>

    <a href="/admin">Dashboard</a>
    <a href="/admin/products">Products</a>
    <a href="/admin/categories">Categories</a>
    <a href="/admin/orders">Orders</a>
    <a href="/admin/users">Users</a>
    <a href="/admin/support-messages">Messages</a>

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
