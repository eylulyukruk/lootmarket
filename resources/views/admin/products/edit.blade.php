<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:linear-gradient(135deg,#fff7f8,#f8f5f2,#edf5f8);
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
            background:rgba(255,255,255,0.45);
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
            background:rgba(255,255,255,0.9);
            padding:40px;
            border-radius:28px;
            max-width:700px;
            box-shadow:0 15px 35px rgba(0,0,0,0.06);
        }

        input,
        select{
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
            background:linear-gradient(135deg,#d8b4be,#9fb7c9);
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
        .current-image-box{
            margin-bottom:20px;
        }

        .current-image-box label{
            display:block;
            margin-bottom:10px;
            color:#444;
            font-weight:700;
        }

        .current-product-image{
            display:block;
            width:150px;
            height:110px;
            object-fit:cover;
            border-radius:18px;
            margin-bottom:16px;
            border:1px solid rgba(210,210,230,0.7);
        }
        .field-error{
            margin:-12px 0 18px;
            color:#dc426d;
            font-size:13px;
            font-weight:700;
        }
        .error-box{
            max-width:700px;
            margin-bottom:22px;
            padding:17px 20px;
            border-radius:18px;
            color:#a83e5d;
            background:rgba(255,225,235,0.88);
            border:1px solid rgba(240,95,127,0.24);
        }

        .error-box ul{
            margin:9px 0 0;
            padding-left:20px;
        }
    </style>
</head>
<body>

<div class="layout">

    @include('admin.partials.sidebar')

    <div class="content">

        <h1>Edit Product</h1>
        @if($errors->any())
            <div class="error-box">
                <strong>Product could not be updated:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/products/update/{{ $product->id }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $product->name }}" placeholder="Product Name">

            <input type="text" name="game" value="{{ $product->game }}" placeholder="Game / Brand">

            <input type="text" name="category" value="{{ $product->category }}" placeholder="Category">

            <input type="text" name="type" value="{{ $product->type }}" placeholder="Type">
            <div class="form-group">
                <label for="rarity">Rarity</label>

                <select id="rarity" name="rarity">
                    <option
                        value=""
                        {{ old('rarity', $product->rarity) === null ||
                           old('rarity', $product->rarity) === ''
                            ? 'selected'
                            : '' }}
                    >
                        No Rarity
                    </option>

                    <option
                        value="Mil-Spec"
                        {{ old('rarity', $product->rarity) === 'Mil-Spec'
                            ? 'selected'
                            : '' }}
                    >
                        Mil-Spec
                    </option>

                    <option
                        value="Restricted"
                        {{ old('rarity', $product->rarity) === 'Restricted'
                            ? 'selected'
                            : '' }}
                    >
                        Restricted
                    </option>

                    <option
                        value="Classified"
                        {{ old('rarity', $product->rarity) === 'Classified'
                            ? 'selected'
                            : '' }}
                    >
                        Classified
                    </option>

                    <option
                        value="Covert"
                        {{ old('rarity', $product->rarity) === 'Covert'
                            ? 'selected'
                            : '' }}
                    >
                        Covert
                    </option>

                    <option
                        value="Rare Special"
                        {{ old('rarity', $product->rarity) === 'Rare Special'
                            ? 'selected'
                            : '' }}
                    >
                        Rare Special
                    </option>
                </select>

                @error('rarity')
                <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            @if($product->image)
                <div class="current-image-box">
                    <label>Current Image</label>

                    <img
                        src="{{ $product->image }}"
                        alt="{{ $product->name }}"
                        class="current-product-image"
                    >
                </div>
            @endif

            <label for="image">Change Image</label>

            <input
                id="image"
                type="file"
                name="image"
                accept="image/*"
            >

            <input type="number" step="0.01" name="price" value="{{ $product->price }}" placeholder="Price">

            <input type="number" name="stock" value="{{ $product->stock }}" placeholder="Stock">

            <input type="text" name="description" value="{{ $product->description }}" placeholder="Description">

            <button type="submit">
                Update Product
            </button>
        </form>

    </div>

</div>

</body>
</html>
