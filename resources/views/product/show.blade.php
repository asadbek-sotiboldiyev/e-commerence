@extends('base')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <div class="product-card">
        <img src="{{ asset($product->image()->path) }}" width="200">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }} SO'M</p>
        <p>Sotuvda bor: {{ $product->stock }}</p>
        <p>Sotuvchi: 
            <a href="{{ route('shopShow', [$product->shop->id]) }}">{{ $product->shop->name }}</a>
        </p>
        <p>Xususiyatlar: {{ $product->description }}</p>
    </div>



@endsection