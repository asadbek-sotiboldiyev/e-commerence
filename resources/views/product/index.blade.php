@extends('base')

@section('title', "Mahsulot qo'shish")

@section('content')
    <h1>Mahsulotlar</h1>

    <x-product-grid-display :products="$products"/>



@endsection
