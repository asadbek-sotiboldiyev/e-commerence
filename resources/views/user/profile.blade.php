@extends('base')

@section('title', 'Profile')

@section('content')
	<form>
		<h2>{{ $user->name }}</h2>
		<div class="form-control">
			<label>Ism</label>
			<input type="text" name="name" value="{{ $user->name }}">
		</div>
		<div class="form-control">
			<label>Telefon</label>
			<input type="text" name="phone" value="{{ $user->phone }}">
		</div>
		<div class="form-control">
			<label>Email</label>
			<input type="email" name="email" value="{{ $user->email }}">
		</div>
		<div class="form-control">
			<label>Manzil</label>
			<input type="text" name="address" value="{{ $user->address }}">
		</div>
	</form>
	<h3>
		<a href="#">Sotuvchi bo'ling</a>
	</h3>
@endsection