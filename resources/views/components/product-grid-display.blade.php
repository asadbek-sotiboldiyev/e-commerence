<div>
    @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ asset($product->image()->path) }}" width="200">
            <h3><a href="{{ route('productShow', [$product->id]) }}">{{ $product->name }}</a></h3>
            <p>{{ $product->price }}</p>
        </div>
    @endforeach

    <style>
        .product-card {
            padding: 5px;
            border: 1px solid black;
            display: inline-block;
            max-width: 300px;
        }
    </style>

</div>
