<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>
<style>
    .navbar {
        padding: 24px 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;

        background:
            linear-gradient(
                90deg,
                rgba(255,235,245,0.9),
                rgba(235,242,255,0.9)
            );

        backdrop-filter: blur(18px);
        box-shadow: 0 10px 35px rgba(212,111,141,0.10);
        border-bottom: 1px solid rgba(212,111,141,0.18);
        position: sticky;
        top: 0;
        z-index: 9999;
    }

    .logo {
        font-size: 30px;
        font-weight: 800;
        color: #d46f8d;
        display: flex;
        align-items: center;
        letter-spacing: -1px;
        text-decoration: none;
    }

    .logo img {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        margin-right: 12px;
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 26px;
    }

    .nav-links a {
        text-decoration: none;
        color: #3a3a3a;
        font-weight: 600;
    }

    .account-dropdown {
        position: relative;
    }

    .account-button {
        border: none;
        background: transparent;
        color: #3a3a3a;
        font-weight: 700;
        cursor: pointer;
        font-size: 16px;
        padding: 10px 0;
    }

    .account-button.active {
        color: #d46f8d;
    }

    .account-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 42px;

        width: 240px;
        padding: 18px;
        border-radius: 28px;

        background:
            linear-gradient(
                180deg,
                rgba(255,240,247,0.97),
                rgba(232,240,255,0.97)
            );

        backdrop-filter: blur(24px);
        border: 1px solid rgba(255,255,255,0.7);
        box-shadow: 0 18px 55px rgba(170,180,255,0.22);
        z-index: 10000;
    }

    .account-menu.show {
        display: block;
    }

    .profile-top {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .profile-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        color: white;
        font-size: 22px;
        font-weight: 800;

        background:
            linear-gradient(
                135deg,
                #ff5fa2,
                #9a8cff
            );
    }

    .profile-name {
        color: #f05fa5;
        font-size: 17px;
        font-weight: 800;
    }

    .profile-welcome {
        color: #777;
        font-size: 13px;
        margin-top: 3px;
    }

    .account-item {
        display: flex;
        align-items: center;
        gap: 12px;

        padding: 12px 14px;
        border-radius: 16px;

        color: #3f3f52;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;

        transition: 0.22s;
    }

    .account-item:hover {
        background: rgba(255,255,255,0.65);
    }

    .account-icon {
        width: 24px;
        color: #f05fa5;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .account-divider {
        height: 1px;
        background: rgba(210,210,230,0.45);
        margin: 12px 0;
    }

    .logout-form {
        margin: 0;
    }

    .logout-button {
        width: 100%;
        border: none;
        background: transparent;
        cursor: pointer;
        text-align: left;
        font-family: Arial, sans-serif;
    }
    .cart-nav-link{
        display:flex;
        align-items:center;
        gap:9px;

        padding:0;

        background:transparent;
        border:none;
        box-shadow:none;

        color:#3a3a3a;
        text-decoration:none;

        transition:0.22s;
    }

    .cart-nav-link:hover{
        transform:none;
        background:transparent;
        box-shadow:none;
        color:#d46f8d;
    }

    .cart-icon-wrap{
        position:relative;

        width:auto;
        height:auto;

        display:flex;
        align-items:center;
        justify-content:center;

        border-radius:0;

        color:#d46f8d;
        font-size:20px;

        background:transparent;
    }

    .cart-count{
        position:absolute;
        top:-12px;
        right:-13px;

        min-width:18px;
        height:18px;

        display:flex;
        align-items:center;
        justify-content:center;

        padding:0 4px;

        border-radius:999px;

        color:white;
        font-size:11px;
        font-weight:900;

        background:
            linear-gradient(
                135deg,
                #ff5fa2,
                #8f8dff
            );

        border:2px solid #f1efff;
        box-sizing:border-box;
    }

    .cart-details{
        display:flex;
        align-items:center;
        gap:6px;
    }

    .cart-title{
        color:inherit;
        font-size:16px;
        font-weight:700;
    }

    .cart-total{
        color:#d46f8d;
        font-size:13px;
        font-weight:800;
    }

    .cart-nav-link:hover .cart-title,
    .cart-nav-link:hover .cart-icon-wrap{
        color:#d46f8d;
    }

    @media(max-width:750px){
        .navbar{
            padding:18px 20px;
        }

        .nav-links{
            gap:14px;
        }

        .cart-details{
            display:none;
        }
    }
</style>

@php
    $navbarCart = session()->get('cart', []);

    $navbarCartCount = 0;
    $navbarCartTotal = 0;

    foreach ($navbarCart as $cartItem) {
        $quantity = (int) ($cartItem['quantity'] ?? 0);
        $price = (float) ($cartItem['price'] ?? 0);

        $navbarCartCount += $quantity;
        $navbarCartTotal += $price * $quantity;
    }
@endphp

<nav class="navbar">
    <a href="/products" class="logo">
        <img src="/images/logo.png">
        <span>LootMarket</span>
    </a>

    <div class="nav-links">
        <a href="/products">Products</a>
        <a href="/cart" class="cart-nav-link">
    <span class="cart-icon-wrap">
        <i class="fa-solid fa-cart-shopping"></i>

        <span class="cart-count">
            {{ $navbarCartCount }}
        </span>
    </span>

            <span class="cart-details">
        <span class="cart-title">Cart</span>

        <span class="cart-total">
            ${{ number_format($navbarCartTotal, 2) }}
        </span>
    </span>
        </a>

        @auth
            <div class="account-dropdown">
                <button type="button" class="account-button" id="accountButton">
                    Account ▼
                </button>

                <div class="account-menu" id="accountMenu">
                    <div class="profile-top">
                        <div class="profile-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <div class="profile-name">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="profile-welcome">
                                Welcome back!
                            </div>
                        </div>
                    </div>

                    <a href="/my-orders" class="account-item">
                        <span class="account-icon">
    <i class="fa-solid fa-box-open"></i>
</span>
                        My Orders
                    </a>

                    <a href="/wishlist" class="account-item">
    <span class="account-icon">
        <i class="fa-regular fa-heart"></i>
    </span>
                        Wishlist
                    </a>

                    <a href="/support-messages" class="account-item">
    <span class="account-icon">
        <i class="fa-regular fa-message"></i>
    </span>
                        Support Messages
                    </a>

                    <a href="/profile" class="account-item">
                        <span class="account-icon">
    <i class="fa-solid fa-gear"></i>
</span>
                        Account Settings
                    </a>

                    <div class="account-divider"></div>

                    <form action="/logout" method="POST" class="logout-form">
                        @csrf

                        <button type="submit" class="account-item logout-button">
                            <span class="account-icon">
    <i class="fa-solid fa-right-from-bracket"></i>
</span>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const button = document.getElementById("accountButton");
        const menu = document.getElementById("accountMenu");

        if (button && menu) {
            button.addEventListener("click", function (event) {
                event.stopPropagation();
                menu.classList.toggle("show");
                button.classList.toggle("active");
            });

            menu.addEventListener("click", function (event) {
                event.stopPropagation();
            });

            document.addEventListener("click", function () {
                menu.classList.remove("show");
                button.classList.remove("active");
            });
        }
    });
</script>
