@extends('layouts.template')

@section('content')
    {{-- @if (Session::get('alreadyAccess'))
        <div class="alert alert-danger">{{ Session::get('alreadyAccess') }}</div>
    @endif --}}
    <div class="jumbotron py-4 px-5">
        <h1 class="fw-bold font-monospace">
            Selamat Datang!
        </h1>
        <img src="{{ asset('../../public/restoran.jpeg') }}" alt="">
        
        <p class="text-muted">Ini adalah website untuk menghitung data harian restaurant</p>
    </div>
@endsection