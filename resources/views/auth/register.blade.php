@extends('base')

@section('title', 'Kirish')

@section('content')
<form action="" method="POST">
    @csrf
    <h1>Ro'yxatdan o'tish</h1>
    <div class="form-control">
        <label for="nameInput">Ism</label>
        <input type="text" name="name" id="nameInput">
        @error('name')
            <p>*{{ $message }}
            </p>
        @enderror
    </div>
    <div class="form-control">
        <label for="emailInput">Email</label>
        <input type="email" name="email" id="emailInput">
        @error('email')
            <p>*{{ $message }}
            </p>
        @enderror
    </div>
    <div class="form-control">
        <label for="passwordInput">Parol</label>
        <input type="password" name="password" id="passwordInput">
        @error('password')
            <p>*{{ $message }}
            </p>
        @enderror
    </div>
    <div class="form-control">
        <label for="password2Input">Parolni takrorlang</label>
        <input type="password" name="password2" id="passwordI2nput">
        @error('password2')
            <p>*{{ $message }}
            </p>
        @enderror
    </div>
    <button>Ro'yxatdan o'tish</button>
    <hr>
    <a href="{{ route('login') }}">Kirish</a>
</form>
@endsection