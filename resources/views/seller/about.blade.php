@extends('base')

@section('title', "Seller bo'ling")

@section('content')
	<center>
		<h1>Lara-market da sotuvchi bo'ling</h1>
		<button><a href="{{ route('sellerRegister') }}">Seller bo'lish ></a></button>
	</center>
@endsection