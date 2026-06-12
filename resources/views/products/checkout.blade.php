<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout | LootMarket</title>

    <style>
        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            min-height:100vh;
            overflow-x:hidden;

            font-family:Arial,sans-serif;
            color:#2f2f3a;

            background:
                radial-gradient(circle at 8% 18%, rgba(255,145,210,0.35), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120,165,255,0.32), transparent 24%),
                radial-gradient(circle at 50% 95%, rgba(255,210,235,0.45), transparent 30%),
                linear-gradient(135deg,#ffe9f7,#efe5ff,#dceeff);
        }

        .page{
            max-width:1300px;
            margin:60px auto;
            padding:0 40px 70px;

            position:relative;
            z-index:2;
        }

        .checkout-header{
            text-align:center;
            margin-bottom:45px;
        }

        .checkout-header h1{
            margin:0 0 12px;
            font-size:54px;

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

        .checkout-header p{
            margin:0;
            color:#6f6f80;
            font-size:17px;
        }

        .checkout-layout{
            display:grid;
            grid-template-columns:1.12fr 0.8fr;
            gap:34px;
            align-items:start;
        }

        .payment-card,
        .summary-card{
            padding:34px;
            border-radius:34px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,240,248,0.82),
                    rgba(242,237,255,0.80),
                    rgba(226,241,255,0.78)
                );

            backdrop-filter:blur(24px);

            border:1px solid rgba(255,255,255,0.75);

            box-shadow:
                0 24px 70px rgba(160,170,255,0.18);
        }

        .summary-card{
            position:sticky;
            top:125px;
        }

        .section-title{
            margin:0 0 24px;
            font-size:28px;
            color:#d46f8d;
        }

        .form-section-title{
            margin:32px 0 20px;
            font-size:23px;
            color:#d46f8d;
        }

        .form-section-title.first{
            margin-top:0;
        }

        label{
            display:block;
            margin-bottom:8px;

            color:#4a4a58;
            font-size:14px;
            font-weight:800;
        }

        input,
        textarea{
            width:100%;

            margin-bottom:20px;
            padding:16px 18px;

            border:1px solid rgba(210,210,230,0.72);
            border-radius:18px;
            outline:none;

            color:#2f2f3a;
            font-family:Arial,sans-serif;
            font-size:15px;

            background:rgba(255,255,255,0.78);

            transition:0.24s;
        }

        textarea{
            min-height:120px;
            resize:vertical;
            line-height:1.6;
        }

        input:focus,
        textarea:focus{
            border-color:#ff7eb6;

            box-shadow:
                0 0 0 4px rgba(255,126,182,0.13);
        }

        .form-row{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
        }

        .checkout-options{
            display:flex;
            flex-direction:column;
            gap:12px;
            margin-bottom:25px;
        }

        .checkout-option{
            display:flex;
            align-items:center;
            gap:13px;

            margin:0;
            padding:16px 18px;

            border-radius:19px;
            cursor:pointer;

            background:rgba(255,255,255,0.62);
            border:1px solid rgba(255,255,255,0.74);

            transition:0.25s;
        }

        .checkout-option:hover{
            transform:translateY(-2px);
            background:rgba(255,255,255,0.82);
        }

        .checkout-option:has(input:checked){
            border-color:rgba(255,126,182,0.42);

            background:
                linear-gradient(
                    135deg,
                    rgba(255,218,237,0.70),
                    rgba(220,229,255,0.72)
                );

            box-shadow:
                0 12px 28px rgba(160,150,255,0.14);
        }

        .checkout-option input{
            width:auto;
            margin:0;
            accent-color:#d46f8d;
        }

        .checkout-option span{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;

            width:100%;
        }

        .checkout-option strong{
            color:#424250;
        }

        .checkout-option small{
            color:#d46f8d;
            font-size:13px;
            font-weight:800;
        }

        .fake-card{
            min-height:165px;
            margin:8px 0 30px;
            padding:28px;

            border-radius:30px;
            color:white;

            background:
                radial-gradient(circle at top right, rgba(255,255,255,0.24), transparent 25%),
                linear-gradient(135deg,#ff7eb6,#9a8cff,#7aa8ff);

            box-shadow:
                0 24px 60px rgba(150,130,255,0.28);
        }

        .fake-card-top{
            display:flex;
            justify-content:space-between;

            margin-bottom:42px;
            font-weight:800;
        }

        .fake-card-number{
            margin-bottom:24px;
            font-size:24px;
            letter-spacing:3px;
        }

        .fake-card-bottom{
            display:flex;
            justify-content:space-between;

            font-size:14px;
            opacity:0.95;
        }

        .checkout-error{
            margin-bottom:25px;
            padding:17px 20px;

            border-radius:18px;

            color:#a83e5d;
            font-weight:700;

            background:rgba(255,225,235,0.90);
            border:1px solid rgba(240,95,127,0.25);
        }

        .checkout-error strong{
            display:block;
            margin-bottom:8px;
        }

        .checkout-error ul{
            margin:0;
            padding-left:20px;
            line-height:1.7;
        }

        .field-error{
            margin:-12px 0 18px;
            color:#dc426d;
            font-size:13px;
            font-weight:700;
        }

        .pay-btn{
            width:100%;

            margin-top:28px;
            padding:18px 24px;

            border:none;
            border-radius:22px;

            color:white;
            font-size:17px;
            font-weight:900;

            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    #ff62a9,
                    #7d8fff
                );

            box-shadow:
                0 18px 45px rgba(150,130,255,0.32);

            transition:0.3s;
        }

        .pay-btn:hover{
            transform:translateY(-4px);

            box-shadow:
                0 25px 55px rgba(150,130,255,0.42);
        }

        .secure-note{
            margin-top:20px;

            color:#777;
            font-size:14px;
            line-height:1.6;
        }

        .summary-item{
            display:flex;
            align-items:center;
            gap:14px;

            padding:14px 0;

            border-bottom:1px solid rgba(210,210,230,0.35);
        }

        .summary-img{
            width:72px;
            height:52px;

            object-fit:cover;
            border-radius:14px;
        }

        .summary-info{
            flex:1;
        }

        .summary-info h3{
            margin:0 0 5px;
            font-size:16px;
        }

        .summary-info p{
            margin:0;
            color:#777;
            font-size:14px;
        }

        .summary-price{
            color:#d46f8d;
            font-weight:900;
        }

        .summary-row{
            display:flex;
            justify-content:space-between;
            align-items:center;

            margin-top:16px;

            color:#5f5f70;
        }

        .summary-divider{
            height:1px;
            margin:22px 0;

            background:rgba(190,190,210,0.45);
        }

        .summary-total{
            display:flex;
            justify-content:space-between;
            align-items:center;

            font-size:25px;
            font-weight:900;
        }

        .total-price{
            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #8f8dff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .back-btn{
            display:block;

            margin-top:18px;
            padding:15px 24px;

            border-radius:20px;

            color:#d46f8d;
            text-align:center;
            text-decoration:none;
            font-weight:800;

            background:rgba(255,255,255,0.62);

            transition:0.25s;
        }

        .back-btn:hover{
            transform:translateY(-2px);
            background:rgba(255,255,255,0.86);
        }

        .glow{
            position:fixed;
            z-index:0;

            border-radius:50%;

            filter:blur(90px);
            opacity:0.25;

            pointer-events:none;
        }

        .glow-1{
            width:340px;
            height:340px;

            top:240px;
            left:5%;

            background:#ff8bcf;
        }

        .glow-2{
            width:420px;
            height:420px;

            right:6%;
            bottom:80px;

            background:#9d9cff;
        }

        @media(max-width:950px){
            .checkout-layout{
                grid-template-columns:1fr;
            }

            .summary-card{
                position:static;
            }
        }

        @media(max-width:700px){
            .page{
                padding:0 18px 50px;
                margin-top:38px;
            }

            .form-row{
                grid-template-columns:1fr;
                gap:0;
            }

            .payment-card,
            .summary-card{
                padding:24px;
            }

            .checkout-header h1{
                font-size:42px;
            }
        }
        .phone-row{
            display:grid;
            grid-template-columns:210px 1fr;
            gap:14px;
            margin-bottom:20px;
            align-items:start;
        }

        .phone-row input{
            margin-bottom:0;
        }

        .country-code-dropdown{
            position:relative;
            z-index:20;
        }

        .country-code-trigger{
            width:100%;
            min-height:52px;

            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:12px;

            padding:15px 18px;

            border:1px solid rgba(210,210,230,0.72);
            border-radius:18px;

            color:#3f3f4d;
            font-size:15px;
            font-weight:700;
            text-align:left;

            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.88),
                    rgba(244,240,255,0.86)
                );

            box-shadow:
                0 10px 24px rgba(160,150,255,0.10);

            transition:0.25s;
        }

        .country-code-trigger:hover,
        .country-code-dropdown.open .country-code-trigger{
            border-color:#ff7eb6;

            box-shadow:
                0 0 0 4px rgba(255,126,182,0.12),
                0 14px 30px rgba(160,150,255,0.14);
        }

        .country-code-arrow{
            color:#d46f8d;
            font-size:20px;
            transition:0.25s;
        }

        .country-code-dropdown.open .country-code-arrow{
            transform:rotate(180deg);
        }

        .country-code-menu{
            position:absolute;
            top:calc(100% + 10px);
            left:0;
            right:0;

            display:none;

            max-height:280px;
            overflow-y:auto;

            padding:10px;

            border:1px solid rgba(255,255,255,0.80);
            border-radius:22px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,235,246,0.97),
                    rgba(237,234,255,0.97),
                    rgba(226,239,255,0.97)
                );

            backdrop-filter:blur(22px);

            box-shadow:
                0 24px 55px rgba(130,120,200,0.24);
        }

        .country-code-dropdown.open .country-code-menu{
            display:block;
        }

        .country-code-menu button{
            width:100%;

            padding:13px 15px;

            border:none;
            border-radius:14px;

            color:#3f3f4d;
            font-size:15px;
            font-weight:700;
            text-align:left;

            cursor:pointer;
            background:transparent;

            transition:0.2s;
        }

        .country-code-menu button:hover,
        .country-code-menu button.active{
            color:#d44784;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,180,215,0.42),
                    rgba(180,185,255,0.40)
                );

            transform:translateX(3px);
        }

        .phone-row input{
            margin-bottom:0;
        }

        .phone-row select:focus{
            border-color:#ff7eb6;
            box-shadow:0 0 0 4px rgba(255,126,182,0.13);
        }

        @media(max-width:700px){
            .phone-row{
                grid-template-columns:1fr;
            }
        }
        @media(max-width:650px){
            .page{
                margin:30px auto;
                padding:0 15px 45px;
            }

            .checkout-header{
                margin-bottom:28px;
            }

            .checkout-header h1{
                font-size:39px;
                line-height:1.1;
            }

            .checkout-header p{
                padding:0 8px;
                font-size:15px;
                line-height:1.5;
            }

            .checkout-layout{
                gap:22px;
            }

            .payment-card,
            .summary-card{
                padding:19px;
                border-radius:26px;
            }

            .form-section-title{
                margin:27px 0 17px;
                font-size:21px;
            }

            .form-section-title.first{
                margin-top:0;
            }

            input,
            textarea{
                padding:15px 16px;
                border-radius:16px;
                font-size:15px;
            }

            textarea{
                min-height:105px;
            }

            .phone-row{
                grid-template-columns:1fr;
                gap:12px;
            }

            .country-code-trigger{
                min-height:52px;
                padding:14px 16px;
            }

            .country-code-menu{
                max-height:230px;
            }

            .checkout-option{
                align-items:flex-start;
                padding:14px 15px;
            }

            .checkout-option span{
                align-items:flex-start;
                flex-direction:column;
                gap:5px;
            }

            .checkout-option small{
                font-size:12px;
            }

            .fake-card{
                min-height:145px;
                padding:21px;
                border-radius:24px;
            }

            .fake-card-top{
                margin-bottom:31px;
                font-size:14px;
            }

            .fake-card-number{
                margin-bottom:20px;
                font-size:18px;
                letter-spacing:2px;
                overflow-wrap:anywhere;
            }

            .fake-card-bottom{
                gap:15px;
                font-size:12px;
            }

            .pay-btn{
                margin-top:23px;
                padding:17px 16px;
                font-size:15px;
            }

            .secure-note{
                font-size:13px;
            }

            .section-title{
                font-size:25px;
            }

            .summary-item{
                display:grid;
                grid-template-columns:64px minmax(0,1fr);
                gap:12px;
                align-items:center;
            }

            .summary-img{
                width:64px;
                height:52px;
            }

            .summary-info{
                min-width:0;
            }

            .summary-info h3{
                overflow-wrap:anywhere;
            }

            .summary-price{
                grid-column:2;
                justify-self:start;
            }

            .summary-row{
                gap:14px;
                font-size:14px;
            }

            .summary-total{
                gap:14px;
                font-size:21px;
            }

            .back-btn{
                padding:14px 18px;
            }

            .glow-1,
            .glow-2{
                opacity:0.16;
            }
        }
    </style>
