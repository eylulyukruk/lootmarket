<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }} | LootMarket</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            color:#2f2f3a;
            min-height:100vh;
            background:
                radial-gradient(circle at 8% 18%, rgba(255, 145, 210, 0.35), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120, 165, 255, 0.32), transparent 24%),
                radial-gradient(circle at 50% 95%, rgba(255, 210, 235, 0.45), transparent 30%),
                linear-gradient(135deg, #ffe9f7, #efe5ff, #dceeff);
        }

        .navbar{
            padding:24px 60px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            background:linear-gradient(90deg,rgba(255,235,245,0.9),rgba(235,242,255,0.9));
            backdrop-filter:blur(18px);
            border-bottom:1px solid rgba(212,111,141,0.16);
            position:sticky;
            top:0;
            z-index:100;
        }

        .logo{
            font-size:30px;
            font-weight:800;
            color:#d46f8d;
            display:flex;
            align-items:center;
        }

        .logo img{
            width:52px;
            height:52px;
            border-radius:16px;
            margin-right:12px;
        }

        .nav-links a{
            margin-left:26px;
            text-decoration:none;
            color:#2f2f3a;
            font-weight:600;
        }

        .page{
            max-width:1420px;
            margin:70px auto;
            padding:0 40px;
        }

        .detail-card{
            display:grid;
            grid-template-columns:1.1fr 0.9fr;
            gap:54px;
            padding:42px;
            border-radius:36px;
            background:rgba(255,255,255,0.62);
            backdrop-filter:blur(24px);
            border:1px solid rgba(255,255,255,0.75);
            box-shadow:0 30px 80px rgba(160,170,255,0.20);
            position: relative;
            z-index: 2;
            transition:0.35s;
        }
        .detail-card:hover{

            transform:translateY(-4px);

            box-shadow:
                0 35px 90px rgba(160,170,255,0.22);
        }

        .image-box{
            background:rgba(255,255,255,0.75);
            border-radius:30px;
            padding:22px;
            box-shadow:inset 0 0 35px rgba(200,190,255,0.10);
            position:relative;
            overflow:hidden;
        }
        .image-box::before{

            content:"";

            position:absolute;

            top:-120px;
            left:-120px;

            width:220px;
            height:700px;

            background:
                linear-gradient(
                    90deg,
                    rgba(255,255,255,0),
                    rgba(255,255,255,0.28),
                    rgba(255,255,255,0)
                );

            transform:rotate(18deg);

            animation:
                shine 6s linear infinite;
        }

        @keyframes shine{

            0%{
                left:-220px;
            }

            100%{
                left:120%;
            }
        }

        .detail-image{
            width:100%;
            height:430px;
            object-fit:cover;
            border-radius:24px;
            display:block;
            transition:0.35s;
        }

        .detail-image:hover{
            transform:scale(1.02);
        }

        .thumb-row{
            margin-top:22px;
            display:flex;
            gap:18px;
            background:rgba(255,255,255,0.72);
            border-radius:24px;
            padding:18px;
        }

        .thumb{
            width:130px;
            height:78px;
            object-fit:cover;
            border-radius:14px;
            border:3px solid #f05fa5;
        }

        .breadcrumb{
            color:#777;
            margin-bottom:24px;
            font-size:15px;
        }

        .badge{
            display:inline-block;
            padding:9px 18px;
            border-radius:999px;
            color:white;
            font-size:14px;
            font-weight:700;
            margin-right:10px;
            margin-bottom:16px;
            background:linear-gradient(135deg,#f072b6,#a892ff);
            box-shadow:
                0 8px 20px rgba(255,120,200,0.18);
        }

        .game{
            background:linear-gradient(135deg,#9db4c0,#8faeff);
        }

        h1{
            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #c078ff,
                    #7f9cff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;

            text-shadow:
                0 10px 35px rgba(255,120,200,0.18);
            font-size:46px;
            margin:16px 0 10px;
            letter-spacing:-1px;
        }

        .description{
            font-size:18px;
            color:#555;
            line-height:1.7;
        }

        .price{
            font-size:38px;
            font-weight:900;
            margin:24px 0 14px;
            background:linear-gradient(90deg,#ff5fa2,#8f8dff);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .stock{
            color:#666;
            font-size:16px;
            margin-bottom:26px;
        }

        .stock-dot{
            display:inline-block;
            width:10px;
            height:10px;
            background:#45d483;
            border-radius:50%;
            margin-right:8px;
        }

        .quantity-title{
            font-weight:700;
            margin-bottom:10px;
        }

        .actions{
            display:flex;
            gap:20px;
            align-items:center;
            margin-bottom:28px;
        }

        .quantity{
            display:flex;
            align-items:center;
            justify-content:space-between;
            width:200px;
            padding:16px 20px;
            border-radius:18px;
            background:white;
            box-shadow:0 10px 28px rgba(0,0,0,0.05);
            font-size:20px;
        }

        .quantity span{
            font-weight:700;
        }

        .add-btn{
            border:none;
            padding:18px 48px;
            border-radius:20px;
            color:white;
            font-size:18px;
            font-weight:800;
            cursor:pointer;
            background:linear-gradient(135deg,#ff62a9,#7d8fff);
            box-shadow:0 18px 45px rgba(150,130,255,0.32);
            transition:0.3s;
        }

        .add-btn:hover{
            transform:translateY(-4px);
            box-shadow:0 25px 55px rgba(150,130,255,0.42);
        }

        .mini-actions{
            display:flex;
            gap:16px;
            margin:20px 0;
        }

        .round-btn{
            width:58px;
            height:58px;
            border-radius:50%;
            border:none;
            background:white;
            font-size:24px;
            cursor:pointer;
            box-shadow:0 12px 28px rgba(0,0,0,0.08);
            color:#f05fa5;
        }

        .info-row{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:14px;
            margin:30px 0;
        }

        .info-box{
            background:rgba(255,255,255,0.62);
            border-radius:18px;
            padding:18px;
            border:1px solid rgba(255,255,255,0.7);
        }

        .info-box strong{
            display:block;
            margin-bottom:6px;
        }

        .back{
            display:inline-block;
            margin-top:12px;
            color:#d46f8d;
            text-decoration:none;
            font-weight:800;
        }

        @media(max-width:900px){
            .detail-card{
                grid-template-columns:1fr;
            }

            .actions{
                flex-direction:column;
                align-items:flex-start;
            }

            .info-row{
                grid-template-columns:1fr;
            }
        }
        .space-bg{

            position:fixed;

            inset:0;

            overflow:hidden;

            z-index:1;

            pointer-events:none;
        }

        .page,
        .navbar{
            position:relative;
            z-index:2;
        }

        /* NEBULA */

        .nebula{

            position:absolute;

            border-radius:50%;

            filter:blur(90px);

            opacity:0.45;
        }

        .nebula-1{

            width:500px;
            height:500px;

            left:-120px;
            top:120px;

            background:
                radial-gradient(circle,
                rgba(255,120,210,0.9),
                rgba(180,120,255,0.2),
                transparent);
        }

        .nebula-2{

            width:650px;
            height:650px;

            right:-180px;
            bottom:-120px;

            background:
                radial-gradient(circle,
                rgba(120,180,255,0.8),
                rgba(180,120,255,0.18),
                transparent);
        }

        /* CLOUDS */

        .cloud{

            position:absolute;

            border-radius:50%;

            filter:blur(70px);

            opacity:0.22;

            animation:
                floatCloud 14s ease-in-out infinite;
        }

        .cloud-1{

            width:420px;
            height:180px;

            left:5%;
            bottom:0;

            background:
                linear-gradient(
                    90deg,
                    #ffd7ef,
                    #e8cfff,
                    #cfe3ff
                );
        }

        .cloud-2{

            width:520px;
            height:220px;

            right:8%;
            bottom:30px;

            background:
                linear-gradient(
                    90deg,
                    #ffd7ef,
                    #d7cfff,
                    #d5e8ff
                );

            animation-delay:2s;
        }

        .cloud-3{

            width:340px;
            height:150px;

            right:22%;
            top:120px;

            background:
                linear-gradient(
                    90deg,
                    #ffe0f3,
                    #e0d8ff,
                    #d9ecff
                );

            animation-delay:4s;
        }

        /* STARS */

        .star{

            position:absolute;

            width:4px;
            height:4px;

            border-radius:50%;

            background:white;

            box-shadow:
                0 0 18px rgba(255,255,255,0.95);

            animation:
                twinkle 4s ease-in-out infinite;
        }

        .s1{ top:120px; left:18%; }
        .s2{ top:220px; left:45%; }
        .s3{ top:160px; right:24%; }
        .s4{ top:420px; right:12%; }
        .s5{ bottom:140px; left:30%; }
        .s6{ bottom:220px; right:35%; }

        /* SHOOTING STAR */

        .shooting-star{

            position:absolute;

            top:120px;
            right:220px;

            width:180px;
            height:2px;

            background:
                linear-gradient(
                    90deg,
                    white,
                    rgba(255,255,255,0)
                );

            transform:rotate(-25deg);

            opacity:0.8;

            animation:
                shooting 8s linear infinite;
        }

        /* ANIMATIONS */

        @keyframes twinkle{

            0%{
                opacity:0.4;
            }

            50%{
                opacity:1;
            }

            100%{
                opacity:0.4;
            }
        }

        @keyframes floatCloud{

            0%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-12px);
            }

            100%{
                transform:translateY(0px);
            }
        }

        @keyframes shooting{

            0%{
                transform:
                    translateX(0px)
                    rotate(-25deg);

                opacity:0;
            }

            10%{
                opacity:1;
            }

            60%{
                transform:
                    translateX(-260px)
                    translateY(120px)
                    rotate(-25deg);

                opacity:0;
            }

            100%{
                opacity:0;
            }
        }
        .glow{

            position:absolute;

            border-radius:50%;

            filter:blur(80px);

            opacity:0.28;

            animation:
                floatGlow 12s ease-in-out infinite;
        }

        .glow-1{

            width:260px;
            height:260px;

            left:8%;
            top:180px;

            background:#ff8bcf;
        }

        .glow-2{

            width:340px;
            height:340px;

            right:10%;
            top:280px;

            background:#9d9cff;

            animation-delay:2s;
        }

        .glow-3{

            width:220px;
            height:220px;

            left:42%;
            bottom:80px;

            background:#ffd6f3;

            animation-delay:4s;
        }

        @keyframes floatGlow{

            0%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-22px);
            }

            100%{
                transform:translateY(0px);
            }
        }
        .related-section{
            margin:90px auto 0;
            max-width:1100px;
            padding:0 30px;
        }

        .related-header{
            margin-bottom:28px;
            text-align:center;
        }

        .related-header h2{

            font-size:32px;
            margin-bottom:8px;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .related-header p{

            color:#777;

            font-size:15px;
        }

        .related-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(220px, 260px));
            gap:24px;
            justify-content:center;
        }
        .related-card{

            background:
                rgba(255,255,255,0.55);

            border-radius:30px;

            overflow:hidden;

            backdrop-filter:blur(22px);

            border:
                1px solid rgba(255,255,255,0.7);

            box-shadow:
                0 20px 55px rgba(170,180,255,0.15);

            transition:0.35s;
        }

        .related-card:hover{

            transform:
                translateY(-8px);

            box-shadow:
                0 30px 70px rgba(170,180,255,0.24);
        }

        .related-image{
            width:100%;
            height:150px;
            object-fit:cover;
        }

        .related-content{

            padding:18px;
        }

        .related-badge{

            display:inline-block;

            padding:8px 16px;

            border-radius:999px;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            color:white;

            font-size:13px;

            font-weight:700;

            margin-bottom:14px;
        }

        .related-content h3{

            font-size:20px;

            margin:8px 0;
        }

        .related-price{

            font-size:22px;

            font-weight:800;

            margin:14px 0;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .related-button{

            display:inline-block;

            padding:14px 24px;

            border-radius:18px;

            text-decoration:none;

            color:white;

            font-weight:700;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            box-shadow:
                0 14px 35px rgba(170,160,255,0.22);

            transition:0.3s;
        }

        .related-button:hover{

            transform:translateY(-3px);
        }
        .copy-message{
            display:none;
            margin:10px 0 18px;
            padding:12px 16px;
            width:fit-content;
            border-radius:16px;

            color:white;
            font-weight:800;
            font-size:14px;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            box-shadow:
                0 12px 28px rgba(170,160,255,0.24);
        }

        .copy-message.show{
            display:block;
        }
        .quantity-control{
            border:none;
            background:transparent;
            color:#d46f8d;
            font-size:25px;
            font-weight:900;
            cursor:pointer;
            padding:0 8px;
        }

        .quantity-control:hover{
            transform:scale(1.15);
        }

        .add-btn:disabled{
            cursor:not-allowed;
            opacity:0.55;
            transform:none;
        }
        .product-error-message,
        .product-success-message{
            max-width:1200px;
            margin:24px auto 0;
            padding:15px 20px;
            border-radius:18px;
            font-weight:800;
            position:relative;
            z-index:5;
        }

        .product-error-message{
            color:#a83e5d;
            background:rgba(255,225,235,0.90);
            border:1px solid rgba(240,95,127,0.24);
        }

        .product-success-message{
            color:#246f52;
            background:rgba(196,255,224,0.84);
            border:1px solid rgba(120,220,175,0.35);
        }
        .quantity-stock-message{
            display:none;
            margin-top:10px;
            padding:11px 15px;
            width:fit-content;

            border-radius:15px;

            color:#a83e5d;
            font-size:14px;
            font-weight:800;

            background:rgba(255,225,235,0.90);
            border:1px solid rgba(240,95,127,0.24);
        }

        .quantity-stock-message.show{
            display:block;
        }
        .rarity-area{
            max-width:440px;
            margin:10px 0 24px;
            padding:15px 17px;

            border-radius:19px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.68),
                    rgba(238,236,255,0.64)
                );

            border:1px solid rgba(255,255,255,0.78);

            box-shadow:
                0 13px 30px rgba(150,140,230,0.12);
        }

        .rarity-header{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:12px;

            margin-bottom:11px;

            color:#656575;
            font-size:14px;
            font-weight:800;
        }

        .rarity-name{
            font-size:14px;
            font-weight:900;
        }

        .rarity-name-1{
            color:#378be5;
        }

        .rarity-name-2{
            color:#7652e8;
        }

        .rarity-name-3{
            color:#e64daf;
        }

        .rarity-name-4{
            color:#ea4d62;
        }

        .rarity-name-5{
            color:#d99600;
        }

        .rarity-bar{
            display:flex;
            gap:6px;
            width:100%;
        }

        .rarity-part{
            flex:1;
            height:9px;

            border-radius:999px;

            opacity:0.20;
            filter:saturate(0.65);

            transition:0.25s;
        }

        .rarity-part.active{
            opacity:1;
            filter:saturate(1);

            box-shadow:
                0 0 9px rgba(150,130,255,0.20);
        }

        .rarity-part.blue{
            background:#4a9cff;
        }

        .rarity-part.purple{
            background:#7653e8;
        }

        .rarity-part.pink{
            background:#ef5fc5;
        }

        .rarity-part.red{
            background:#f05267;
        }

        .rarity-part.gold{
            background:#ffb522;
        }
        .stock-unavailable{
            color:#d74468;
            font-weight:800;
        }

        .stock-dot-empty{
            background:#ef5c76;
            box-shadow:0 0 12px rgba(239,92,118,0.35);
        }
        .sold-out-panel{
            max-width:520px;
            margin:22px 0 28px;
            padding:18px 20px;

            display:flex;
            align-items:center;
            gap:15px;

            border-radius:20px;

            color:#a63d59;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,222,232,0.86),
                    rgba(244,230,255,0.82)
                );

            border:1px solid rgba(239,92,118,0.22);

            box-shadow:
                0 14px 34px rgba(220,100,140,0.12);
        }

        .sold-out-icon{
            font-size:28px;
        }

        .sold-out-panel strong{
            display:block;
            margin-bottom:5px;
            font-size:18px;
        }

        .sold-out-panel p{
            margin:0;
            color:#795563;
            font-size:14px;
            line-height:1.5;
        }
        /* TABLET */
        @media(max-width:900px){
            .page{
                margin:40px auto;
                padding:0 24px;
            }

            .detail-card{
                grid-template-columns:1fr;
                gap:30px;
                padding:30px;
            }

            .detail-image{
                height:380px;
            }

            .thumb-row{
                justify-content:center;
                flex-wrap:wrap;
            }

            .actions{
                flex-direction:row;
                align-items:center;
                flex-wrap:wrap;
            }

            .info-row{
                grid-template-columns:1fr;
            }

            .related-section{
                margin-top:60px;
                padding:0 24px;
            }
        }

        /* PHONE */
        @media(max-width:650px){
            .page{
                margin:28px auto;
                padding:0 16px;
            }

            .detail-card{
                gap:24px;
                padding:18px;
                border-radius:28px;
            }

            .image-box{
                padding:12px;
                border-radius:23px;
            }

            .detail-image{
                height:260px;
                border-radius:18px;
            }

            .thumb-row{
                margin-top:14px;
                padding:12px;
                gap:10px;
                border-radius:19px;
            }

            .thumb{
                width:82px;
                height:56px;
                border-width:2px;
            }

            .breadcrumb{
                margin-bottom:17px;
                font-size:13px;
                line-height:1.5;
            }

            .badge{
                padding:8px 13px;
                margin-right:5px;
                margin-bottom:9px;
                font-size:12px;
            }

            h1{
                margin:13px 0 10px;
                font-size:34px;
                line-height:1.12;
                overflow-wrap:anywhere;
            }

            .description{
                font-size:16px;
                line-height:1.6;
            }

            .price{
                margin:20px 0 12px;
                font-size:32px;
            }

            .stock{
                margin-bottom:20px;
                font-size:14px;
                line-height:1.5;
            }

            .skin-tier,
            .rarity-area{
                width:100%;
                max-width:none;
                box-sizing:border-box;
            }

            .mini-actions{
                margin:17px 0;
            }

            .round-btn{
                width:50px;
                height:50px;
                font-size:21px;
            }

            .actions{
                width:100%;
                flex-direction:column;
                align-items:stretch;
                gap:14px;
            }

            .quantity{
                width:100%;
                padding:15px 18px;
                box-sizing:border-box;
            }

            .add-btn{
                width:100%;
                padding:17px 20px;
                box-sizing:border-box;
            }

            .quantity-stock-message{
                width:auto;
                margin-top:0;
                line-height:1.4;
            }

            .sold-out-panel{
                max-width:none;
                box-sizing:border-box;
            }

            .info-row{
                grid-template-columns:1fr;
                gap:11px;
                margin:24px 0;
            }

            .info-box{
                padding:16px;
            }

            .related-section{
                margin-top:50px;
                padding:0 16px;
            }

            .related-header h2{
                font-size:28px;
            }

            .related-header p{
                font-size:14px;
                line-height:1.5;
            }

            .related-grid{
                grid-template-columns:1fr;
            }

            .related-card{
                width:100%;
                max-width:400px;
                margin:0 auto;
            }

            .related-image{
                height:190px;
            }
        }
    </style>
