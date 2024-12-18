@extends('base')

@section('title', "Do'konlarim")

@section('content')
    <h1>Do'konlarim</h1>
    @foreach ($shops as $shop)
        <div class="shop-card">
            <h3>Do'kon: <a href="{{ route('shopShow', $shop->id) }}">{{ $shop->name }}</a></h3>
            <p>Manzil: {{ $shop->address }}</p>
        </div>
    @endforeach
@endsection
