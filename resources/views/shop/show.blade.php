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
        <x-product-grid-display :products="$shop->products"/>
    </div>
@endsection
