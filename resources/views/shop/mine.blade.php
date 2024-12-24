@extends('base')

@section('title', "Do'konlarim")

@section('content')
    <h1>Do'konlarim</h1>
    @forelse ($shops as $shop)
        <div class="shop-card">
            <h3>Do'kon: <a href="{{ route('shopShow', $shop->id) }}">{{ $shop->name }}</a></h3>
            <p>Manzil: {{ $shop->address }}</p>
        </div>
    @empty
        <h2>Sizda hali do'kon yo'q</h2>
    @endforelse
    <a href="#">
        <button>Do'kon qo'shish</button>
    </a>
@endsection
