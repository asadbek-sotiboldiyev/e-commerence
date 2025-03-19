@extends('base')


@section('content')
    <h1>Xush kelibsiz</h1>

    <x-product-grid-display :products="$products"/>
@endsection
