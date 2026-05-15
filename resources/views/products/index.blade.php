<!DOCTYPE html>
<html>
<head>
    <title>LootMarket</title>
</head>
<body>

<h1>🎮 LootMarket Products</h1>

@foreach($products as $product)

    <div style="border:1px solid black; padding:15px; margin:15px; width:300px;">

        <h2>{{ $product->name }}</h2>

        <p><strong>Game:</strong> {{ $product->game }}</p>

        <p><strong>Type:</strong> {{ $product->type }}</p>

        <p><strong>Price:</strong> ${{ $product->price }}</p>

        <p><strong>Stock:</strong> {{ $product->stock }}</p>

        <p>{{ $product->description }}</p>

    </div>

@endforeach

</body>
</html>
