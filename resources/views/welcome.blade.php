@extends('layouts.main')

@section('title', 'Home page')

@section('content')
    <h1>Здарова</h1>

    <li class="nav-item">
        <a href="{{ route('catalog') }}">Catalog</a>
    </li>

@endsection
