<!DOCTYPE html>
<html>
<head>
    <title>Wishlist | LootMarket</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            color:#2f2f3a;
            min-height:100vh;

            background:
                radial-gradient(circle at 8% 18%, rgba(255,145,210,0.35), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120,165,255,0.32), transparent 24%),
                radial-gradient(circle at 50% 95%, rgba(255,210,235,0.45), transparent 30%),
                linear-gradient(135deg,#ffe9f7,#efe5ff,#dceeff);
        }

        .page{
            max-width:1200px;
            margin:60px auto;
            padding:0 40px;
        }

        .header{
            text-align:center;
            margin-bottom:45px;
        }

        .header h1{
            font-size:54px;
            margin:0 0 12px;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #c078ff,
                    #7f9cff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .header p{
            color:#6f6f80;
            font-size:17px;
        }

        .wishlist-grid{
            display:grid;
            grid-template-columns:repeat(auto-fill, minmax(260px, 300px));
            gap:28px;
            justify-content:center;
        }

        .wishlist-card{
            background:rgba(255,255,255,0.68);
            backdrop-filter:blur(24px);
            border:1px solid rgba(255,255,255,0.72);
            border-radius:30px;
            overflow:hidden;

            box-shadow:
                0 24px 70px rgba(160,170,255,0.18);

            transition:0.35s;
        }

        .wishlist-card:hover{
            transform:translateY(-8px);
            box-shadow:
                0 32px 85px rgba(160,170,255,0.26);
        }

        .wishlist-image{
            width:100%;
            height:180px;
            object-fit:cover;
        }

        .wishlist-content{
            padding:24px;
        }

        .badge{
            display:inline-block;
            padding:8px 16px;
            border-radius:999px;
            color:white;
            font-size:13px;
            font-weight:800;
            margin-bottom:14px;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );
        }

        .wishlist-content h2{
            font-size:23px;
            margin:8px 0 12px;
        }

        .price{
            font-size:26px;
            font-weight:900;
            margin:16px 0;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .actions{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
            margin-top:18px;
        }

        .view-btn,
        .remove-btn{
            padding:13px 18px;
            border-radius:16px;
            border:none;
            text-decoration:none;
            color:white;
            font-weight:900;
            cursor:pointer;
            font-size:14px;
        }

        .view-btn{
            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );
        }

        .remove-btn{
            background:
                linear-gradient(
                    135deg,
                    #ff8aa5,
                    #f05f7f
                );
        }

        .empty{
            text-align:center;
            padding:70px 30px;
            background:rgba(255,255,255,0.68);
            backdrop-filter:blur(24px);
            border-radius:32px;

            box-shadow:
                0 24px 70px rgba(160,170,255,0.18);
        }

        .empty h2{
            color:#d46f8d;
            font-size:34px;
            margin-bottom:10px;
        }

        .empty p{
            color:#777;
        }

        .shop-btn{
            display:inline-block;
            margin-top:22px;
            padding:16px 26px;
            border-radius:20px;
            text-decoration:none;
            color:white;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff62a9,
                    #7d8fff
                );
        }
    </style>
</head>

<body>

@include('partials.navbar')

<div class="page">

    <div class="header">
        <h1>Wishlist</h1>
        <p>Your saved LootMarket favorites are waiting here.</p>
    </div>

    @if($wishlistItems->count() > 0)

        <div class="wishlist-grid">

            @foreach($wishlistItems as $wishlistItem)

                @if($wishlistItem->product)

                    <div class="wishlist-card">

                        <img
                            src="{{ $wishlistItem->product->image }}"
                            class="wishlist-image"
                            alt="{{ $wishlistItem->product->name }}"
                        >

                        <div class="wishlist-content">

                            <span class="badge">
                                {{ $wishlistItem->product->category }}
                            </span>

                            <h2>{{ $wishlistItem->product->name }}</h2>

                            <div class="price">
                                ${{ $wishlistItem->product->price }}
                            </div>

                            <div class="actions">

                                <a
                                    href="/products/{{ $wishlistItem->product->id }}"
                                    class="view-btn"
                                >
                                    View Item
                                </a>

                                <form
                                    action="/wishlist/toggle/{{ $wishlistItem->product->id }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button type="submit" class="remove-btn">
                                        Remove
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                @endif

            @endforeach

        </div>

    @else

        <div class="empty">
            <h2>Your wishlist is empty</h2>
            <p>Save your favorite skins, gift cards, and gaming gear here.</p>

            <a href="/products" class="shop-btn">
                Explore Products
            </a>
        </div>

    @endif

</div>

</body>
</html>
