<!DOCTYPE html>
<html>
<head>
    <title>LootMarket</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background:

                radial-gradient(
                    circle at left,
                    rgba(255,210,230,0.45),
                    transparent 28%
                ),

                radial-gradient(
                    circle at right,
                    rgba(200,220,255,0.40),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #fff6fb,
                    #f7f0ff,
                    #edf6ff
                );

            overflow-x:hidden;

            position:relative;

            min-height:100vh;
            color: #3a3a3a;
        }

        .navbar {
            padding: 24px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background:

                linear-gradient(
                    90deg,
                    rgba(255,235,245,0.88),
                    rgba(235,242,255,0.88)
                );

            backdrop-filter:blur(18px);

            box-shadow:
                0 10px 35px rgba(212,111,141,0.10);

            border-bottom:
                1px solid rgba(212,111,141,0.18);

            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 30px;
            font-weight: 800;
            color: #d46f8d;

            display:flex;
            align-items:center;

            letter-spacing:-1px;
        }
        .logo img{
            width:50px;
            height:50px;
            border-radius:14px;
            margin-right:12px;
            box-shadow: 0 6px 18px rgba(216,180,182,0.35);
        }

        .nav-links a {
            margin-left: 24px;
            text-decoration: none;
            color: #3a3a3a;
            font-weight: 500;
        }
        .dropdown{
            position:relative;
            display:inline-block;
        }

        .dropdown-menu{

            display:none;

            position:absolute;

            right:0;

            top:42px;

            width:220px;

            padding:16px;

            border-radius:28px;

            background:

                linear-gradient(
                    180deg,
                    rgba(255,240,247,0.96),
                    rgba(232,240,255,0.96)
                );

            backdrop-filter:blur(24px);

            border:
                1px solid rgba(255,255,255,0.7);

            box-shadow:
                0 18px 55px rgba(170,180,255,0.18);

            z-index:999;
        }


        .dropdown:hover .dropdown-menu{
            display:block;
        }
        .profile-top{

            display:flex;

            align-items:center;

            gap:14px;

            margin-bottom:18px;
        }

        .profile-avatar{

            width:52px;
            height:52px;

            border-radius:50%;

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:28px;
            font-weight:700;

            color:white;

            background:

                linear-gradient(
                    135deg,
                    #ff5fa2,
                    #ff79c2
                );
        }

        .profile-name{

            font-size:18px;
            font-weight:800;

            color:#f05fa5;
        }

        .profile-welcome{

            font-size:14px;

            color:#7a7a8c;

            margin-top:3px;
        }
        .dropdown-divider{

            height:1px;

            background:
                rgba(210,210,230,0.4);

            margin:14px 0;
        }

        .dropdown-item{

            display:flex;

            align-items:center;

            gap:14px;

            padding:12px 14px;

            border-radius:16px;

            text-decoration:none;

            color:#3f3f52;

            font-size:16px;

            transition:0.22s;
        }
        .dropdown-item:hover{

            background:
                rgba(255,255,255,0.55);
        }

        .dropdown-item i{

            color:#f05fa5;

            font-size:20px;

            width:22px;
        }

        .logout-button{

            width:100%;

            border:none;

            background:none;

            cursor:pointer;

            text-align:left;
        }
        .dropdown-menu a{

            display:block;

            margin:0;

            margin-bottom:8px;

            padding:12px 14px;

            border-radius:14px;

            text-decoration:none;

            color:#3a3a3a;

            transition:0.2s;
        }


        .dropdown-menu a:hover{
            background:#fff1f5;
        }

        .dropdown-username{

            padding:12px 14px;

            color:#f05fa5;
            font-size:24px;
            font-weight:800;

            margin-bottom:10px;
        }

        .hero {
            padding: 80px 60px 50px;
            text-align: center;
        }

        .hero h1 {

            font-size: 76px;
            line-height: 1.18;
            margin-bottom: 24px;
            font-weight: 800;
            padding-bottom: 12px;
            overflow: visible;

            background: linear-gradient(
                135deg,
                #d46f8d,
                #8faec0
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            text-shadow:
                0 10px 30px rgba(212,111,141,0.15);

        }

        .hero p {
            font-size: 18px;
            color: #6b6b6b;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 320px));
            gap: 36px;
            padding: 40px 60px 80px;
            justify-content: center;
        }

        .card {
            background:
                linear-gradient(
                    135deg,
                    rgb(232 217 246 / 0.89),
                    rgb(250 226 247 / 0.89),
                    rgb(228 255 252 / 0.84),
                    rgb(238 221 248 / 0.85)
                );

            border-radius: 28px;
            padding: 24px;

            box-shadow:
                0 20px 55px rgba(255,126,182,0.10),
                0 14px 38px rgba(143,141,255,0.16);

            border: 1px solid rgba(255,255,255,0.65);

            transition: 0.3s ease;
            backdrop-filter: blur(16px);

            display: flex;
            flex-direction: column;
            width: 100%;
            box-sizing: border-box;

            position: relative;
            overflow: hidden;
        }
        .product-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 18px;
            margin-bottom: 18px;
            background: #f1e7e8;
            box-shadow:
                0 14px 32px rgba(0,0,0,0.10);
        }

        .card:hover {
            transform: translateY(-8px);

            box-shadow:
                0 28px 70px rgba(255,126,182,0.18),
                0 18px 48px rgba(143,141,255,0.22);

            border-color: rgba(255,255,255,0.9);
        }

        .badge {

            display:inline-flex;
            flex-wrap:wrap;

            gap:8px;

            margin-bottom:16px;

            align-items:center;

            justify-content:center;

            padding:8px 16px;

            border-radius:999px;

            background:#d8b4b6;

            color:white;

            font-size:15px;

            white-space:nowrap;

        }
        .card span {
            width: fit-content;
        }

        .game {
            background: #9db4c0;
        }

        .card h2 {
            font-size: 24px;
            margin: 10px 0;
        }

        .description {
            color: #6b6b6b;
            min-height: 55px;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #c89fa3;
            margin-top: 20px;
        }

        .stock {
            font-size: 14px;
            color: #777;
        }

        .button {
            margin-top: auto;
            display: inline-block;
            width: fit-content;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            padding: 13px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #d8b4b6, #9db4c0);
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .button:hover {
            opacity: 0.9;
            box-shadow: 0 10px 25px rgba(212,111,141,0.25);
        }
        .view-button {

            margin-top: auto;

            align-self: flex-start;

            display: inline-block;

            padding: 13px 22px;

            border-radius: 16px;

            background:
                linear-gradient(
                    135deg,
                    #d8b4b6,
                    #9db4c0
                );

            color: white;

            font-size: 15px;

            font-weight: bold;

            text-decoration: none;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;

        }
        .view-button:hover {

            transform: scale(1.08);

            box-shadow:
                0 10px 25px rgba(212,111,141,0.25);

        }
        body::before{

            content:"";

            position:fixed;

            left:-120px;
            bottom:-120px;

            width:340px;
            height:340px;

            border-radius:50%;

            background:
                radial-gradient(
                    circle at 30% 30%,
                    rgba(255,255,255,0.9),
                    rgba(255,210,230,0.75),
                    rgba(220,200,255,0.45)
                );

            filter:blur(2px);

            z-index:-1;
        }
        body::after{

            content:"";

            position:fixed;

            right:-220px;
            bottom:-220px;

            width:650px;
            height:650px;

            border-radius:50%;

            background:
                radial-gradient(
                    circle at 30% 30%,
                    rgba(255,255,255,0.92),
                    rgba(220,210,255,0.58),
                    rgba(190,220,255,0.32)
                );

            z-index:-1;

            opacity:0.8;
        }
        .dropdown-menu i{

            width:22px;

            margin-right:10px;

            color:#f05fa5;

            font-size:18px;
        }
        .cosmic-bg{
            position:fixed;
            inset:0;
            overflow:hidden;
            pointer-events:none;
            z-index:0;
        }

        .hero,
        .products,
        .navbar{
            position:relative;
            z-index:2;
        }

        /* SOL GEZEGEN */

        .planet-left{

            position:absolute;

            left:-90px;
            top:430px;

            width:250px;
            height:250px;

            border-radius:50%;

            background:

                radial-gradient(
                    circle at 30% 25%,
                    #ffe8f8 0%,
                    #ffb0da 22%,
                    #ef87ff 48%,
                    #9d8fff 78%,
                    #7d86ff 100%
                );

            box-shadow:
                0 0 120px rgba(255,160,220,0.42),
                inset -50px -60px 90px rgba(100,120,255,0.22);

            overflow:hidden;
            animation:
                floatPlanet 9s ease-in-out infinite;
        }

        .planet-left::after{

            content:"";

            position:absolute;

            inset:0;

            border-radius:50%;

            background:

                repeating-linear-gradient(
                    160deg,
                    rgba(255,255,255,0.12) 0px,
                    rgba(255,255,255,0.12) 14px,
                    transparent 14px,
                    transparent 34px
                );

            mix-blend-mode:screen;

            opacity:0.7;
        }

        .planet-left::before{

            content:"";

            position:absolute;

            width:360px;
            height:105px;

            left:-62px;
            top:72px;

            border-radius:50%;

            border:
                4px solid rgba(220,250,255,0.72);

            transform:rotate(24deg);

            box-shadow:
                0 0 35px rgba(220,255,255,0.55);
        }

        /* texture */

        .planet-left::after{

            content:"";

            position:absolute;

            inset:0;

            border-radius:50%;

            background:

                repeating-linear-gradient(
                    160deg,
                    rgba(255,255,255,0.10) 0px,
                    rgba(255,255,255,0.10) 12px,
                    transparent 12px,
                    transparent 26px
                );

            opacity:0.55;
        }

        /* halka */

        .planet-left::before{

            content:"";

            position:absolute;

            width:330px;
            height:90px;

            left:-58px;
            top:66px;

            border-radius:50%;

            border:
                3px solid rgba(210,240,255,0.65);

            transform:rotate(25deg);

            box-shadow:
                0 0 28px rgba(220,255,255,0.45);
        }

        /* SAĞ GEZEGEN */

        .planet-right{

            position:absolute;

            right:-170px;
            top:470px;

            width:430px;
            height:430px;

            border-radius:50%;

            background:

                radial-gradient(
                    circle at 30% 25%,
                    #fff1fc 0%,
                    #f2c8ff 25%,
                    #d3a4ff 50%,
                    #9e9eff 78%,
                    #7d8fff 100%
                );

            box-shadow:
                0 0 150px rgba(180,190,255,0.42),
                inset -70px -80px 120px rgba(120,140,255,0.22);

            overflow:hidden;
            animation:
                floatPlanetReverse 12s ease-in-out infinite;
        }

        .planet-right::after{

            content:"";

            position:absolute;

            inset:0;

            border-radius:50%;

            background:

                repeating-linear-gradient(
                    160deg,
                    rgba(255,255,255,0.10) 0px,
                    rgba(255,255,255,0.10) 18px,
                    transparent 18px,
                    transparent 42px
                );

            opacity:0.65;

            mix-blend-mode:screen;
        }

        .planet-right::before{

            content:"";

            position:absolute;

            width:620px;
            height:145px;

            left:-110px;
            top:145px;

            border-radius:50%;

            border:
                4px solid rgba(235,255,255,0.78);

            transform:rotate(-18deg);

            box-shadow:
                0 0 42px rgba(220,255,255,0.58);
        }

        /* texture */

        .planet-right::after{

            content:"";

            position:absolute;

            inset:0;

            border-radius:50%;

            background:

                repeating-linear-gradient(
                    160deg,
                    rgba(255,255,255,0.08) 0px,
                    rgba(255,255,255,0.08) 16px,
                    transparent 16px,
                    transparent 34px
                );

            opacity:0.5;
        }

        /* halka */

        .planet-right::before{

            content:"";

            position:absolute;

            width:520px;
            height:120px;

            left:-90px;
            top:110px;

            border-radius:50%;

            border:
                3px solid rgba(225,255,255,0.62);

            transform:rotate(-18deg);

            box-shadow:
                0 0 36px rgba(220,255,255,0.45);
        }

        /* küçük gezegen */

        .tiny-planet{

            position:absolute;

            right:320px;
            top:560px;

            width:46px;
            height:46px;

            border-radius:50%;

            background:

                radial-gradient(
                    circle at 30% 30%,
                    #ffd8f5,
                    #dd8fff,
                    #9199ff
                );

            box-shadow:
                0 0 35px rgba(255,160,230,0.4);
            animation:
                floatPlanet 7s ease-in-out infinite;
        }

        /* yıldızlar */

        .star{

            position:absolute;

            width:4px;
            height:4px;

            border-radius:50%;

            background: #dd8fff;

            box-shadow:
                0 0 18px rgb(255 145 240 / 0.84);
            animation:
                twinkle 4s ease-in-out infinite;
        }

        .s1{ left:18%; top:220px; }
        .s2{ left:48%; top:170px; }
        .s3{ right:18%; top:260px; }
        .s4{ right:9%; top:620px; }
        .s5{ left:38%; top:560px; }

        @keyframes floatPlanet {

            0%{
                transform:translateY(0px) rotate(0deg);
            }

            50%{
                transform:translateY(-14px) rotate(1deg);
            }

            100%{
                transform:translateY(0px) rotate(0deg);
            }
        }

        @keyframes floatPlanetReverse {

            0%{
                transform:translateY(0px) rotate(0deg);
            }

            50%{
                transform:translateY(10px) rotate(-1deg);
            }

            100%{
                transform:translateY(0px) rotate(0deg);
            }
        }

        @keyframes twinkle {

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
        .card {
            position: relative;
        }

        .wishlist-card-btn{
            position:absolute;
            top:18px;
            right:18px;

            width:44px;
            height:44px;

            border:none;
            border-radius:50%;

            background:rgba(255,255,255,0.85);

            color:#f05fa5;

            font-size:22px;

            cursor:pointer;

            box-shadow:
                0 10px 25px rgba(0,0,0,0.10);

            transition:0.25s;

            z-index:5;
        }

        .wishlist-card-btn:hover{
            transform:scale(1.12);
            background:white;
        }
        .featured-categories{
            padding:20px 60px 40px;
            position:relative;
            z-index:2;
        }

        .section-header{
            text-align:center;
            margin-bottom:30px;
        }

        .section-header h2{
            font-size:38px;
            margin:0 0 10px;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .section-header p{
            color:#777;
            font-size:16px;
        }

        .category-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(220px, 260px));
            gap:24px;
            justify-content:center;
        }

        .category-card{
            text-decoration:none;
            color:#2f2f3a;

            background:
                linear-gradient(
                    135deg,
                    rgb(205 109 180 / 0.63),
                    rgb(138 212 228 / 0.62),
                    rgb(181 129 197 / 0.62)
                );
            backdrop-filter:blur(22px);

            border:1px solid rgba(255,255,255,0.72);
            border-radius:30px;

            padding:28px 24px;

            box-shadow:
                0 20px 55px rgba(255,126,182,0.12),
                0 12px 35px rgba(143,141,255,0.14);

            transition:0.3s;
        }

        .category-card:hover{
            transform:translateY(-8px);
            box-shadow:
                0 30px 75px rgba(160,170,255,0.24);
        }

        .category-icon{
            width:58px;
            height:58px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:20px;

            font-size:28px;

            background:
                linear-gradient(
                    135deg,
                    rgb(227 132 174 / 0.77),
                    rgb(154 223 218 / 0.71)
                );

            margin-bottom:18px;
        }

        .category-card h3{
            font-size:22px;
            margin:0 0 10px;
        }

        .category-card p{
            color:#777;
            line-height:1.5;
            margin:0;
        }
        .products-header{
            text-align:center;
            margin:20px 0 10px;
            position:relative;
            z-index:2;
        }

        .products-header h2{
            font-size:38px;
            margin:0 0 8px;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .products-header p{
            color:#777;
            font-size:16px;
            margin:0;
        }
        .filter-panel{
            max-width:1320px;
            margin:10px auto 28px;
            padding:18px;

            display:flex;
            justify-content:center;
            align-items:center;
            flex-wrap:wrap;
            gap:12px;

            border-radius:30px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,225,240,0.72),
                    rgba(242,232,255,0.68),
                    rgba(224,240,255,0.68)
                );

            border:1px solid rgba(255,255,255,0.7);

            box-shadow:
                0 20px 55px rgba(255,126,182,0.10),
                0 12px 35px rgba(143,141,255,0.14);

            backdrop-filter:blur(18px);

            position:relative;
            z-index:20;
        }

        .filter-input{
            min-width:145px;
            padding:13px 14px;

            border:none;
            outline:none;

            border-radius:18px;

            background:rgba(255,255,255,0.72);

            color:#3a3a3a;

            font-size:15px;
            font-weight:600;

            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,0.65);
        }

        .filter-input.small{
            min-width:105px;
            width:105px;
        }

        .filter-input:focus{
            box-shadow:
                0 0 0 4px rgba(255,126,182,0.14);
        }

        .filter-submit,
        .filter-reset{
            padding:13px 20px;

            border:none;
            border-radius:18px;

            text-decoration:none;

            color:white;
            font-size:15px;
            font-weight:900;

            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            box-shadow:
                0 12px 28px rgba(170,160,255,0.22);

            transition:0.25s;
        }

        .filter-reset{
            background:
                linear-gradient(
                    135deg,
                    #d8b4be,
                    #9fb7c9
                );
        }

        .filter-submit:hover,
        .filter-reset:hover{
            transform:translateY(-3px);
        }
        .custom-filter-dropdown{
            position:relative;
        }

        .custom-filter-button{
            min-width:165px;
            padding:13px 15px;

            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:12px;

            border:none;
            border-radius:18px;

            background:rgba(255,255,255,0.72);

            color:#3a3a3a;

            font-size:15px;
            font-weight:800;

            cursor:pointer;

            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,0.65);

            transition:0.25s;
        }

        .custom-filter-button:hover{
            box-shadow:
                0 0 0 4px rgba(255,126,182,0.14);
        }

        .custom-arrow{
            color:#d46f8d;
            font-size:18px;
        }

        .custom-filter-menu{
            max-height:220px;
            overflow-y:auto;
            z-index:999;
            display:none;

            position:absolute;
            top:54px;
            left:0;

            width:220px;

            padding:10px;

            border-radius:22px;

            background:
                linear-gradient(
                    180deg,
                    rgb(255 218 236 / 0.98),
                    rgb(216 228 250 / 0.98)
                );

            backdrop-filter:blur(18px);

            border:1px solid rgba(255,255,255,0.8);

            box-shadow:
                0 18px 45px rgba(160,170,255,0.24);

        }

        .custom-filter-menu.show{
            display:block;
        }

        .custom-filter-menu button{
            width:100%;

            padding:13px 15px;

            border:none;
            border-radius:15px;

            background:transparent;

            text-align:left;

            color:#3f3f52;

            font-size:15px;
            font-weight:800;

            cursor:pointer;

            transition:0.22s;
        }

        .custom-filter-menu button:hover{
            background:
                linear-gradient(
                    135deg,
                    rgba(255,126,182,0.22),
                    rgba(143,141,255,0.18)
                );

            color:#d46f8d;
        }
        .custom-filter-menu{
            max-height:260px;
            overflow-y:auto;
        }
        .rarity-feature{
            margin:4px 0 15px;
            padding:11px 14px;

            border-radius:16px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.70),
                    rgba(241,235,255,0.66)
                );

            border:1px solid rgba(255,255,255,0.82);

            box-shadow:
                0 10px 26px rgba(145,135,225,0.12);

            position:relative;
            overflow:hidden;
        }

        .skin-tier{
            margin:12px 0 20px;
            padding:14px 17px 16px;

            border-radius:20px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.67),
                    rgba(243,237,255,0.61)
                );

            border:1px solid rgba(255,255,255,0.88);

            box-shadow:
                0 12px 30px rgba(142,130,215,0.10);

            position:relative;
            overflow:hidden;
        }

        .skin-tier::before{
            content:"";

            position:absolute;
            inset:0;

            pointer-events:none;
            opacity:0.13;
        }

        .skin-tier-1::before{
            background:linear-gradient(90deg,#4a9cff,transparent 65%);
        }

        .skin-tier-2::before{
            background:linear-gradient(90deg,#7653e8,transparent 65%);
        }

        .skin-tier-3::before{
            background:linear-gradient(90deg,#ef5fc5,transparent 65%);
        }

        .skin-tier-4::before{
            background:linear-gradient(90deg,#f05267,transparent 65%);
        }

        .skin-tier-5::before{
            background:linear-gradient(90deg,#ffb522,transparent 65%);
        }

        .skin-tier-header{
            position:relative;
            z-index:2;

            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:12px;

            margin-bottom:13px;
        }

        .skin-tier-name{
            display:flex;
            align-items:center;
            gap:9px;

            font-size:15px;
            font-weight:900;
        }

        .skin-tier-label{
            color:#77778a;
            font-size:13px;
            font-weight:900;
        }

        .skin-tier-diamond{
            font-size:14px;
        }

        .skin-tier-1 .skin-tier-name{
            color:#378be5;
        }

        .skin-tier-2 .skin-tier-name{
            color:#7652e8;
        }

        .skin-tier-3 .skin-tier-name{
            color:#e64daf;
        }

        .skin-tier-4 .skin-tier-name{
            color:#ea4d62;
        }

        .skin-tier-5 .skin-tier-name{
            color:#c88700;
        }

        .skin-tier-spectrum{
            position:relative;

            width:100%;
            height:9px;

            border-radius:999px;

            background:
                linear-gradient(
                    90deg,
                    #3d92ff 0%,
                    #3d92ff 17%,
                    #7653e8 17%,
                    #7653e8 36%,
                    #ef5fc5 36%,
                    #ef5fc5 55%,
                    #f05267 55%,
                    #f05267 74%,
                    #ffb522 74%,
                    #ffd84a 100%
                );

            box-shadow:
                inset 0 1px 2px rgba(255,255,255,0.60),
                0 4px 12px rgba(120,110,200,0.13);
        }

        .skin-tier-marker{
            position:absolute;
            top:50%;

            width:17px;
            height:17px;

            border:4px solid white;
            border-radius:50%;

            background:#30303b;

            transform:
                translate(-50%, -50%);

            box-shadow:
                0 4px 12px rgba(45,45,60,0.34),
                0 0 0 2px rgba(255,255,255,0.35);
        }
        .out-of-stock-badge{
            position:absolute;
            top:18px;
            left:18px;
            z-index:6;

            padding:9px 14px;
            border-radius:999px;

            color:white;
            font-size:13px;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff718f,
                    #d74468
                );

            box-shadow:
                0 10px 25px rgba(215,68,104,0.25);
        }

        .sold-out-card .product-image{
            filter:grayscale(0.45);
            opacity:0.72;
        }

        .sold-out-card .stock{
            color:#d74468;
            font-weight:800;
        }
    </style>
</head>
<body>
@include('partials.navbar')
<div class="cosmic-bg">

    <div class="planet-left"></div>

    <div class="planet-right"></div>

    <div class="tiny-planet"></div>

    <div class="star s1"></div>
    <div class="star s2"></div>
    <div class="star s3"></div>
    <div class="star s4"></div>
    <div class="star s5"></div>

</div>


<section class="hero">
    <h1>Soft Gaming Marketplace</h1>
    <p>Discover premium game skins, items, and digital collectibles in a calm and elegant marketplace.</p>
</section>
<section class="featured-categories">

    <div class="section-header">
        <h2>Explore Loot Categories</h2>
        <p>Find digital codes, gaming setup upgrades, and streamer essentials.</p>
    </div>

    <div class="category-grid">

        <a href="/products?category=Game Currency" class="category-card">
            <div class="category-icon">🎮</div>
            <h3>Game Currency</h3>
            <p>RP, VP, V-Bucks and more.</p>
        </a>

        <a href="/products?category=Gift Cards" class="category-card">
            <div class="category-icon">💳</div>
            <h3>Gift Cards</h3>
            <p>Steam, Apple, Xbox and Game Pass.</p>
        </a>

        <a href="/products?category=Gaming Setup" class="category-card">
            <div class="category-icon">🖥️</div>
            <h3>Gaming Setup</h3>
            <p>Monitors, mice, keyboards and chairs.</p>
        </a>
        <a href="/products?category=Setup Decor" class="category-card">
            <div class="category-icon">✨</div>
            <h3>Setup Decor</h3>
            <p>Cloud lamps, neon lights, desk mats and cozy room details.</p>
        </a>

        <a href="/products?category=Streaming Gear" class="category-card">
            <div class="category-icon">🎙️</div>
            <h3>Streaming Gear</h3>
            <p>Microphones, webcams and creator tools.</p>
        </a>

    </div>

</section>
<form action="/products" method="GET" class="filter-panel">

    <input
        type="text"
        name="search"
        placeholder="Search products..."
        value="{{ request('search') }}"
        class="filter-input"
    >

    <input
        type="hidden"
        name="category"
        id="categoryInput"
        value="{{ request('category') }}"
    >

    <div class="custom-filter-dropdown">

        <button
            type="button"
            class="custom-filter-button"
            onclick="toggleCategoryDropdown()"
        >
        <span id="categoryLabel">
            @if(request('category'))
                {{ request('category') }}
            @else
                All Categories
            @endif
        </span>

            <span class="custom-arrow">⌄</span>
        </button>

        <div class="custom-filter-menu" id="categoryMenu">

            <button type="button" onclick="selectCategory('', 'All Categories')">
                All Categories
            </button>

            <button type="button" onclick="selectCategory('Skins', 'Skins')">
                Skins
            </button>

            <button type="button" onclick="selectCategory('Knives', 'Knives')">
                Knives
            </button>

            <button type="button" onclick="selectCategory('Gift Cards', 'Gift Cards')">
                Gift Cards
            </button>

            <button type="button" onclick="selectCategory('Game Currency', 'Game Currency')">
                Game Currency
            </button>

            <button type="button" onclick="selectCategory('Gaming Setup', 'Gaming Setup')">
                Gaming Setup
            </button>

            <button type="button" onclick="selectCategory('Setup Decor', 'Setup Decor')">
                Setup Decor
            </button>

            <button type="button" onclick="selectCategory('Streaming Gear', 'Streaming Gear')">
                Streaming Gear
            </button>

        </div>

    </div>

    <input
        type="number"
        name="min_price"
        placeholder="Min price"
        value="{{ request('min_price') }}"
        class="filter-input small"
    >

    <input
        type="number"
        name="max_price"
        placeholder="Max price"
        value="{{ request('max_price') }}"
        class="filter-input small"
    >

    <input
        type="hidden"
        name="sort"
        id="sortInput"
        value="{{ request('sort') }}"
    >

    <div class="custom-filter-dropdown">

        <button
            type="button"
            class="custom-filter-button"
            onclick="toggleSortDropdown()"
        >
        <span id="sortLabel">
            @if(request('sort') == 'cheapest')
                Cheapest
            @elseif(request('sort') == 'expensive')
                Most Expensive
            @else
                Newest
            @endif
        </span>

            <span class="custom-arrow">⌄</span>
        </button>

        <div class="custom-filter-menu" id="sortMenu">

            <button type="button" onclick="selectSort('', 'Newest')">
                Newest
            </button>

            <button type="button" onclick="selectSort('cheapest', 'Cheapest')">
                Cheapest
            </button>

            <button type="button" onclick="selectSort('expensive', 'Most Expensive')">
                Most Expensive
            </button>

        </div>

    </div>

    <button type="submit" class="filter-submit">
        Filter
    </button>

    <a href="/products" class="filter-reset">
        Reset
    </a>

</form>
<div style="text-align:center; margin: 10px 0 35px;">

    <a href="/products" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">
        All
    </a>

    <a href="/products?category=Skins" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">
        Skins
    </a>

    <a href="/products?category=Knives" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">
        Knives
    </a>

    <a href="/products?category=Gift Cards" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">
        Gift Cards
    </a>

    <a href="/products?category=Game Currency" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">
        Game Currency
    </a>

    <a href="/products?category=Gaming Setup" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">
        Gaming Setup
    </a>
    <a href="/products?category=Setup Decor" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">
        Setup Decor
    </a>

    <a href="/products?category=Streaming Gear" class="button" style="text-decoration:none; display:inline-block; width:auto; margin:6px;">
        Streaming Gear
    </a>


</div>
<div class="products-header">
    <h2>Trending Products</h2>
    <p>Popular skins, codes, and gaming gear selected for you.</p>
</div>

<section class="products">
    @foreach($products as $product)
        <div class="card {{ $product->stock <= 0 ? 'sold-out-card' : '' }}">
            @auth
                <form action="/wishlist/toggle/{{ $product->id }}" method="POST">
                    @csrf

                    <button type="submit" class="wishlist-card-btn">
                        @if(in_array($product->id, $wishlistProductIds))
                            ♥
                        @else
                            ♡
                        @endif
                    </button>
                </form>
            @endauth
                @if($product->stock <= 0)
                    <div class="out-of-stock-badge">
                        Out of Stock
                    </div>
                @endif
            @if($product->image)
                <img src="{{ $product->image }}" class="product-image" alt="{{ $product->name }}">
            @endif
                <div class="badges">

                    <span class="badge game">{{ $product->game }}</span>

                    <span class="badge">{{ $product->category }}</span>

                    <span class="badge">{{ $product->type }}</span>

                </div>
                @if($product->rarity)

                    @php
                        $rarityLevels = [
                            'Mil-Spec' => 1,
                            'Restricted' => 2,
                            'Classified' => 3,
                            'Covert' => 4,
                            'Rare Special' => 5,
                        ];

                        $rarityPositions = [
                            'Mil-Spec' => '10%',
                            'Restricted' => '30%',
                            'Classified' => '50%',
                            'Covert' => '70%',
                            'Rare Special' => '90%',
                        ];

                        $rarityLevel = $rarityLevels[$product->rarity] ?? 1;
                        $rarityPosition = $rarityPositions[$product->rarity] ?? '10%';
                    @endphp

                    <div class="skin-tier skin-tier-{{ $rarityLevel }}">

                        <div class="skin-tier-header">
            <span class="skin-tier-name">
                <span class="skin-tier-diamond">◆</span>
                {{ $product->rarity }}
            </span>

                            <span class="skin-tier-label">
                Skin Tier
            </span>
                        </div>

                        <div class="skin-tier-spectrum">
            <span
                class="skin-tier-marker"
                style="left: {{ $rarityPosition }};"
            ></span>
                        </div>

                    </div>

                @endif

            <h2>{{ $product->name }}</h2>

            <p class="description">{{ $product->description }}</p>

            <div class="price">${{ $product->price }}</div>
                <p class="stock">
                    @if($product->stock > 0)
                        Stock: {{ $product->stock }}
                    @else
                        Currently unavailable
                    @endif
                </p>


                <a href="/products/{{ $product->id }}" class="view-button">
                    View Item
                </a>
        </div>
    @endforeach
</section>
<script>
    function toggleSortDropdown() {
        document.getElementById('sortMenu').classList.toggle('show');

        const categoryMenu = document.getElementById('categoryMenu');

        if (categoryMenu) {
            categoryMenu.classList.remove('show');
        }
    }

    function selectSort(value, label) {
        document.getElementById('sortInput').value = value;
        document.getElementById('sortLabel').innerText = label;
        document.getElementById('sortMenu').classList.remove('show');
    }

    function toggleCategoryDropdown() {
        document.getElementById('categoryMenu').classList.toggle('show');

        const sortMenu = document.getElementById('sortMenu');

        if (sortMenu) {
            sortMenu.classList.remove('show');
        }
    }

    function selectCategory(value, label) {
        document.getElementById('categoryInput').value = value;
        document.getElementById('categoryLabel').innerText = label;
        document.getElementById('categoryMenu').classList.remove('show');
    }

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-filter-dropdown')) {
            document
                .querySelectorAll('.custom-filter-menu')
                .forEach(function(menu) {
                    menu.classList.remove('show');
                });
        }
    });
</script>
</body>
</html>
