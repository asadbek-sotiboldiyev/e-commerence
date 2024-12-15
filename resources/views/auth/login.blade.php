@extends('base')

@section('title', 'Kirish')

@section('content')
    <form action="" method="POST">
        @csrf
        <h1>Kirish</h1>
        <div class="form-control">
            <label for="emailInput">Email</label>
            <input type="email" name="email" id="emailInput" value="{{ session('email') }}">
        </div>
        <div class="form-control">
            <label for="passwordInput">Parol</label>
            <input type="password" name="password" id="passwordInput">
        </div>
        <button>Kirish</button>
        <hr>
        <a href="{{ route('register') }}">Ro'yxatdan o'tish</a>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
