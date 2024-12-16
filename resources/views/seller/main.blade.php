@extends('base')

@section('title', "Seller")

@section('content')
    <h1>Seller bo'limi</h1>
    <hr>

    @if (session('newseller'))
        <div class="alert alert-success">
            {{ session('newseller') }}
        </div>
    @endif
    
    <h3>Sotuvchi: {{ $seller->name }}</h3>
@endsection