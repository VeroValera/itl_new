@extends('layouts.app')

@section('content')
    <h1>Catalog</h1>

    <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route('catalog.category', $category->id) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
@endsection
