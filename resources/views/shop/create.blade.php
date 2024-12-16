@extends('base')

@section('title', "Do'koningizni yarating")

@section('content')
	<form>
		<h1>Do'koningizni qo'shing</h1>
		<div class="form-control">
			<label>Do'kon nomi</label>
			<input type="text" name="name">
		</div>
	</form>
@endsection