</head>

<body>

<div class="glow glow-1"></div>
<div class="glow glow-2"></div>

@include('partials.navbar')

<div class="page">

    <div class="checkout-header">
        <h1>Checkout</h1>

        <p>
            Complete your order with secure billing and delivery information.
        </p>
    </div>

    @php
        $subtotal = 0;
    @endphp

    @foreach($cart as $item)
        @php
            $subtotal += $item['price'] * $item['quantity'];
        @endphp
    @endforeach

    @php
        $tax = round($subtotal * 0.08, 2);
        $initialShipping = old('shipping_method') === 'Standard Shipping' ? 4 : 0;
        $initialGrandTotal = $subtotal + $tax + $initialShipping;
    @endphp

    <div class="checkout-layout">

        <div class="payment-card">

            <form action="/checkout/pay" method="POST">
                @csrf

                @if($errors->any())
                    <div class="checkout-error">
                        <strong>Please check the following fields:</strong>

                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2 class="form-section-title first">
                    Billing Information
                </h2>

                <label for="name">Full Name</label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name', auth()->user()->name ?? '') }}"
                    placeholder="Enter your full name"
                    autocomplete="name"
                    required
                >

                @error('name')
                <p class="field-error">{{ $message }}</p>
                @enderror

                <label for="email">Email Address</label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', auth()->user()->email ?? '') }}"
                    placeholder="example@mail.com"
                    autocomplete="email"
                    required
                >

                @error('email')
                <p class="field-error">{{ $message }}</p>
                @enderror

                <label for="phone">Phone Number</label>

                <div class="phone-row">
                    <div class="country-code-dropdown" id="countryCodeDropdown">

                        <input
                            type="hidden"
                            name="phone_code"
                            id="phone_code"
                            value="{{ old('phone_code', '+90') }}"
                        >

                        <button
                            type="button"
                            class="country-code-trigger"
                            id="countryCodeTrigger"
                        >
                            <span id="selectedCountryCode">+90 Türkiye</span>
                            <span class="country-code-arrow">⌄</span>
                        </button>

                        <div class="country-code-menu" id="countryCodeMenu">

                            <button type="button" data-value="+90">
                                +90 Türkiye
                            </button>

                            <button type="button" data-value="+1">
                                +1 USA / Canada
                            </button>

                            <button type="button" data-value="+44">
                                +44 United Kingdom
                            </button>

                            <button type="button" data-value="+49">
                                +49 Germany
                            </button>

                            <button type="button" data-value="+33">
                                +33 France
                            </button>

                            <button type="button" data-value="+39">
                                +39 Italy
                            </button>

                            <button type="button" data-value="+34">
                                +34 Spain
                            </button>

                        </div>

                    </div>

                    <input
                        id="phone"
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="532 123 45 67"
                        autocomplete="tel"
                    >
                </div>

                @error('phone_code')
                <p class="field-error">{{ $message }}</p>
                @enderror

                @error('phone')
                <p class="field-error">{{ $message }}</p>
                @enderror

                <label for="address">Address</label>

                <textarea
                    id="address"
                    name="address"
                    placeholder="Enter your full delivery address"
                    autocomplete="street-address"
                    required
                >{{ old('address') }}</textarea>

                @error('address')
                <p class="field-error">{{ $message }}</p>
                @enderror

                <div class="form-row">
                    <div>
                        <label for="city">City</label>

                        <input
                            id="city"
                            type="text"
                            name="city"
                            value="{{ old('city') }}"
                            placeholder="Istanbul"
                            autocomplete="address-level2"
                            required
                        >

                        @error('city')
                        <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="country">Country</label>

                        <input
                            id="country"
                            type="text"
                            name="country"
                            value="{{ old('country') }}"
                            placeholder="Türkiye"
                            autocomplete="country-name"
                            required
                        >

                        @error('country')
                        <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <label for="zip_code">ZIP Code</label>

                <input
                    id="zip_code"
                    type="text"
                    name="zip_code"
                    value="{{ old('zip_code') }}"
                    placeholder="34000"
                    autocomplete="postal-code"
                >

                @error('zip_code')
                <p class="field-error">{{ $message }}</p>
                @enderror

                <h2 class="form-section-title">
                    Shipping Method
                </h2>

                <div class="checkout-options">

                    <label class="checkout-option">
                        <input
                            type="radio"
                            name="shipping_method"
                            value="Free Shipping"
                            {{ old('shipping_method', 'Free Shipping') === 'Free Shipping' ? 'checked' : '' }}
                        >

                        <span>
                            <strong>Free Shipping</strong>
                            <small>$0.00</small>
                        </span>
                    </label>

                    <label class="checkout-option">
                        <input
                            type="radio"
                            name="shipping_method"
                            value="Standard Shipping"
                            {{ old('shipping_method') === 'Standard Shipping' ? 'checked' : '' }}
                        >

                        <span>
                            <strong>Standard Shipping</strong>
                            <small>$4.00</small>
                        </span>
                    </label>

                </div>

                @error('shipping_method')
                <p class="field-error">{{ $message }}</p>
                @enderror

                <h2 class="form-section-title">
                    Payment Method
                </h2>

                <div class="checkout-options">

                    <label class="checkout-option">
                        <input
                            type="radio"
                            name="payment_method"
                            value="Credit Card"
                            {{ old('payment_method', 'Credit Card') === 'Credit Card' ? 'checked' : '' }}
                        >

                        <span>
                            <strong>Credit Card</strong>
                            <small>Demo payment</small>
                        </span>
                    </label>

                    <label class="checkout-option">
                        <input
                            type="radio"
                            name="payment_method"
                            value="Direct Bank Transfer"
                            {{ old('payment_method') === 'Direct Bank Transfer' ? 'checked' : '' }}
                        >

                        <span>
                            <strong>Direct Bank Transfer</strong>
                            <small>Manual transfer</small>
                        </span>
                    </label>

                    <label class="checkout-option">
                        <input
                            type="radio"
                            name="payment_method"
                            value="Cash on Delivery"
                            {{ old('payment_method') === 'Cash on Delivery' ? 'checked' : '' }}
                        >

                        <span>
                            <strong>Cash on Delivery</strong>
                            <small>Pay on arrival</small>
                        </span>
                    </label>

                </div>

                @error('payment_method')
                <p class="field-error">{{ $message }}</p>
                @enderror

                <div id="cardFields">

                    <h2 class="form-section-title">
                        Card Details
                    </h2>

                    <div class="fake-card">

                        <div class="fake-card-top">
                            <span>LootMarket Card</span>
                            <span>VISA</span>
                        </div>

                        <div class="fake-card-number" id="cardPreviewNumber">
                            **** **** **** 2048
                        </div>

                        <div class="fake-card-bottom">
                            <span>
                                CARD HOLDER<br>
                                <span id="cardPreviewName">
                                    {{ auth()->user()->name ?? 'Gamer User' }}
                                </span>
                            </span>

                            <span>
                                EXPIRES<br>
                                <span id="cardPreviewExpiry">12/29</span>
                            </span>
                        </div>

                    </div>

                    <label for="card_number">Card Number</label>

                    <input
                        id="card_number"
                        type="text"
                        inputmode="numeric"
                        maxlength="19"
                        placeholder="1234 5678 9012 3456"
                    >

                    <div class="form-row">

                        <div>
                            <label for="expiry_date">Expiry Date</label>

                            <input
                                id="expiry_date"
                                type="text"
                                maxlength="5"
                                placeholder="MM/YY"
                            >
                        </div>

                        <div>
                            <label for="cvv">CVV</label>

                            <input
                                id="cvv"
                                type="password"
                                inputmode="numeric"
                                maxlength="4"
                                placeholder="123"
                            >
                        </div>

                    </div>

                </div>

                <button type="submit" class="pay-btn">
                    Place Order —
                    $<span id="buttonGrandTotal">
                        {{ number_format($initialGrandTotal, 2) }}
                    </span>
                </button>

            </form>

            <p class="secure-note">
                🔒 This is a project demo payment screen. No real payment
                information is stored or processed.
            </p>

        </div>

        <div class="summary-card">

            <h2 class="section-title">
                Order Summary
            </h2>

            @foreach($cart as $item)

                <div class="summary-item">

                    <img
                        src="{{ $item['image'] }}"
                        class="summary-img"
                        alt="{{ $item['name'] }}"
                    >

                    <div class="summary-info">
                        <h3>{{ $item['name'] }}</h3>
                        <p>Quantity: {{ $item['quantity'] }}</p>
                    </div>

                    <div class="summary-price">
                        ${{ number_format($item['price'] * $item['quantity'], 2) }}
                    </div>

                </div>

            @endforeach

            <div class="summary-row">
                <span>Subtotal</span>
                <strong>${{ number_format($subtotal, 2) }}</strong>
            </div>

            <div class="summary-row">
                <span>Estimated Tax</span>
                <strong>${{ number_format($tax, 2) }}</strong>
            </div>

            <div class="summary-row">
                <span>Shipping</span>

                <strong id="shippingSummary">
                    ${{ number_format($initialShipping, 2) }}
                </strong>
            </div>

            <div class="summary-divider"></div>

            <div class="summary-total">
                <span>Total</span>

                <span class="total-price">
                    $<span id="summaryGrandTotal">
                        {{ number_format($initialGrandTotal, 2) }}
                    </span>
                </span>
            </div>

            <a href="/cart" class="back-btn">
                ← Back to Cart
            </a>

        </div>

    </div>

