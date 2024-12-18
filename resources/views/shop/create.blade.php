@extends('base')

@section('title', "Do'koningizni yarating")

@section('content')
	<form method="POST">
		@csrf
		<h1>Do'koningizni qo'shing</h1>
		<div class="form-control">
			<label>Do'kon nomi</label>
			<input type="text" name="name">
		</div>
		<div class="form-control">
			<label>Ma'lomot</label>
			<br>
			<textarea name="description" id="" cols="30" rows="10"></textarea>
		</div>
		<div class="form-control">
			<label>Manzil</label>
			<input type="text" name="address">
		</div>
		<div class="form-control">
			<label>Telefon raqam</label>
			<input type="number" name="phone">
		</div>
		<button>Qo'shish</button>
	</form>
@endsection