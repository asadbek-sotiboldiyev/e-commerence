@extends('base')

@section('title', "Mahsulot qo'shish")

@section('content')
	<form method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>Do'kon</label>
            <select name="shop_id">
                @foreach ($shops as $shop)
                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                @endforeach
            </select>
		</div>
		<div class="form-control">
			<label>Maxsult nomi</label>
			<input type="text" name="name">
		</div>
		<div class="form-control">
			<label>Maxsult tavsifi:</label>
            <br>
            <textarea name="description" cols="30" rows="10"></textarea>
		</div>
        <div class="form-control">
			<label>Narx</label>
			<input type="number" name="price" value="1000">
            <span>so'm</span>
		</div>
		<div class="form-control">
			<label>Sotuvda bor</label>
			<input type="number" name="stock" value="1">
		</div>
		<div class="form-control">
			<label>Maxsulot surati</label>
			<input type="file" name="image" accept="image/*">
		</div>

		<button>Qo'shish</button>
	</form>
@endsection