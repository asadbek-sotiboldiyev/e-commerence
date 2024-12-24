@extends('base')

@section('title', $shop->name)

@section('content')
    <div>
        <h1>{{ $shop->name }}</h1>
        <p>Manzil: {{ $shop->address }}</p>
        <p>{{ $shop->description }}</p>
        <p>Sotuvchi: {{ $shop->seller()->name }}</p>
    </div>
    <hr>
    
    @can('addProduct', $shop)
        <a href="#">
            <button>Mahsulot qo'shish</button>
        </a>
    @endcan
@endsection