</head>

<body>
<div class="space-bg">
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>
    <div class="glow glow-3"></div>

    <div class="nebula nebula-1"></div>
    <div class="nebula nebula-2"></div>

    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>
    <div class="cloud cloud-3"></div>

    <div class="star s1"></div>
    <div class="star s2"></div>
    <div class="star s3"></div>
    <div class="star s4"></div>
    <div class="star s5"></div>
    <div class="star s6"></div>

    <div class="shooting-star"></div>

</div>
@include('partials.navbar')

@if(session('error'))
    <div class="product-error-message">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="product-success-message">
        {{ session('success') }}
    </div>
@endif


<div class="page">

    <div class="detail-card">

        <div>
            <div class="image-box">
                @if($product->image)
                    <img src="{{ $product->image }}" class="detail-image" alt="{{ $product->name }}">
                @endif
            </div>

            <div class="thumb-row">
                @if($product->image)
                    <img src="{{ $product->image }}" class="thumb">
                    <img src="{{ $product->image }}" class="thumb">
                    <img src="{{ $product->image }}" class="thumb">
                @endif
            </div>
        </div>

        <div>
            <div class="breadcrumb">
                Home / {{ $product->category }} / {{ $product->name }}
            </div>

            <span class="badge game">{{ $product->game }}</span>
            <span class="badge">{{ $product->category }}</span>
            <span class="badge">{{ $product->type }}</span>

            <h1>{{ $product->name }}</h1>

            <p class="description">{{ $product->description }}</p>

            <div class="price">${{ $product->price }}</div>

            <p class="stock {{ $product->stock <= 0 ? 'stock-unavailable' : '' }}">
                <span class="stock-dot {{ $product->stock <= 0 ? 'stock-dot-empty' : '' }}"></span>

                @if($product->stock > 0)
                    Available stock: {{ $product->stock }}
                @else
                    This product is currently out of stock.
                @endif
            </p>

            @if($product->rarity)

                @php
                    $rarityLevels = [
                        'Mil-Spec' => 1,
                        'Restricted' => 2,
                        'Classified' => 3,
                        'Covert' => 4,
                        'Rare Special' => 5,
                    ];

                    $rarityLevel = $rarityLevels[$product->rarity] ?? 0;
                @endphp

                <div class="rarity-area">

                    <div class="rarity-header">
                        <span>Skin Rarity</span>

                        <strong class="rarity-name rarity-name-{{ $rarityLevel }}">
                            {{ $product->rarity }}
                        </strong>
                    </div>

                    <div class="rarity-bar">

            <span class="rarity-part blue
                {{ $rarityLevel >= 1 ? 'active' : '' }}">
            </span>

                        <span class="rarity-part purple
                {{ $rarityLevel >= 2 ? 'active' : '' }}">
            </span>

                        <span class="rarity-part pink
                {{ $rarityLevel >= 3 ? 'active' : '' }}">
            </span>

                        <span class="rarity-part red
                {{ $rarityLevel >= 4 ? 'active' : '' }}">
            </span>

                        <span class="rarity-part gold
                {{ $rarityLevel >= 5 ? 'active' : '' }}">
            </span>

                    </div>

                </div>

            @endif

            <div class="mini-actions">
                <form action="/wishlist/toggle/{{ $product->id }}" method="POST">
                    @csrf

                    <button type="submit" class="round-btn">
                        @if($isWishlisted)
                            ♥
                        @else
                            ♡
                        @endif
                    </button>
                </form>
                <button
                    type="button"
                    class="round-btn"
                    onclick="copyProductLink()"
                >
                    ↗
                </button>
            </div>
            <div id="copy-message" class="copy-message">
                Product link copied!
            </div>

            @if($product->stock > 0)

                <div class="quantity-title">
                    Quantity
                </div>

                <form
                    action="/cart/add/{{ $product->id }}"
                    method="POST"
                    class="actions"
                >
                    @csrf

                    <div class="quantity">
                        <button
                            type="button"
                            class="quantity-control"
                            onclick="decreaseProductQuantity()"
                        >
                            −
                        </button>

                        <span id="productQuantityText">1</span>

                        <button
                            type="button"
                            class="quantity-control"
                            onclick="increaseProductQuantity()"
                        >
                            +
                        </button>
                    </div>

                    <input
                        type="hidden"
                        name="quantity"
                        id="productQuantityInput"
                        value="1"
                    >

                    <div
                        id="quantityStockMessage"
                        class="quantity-stock-message"
                    >
                        Maximum available stock reached.
                    </div>

                    <button
                        type="submit"
                        class="add-btn"
                    >
                        🛒 Add to Cart
                    </button>
                </form>

            @else

                <div class="sold-out-panel">
                    <span class="sold-out-icon">⚠</span>

                    <div>
                        <strong>Out of Stock</strong>

                        <p>
                            This item cannot be added to your cart right now.
                        </p>
                    </div>
                </div>

            @endif

            <div class="info-row">
                <div class="info-box">
                    <strong>⚡ Instant Delivery</strong>
                    Get your item instantly
                </div>

                <div class="info-box">
                    <strong>🔒 Secure Payment</strong>
                    100% secure checkout
                </div>

                <div class="info-box">
                    <strong>🎧 24/7 Support</strong>
                    We are here for you
                </div>
            </div>

            <a href="/products" class="back">← Back to products</a>
        </div>

    </div>

