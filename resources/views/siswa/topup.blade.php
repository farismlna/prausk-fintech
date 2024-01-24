@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn btn-outline-dark btn-sm mb-4" href="{{ route('home')}}">Kembali</a>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <form action="{{ route('topUpNow') }}"  method="POST">
            @csrf
            <p style="font-size: 16px; font-weight: bold">Top Up</p>
            <input type="number" placeholder="Masukkan Nominal" class="form-control bg-white mb-3" name="credit" min="10000" value="10000">
            <button class="btn btn-primary" style="width: 100%" type="submit">Top Up</button>
        </form>
    </div>
</div>


@endsection