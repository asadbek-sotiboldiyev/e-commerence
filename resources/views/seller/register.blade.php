@extends('base')

@section('title', "Sotuvchi bo'lish")

@section('content')
    <form action="{{ route('sellerRegisterStore') }}" method="POST">
        @csrf
        <div class="form-control">
            <label for="nameInput">*Ismingiz</label>
            <input required readonly type="text" id="nameInput" value="{{ $user->name }}">
        </div>
        <div class="form-control">
            <label for="emailInput">*Email</label>
            <input required readonly type="email" id="emailInput" value="{{ $user->email }}">
        </div>
        <div class="form-control">
            <label for="phoneInput">*Telefon</label>
            <input required type="number" name="phone" id="phoneInput" value="{{ $user->phone }}">
            @error('phone')
                <p>*{{ $message }}</p>
            @enderror
        </div>
        <button>Davom etish</button>
    </form>
@endsection