@extends('base')

@section('title', "Do'konlar")

@section('content')
    <h1>Do'konlar</h1>
    @foreach ($shops as $shop)
        <div>
            <h3><a href="{{ route('shopShow', $shop->id) }}">{{ $shop->name }}</a></h3>
        </div>
        <hr>
    @endforeach

    <hr>

    <div>
        @foreach ($shops->links()->elements[0] as $page => $url)
            <button>
                <a href="{{ $url }}">{{ $page }}</a>
            </button>
        @endforeach
    </div>
@endsection