</div>
<section class="related-section">

    <div class="related-header">

        <h2>You May Also Like</h2>

        <p>Discover more dreamy gaming gear & digital collectibles.</p>

    </div>

    <div class="related-grid">

        @foreach($relatedProducts as $related)

            <div class="related-card">

                <img
                    src="{{ $related->image }}"
                    class="related-image"
                >

                <div class="related-content">

                    <span class="related-badge">
                        {{ $related->category }}
                    </span>

                    <h3>{{ $related->name }}</h3>

                    <div class="related-price">
                        ${{ $related->price }}
                    </div>

                    <a
                        href="/products/{{ $related->id }}"
                        class="related-button"
                    >
                        View Item
                    </a>

                </div>

            </div>

        @endforeach

    </div>

</section>

<script>
    function copyProductLink() {
        const link = window.location.href;
        const message = document.getElementById('copy-message');

        const tempInput = document.createElement('input');
        tempInput.value = link;
        document.body.appendChild(tempInput);

        tempInput.select();
        tempInput.setSelectionRange(0, 99999);

        document.execCommand('copy');

        document.body.removeChild(tempInput);

        message.classList.add('show');

        setTimeout(function () {
            message.classList.remove('show');
        }, 1800);
    }
</script>
<script>
    let productQuantity = 1;
    const maximumStock = {{ (int) $product->stock }};

    function updateProductQuantity() {
        document.getElementById('productQuantityText').textContent =
            productQuantity;

        document.getElementById('productQuantityInput').value =
            productQuantity;
    }

    function showStockMessage() {
        const message = document.getElementById('quantityStockMessage');

        message.classList.add('show');

        clearTimeout(window.stockMessageTimer);

        window.stockMessageTimer = setTimeout(function () {
            message.classList.remove('show');
        }, 2500);
    }

    function increaseProductQuantity() {
        if (productQuantity < maximumStock) {
            productQuantity++;
            updateProductQuantity();

            document
                .getElementById('quantityStockMessage')
                .classList.remove('show');
        } else {
            showStockMessage();
        }
    }

    function decreaseProductQuantity() {
        if (productQuantity > 1) {
            productQuantity--;
            updateProductQuantity();

            document
                .getElementById('quantityStockMessage')
                .classList.remove('show');
        }
    }
</script>
</body>
</html>
