@extends('base')

@section('title', 'Kirish')

@section('content')
    <form action="" method="POST">
        @csrf
        <h1>Kirish</h1>
        <div class="form-control">
            <label for="emailInput">Email</label>
            <input type="email" name="email" id="emailInput" value="{{ session('email') }}">
            @error('email')
                <p>*{{ $message }}</p>
            @enderror
        </div>
        <div class="form-control">
            <label for="passwordInput">Parol</label>
            <input type="password" name="password" id="passwordInput">
            @error('password')
                <p>*{{ $message }}</p>
            @enderror
        </div>
        @error('loginError')
            <p>*{{ $message }}</p>
        @enderror
        <button>Kirish</button>
        <hr>
        <a href="{{ route('register') }}">Ro'yxatdan o'tish</a>
    </form>
@endsection
