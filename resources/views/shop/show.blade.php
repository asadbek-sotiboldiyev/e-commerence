@extends('base')

@section('title', $shop->name)

@section('content')
    <div>
        <h1>{{ $shop->name }}</h1>
        <p>Manzil: {{ $shop->address }}</p>
        <p>{{ $shop->description }}</p>
        <p>Sotuvchi: {{ $shop->sellerUser()->name }}</p>
    </div>
    <hr>
    
    @can('addProduct', $shop)
        <a href="{{ route('productCreate') }}">
            <button>Mahsulot qo'shish</button>
        </a>
    @endcan

    <hr>
    <h1>Mahsulotlar</h1>
    <div>
        @foreach ($shop->products as $product)
            <div class="product-card">
                <img src="{{ asset($product->image()->path) }}" width="200">
                <h3><a href="{{ route('productShow', [$product->id]) }}">{{ $product->name }}</a></h3>
                <p>{{ $product->price }}</p>
            </div>
        @endforeach
    </div>
@endsection