</div>

<script>
    const subtotal = {{ (float) $subtotal }};
    const tax = {{ (float) $tax }};

    const shippingInputs = document.querySelectorAll(
        'input[name="shipping_method"]'
    );

    function updateCheckoutTotal() {
        const selectedShipping = document.querySelector(
            'input[name="shipping_method"]:checked'
        );

        const shippingPrice =
            selectedShipping &&
            selectedShipping.value === 'Standard Shipping'
                ? 4
                : 0;

        const grandTotal = subtotal + tax + shippingPrice;

        document.getElementById('shippingSummary').textContent =
            '$' + shippingPrice.toFixed(2);

        document.getElementById('summaryGrandTotal').textContent =
            grandTotal.toFixed(2);

        document.getElementById('buttonGrandTotal').textContent =
            grandTotal.toFixed(2);
    }

    shippingInputs.forEach(function (input) {
        input.addEventListener('change', updateCheckoutTotal);
    });

    const paymentInputs = document.querySelectorAll(
        'input[name="payment_method"]'
    );

    const cardFields = document.getElementById('cardFields');

    function updatePaymentFields() {
        const selectedPayment = document.querySelector(
            'input[name="payment_method"]:checked'
        );

        if (
            selectedPayment &&
            selectedPayment.value === 'Credit Card'
        ) {
            cardFields.style.display = 'block';
        } else {
            cardFields.style.display = 'none';
        }
    }

    paymentInputs.forEach(function (input) {
        input.addEventListener('change', updatePaymentFields);
    });

    const nameInput = document.getElementById('name');
    const cardNumberInput = document.getElementById('card_number');
    const expiryInput = document.getElementById('expiry_date');

    nameInput.addEventListener('input', function () {
        document.getElementById('cardPreviewName').textContent =
            nameInput.value || 'Gamer User';
    });

    cardNumberInput.addEventListener('input', function () {
        let value = cardNumberInput.value
            .replace(/\D/g, '')
            .slice(0, 16);

        value = value.replace(/(.{4})/g, '$1 ').trim();

        cardNumberInput.value = value;

        document.getElementById('cardPreviewNumber').textContent =
            value || '**** **** **** 2048';
    });

    expiryInput.addEventListener('input', function () {
        let value = expiryInput.value
            .replace(/\D/g, '')
            .slice(0, 4);

        if (value.length >= 3) {
            value = value.slice(0, 2) + '/' + value.slice(2);
        }

        expiryInput.value = value;

        document.getElementById('cardPreviewExpiry').textContent =
            value || '12/29';
    });

    updateCheckoutTotal();
    updatePaymentFields();
    const phoneInput = document.getElementById('phone');

    phoneInput.addEventListener('input', function () {
        let digits = phoneInput.value
            .replace(/\D/g, '')
            .slice(0, 10);

        let formatted = '';

        if (digits.length > 0) {
            formatted += digits.slice(0, 3);
        }

        if (digits.length > 3) {
            formatted += ' ' + digits.slice(3, 6);
        }

        if (digits.length > 6) {
            formatted += ' ' + digits.slice(6, 8);
        }

        if (digits.length > 8) {
            formatted += ' ' + digits.slice(8, 10);
        }

        phoneInput.value = formatted;
    });
    const countryCodeDropdown =
        document.getElementById('countryCodeDropdown');

    const countryCodeTrigger =
        document.getElementById('countryCodeTrigger');

    const countryCodeMenu =
        document.getElementById('countryCodeMenu');

    const phoneCodeInput =
        document.getElementById('phone_code');

    const selectedCountryCode =
        document.getElementById('selectedCountryCode');

    const countryCodeOptions =
        countryCodeMenu.querySelectorAll('button');

    const countryLabels = {
        '+90': '+90 Türkiye',
        '+1': '+1 USA / Canada',
        '+44': '+44 United Kingdom',
        '+49': '+49 Germany',
        '+33': '+33 France',
        '+39': '+39 Italy',
        '+34': '+34 Spain'
    };

    function setSelectedCountryCode(value) {
        phoneCodeInput.value = value;

        selectedCountryCode.textContent =
            countryLabels[value] || value;

        countryCodeOptions.forEach(function (option) {
            option.classList.toggle(
                'active',
                option.dataset.value === value
            );
        });
    }

    countryCodeTrigger.addEventListener('click', function () {
        countryCodeDropdown.classList.toggle('open');
    });

    countryCodeOptions.forEach(function (option) {
        option.addEventListener('click', function () {
            setSelectedCountryCode(option.dataset.value);
            countryCodeDropdown.classList.remove('open');
        });
    });

    document.addEventListener('click', function (event) {
        if (!countryCodeDropdown.contains(event.target)) {
            countryCodeDropdown.classList.remove('open');
        }
    });

    setSelectedCountryCode(phoneCodeInput.value || '+90');
</script>

</body>
</html>
