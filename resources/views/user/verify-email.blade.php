@extends('layouts.main')

@section('title', 'Home page')

@section('content')
 <div class="alert alert-info" role="alert">Thank you for registerung! Log in to your email</div>

    <div>
        Have you not received the letter?
        <form method="post" action="{{route('verification.send')}}">
            @csrf
            <button type="submit" class="btn btn-link ps-0">Send link</button>
        </form>
    </div>

@endsection
