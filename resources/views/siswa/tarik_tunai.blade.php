@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col">
        <a class="btn btn-outline-dark btn-sm mb-4" href="{{ route('home')}}">Kembali</a>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div>
            <form action="/requestWithdraw"  method="POST">
                @csrf
                <p style="font-size: 16px; font-weight: bold">Tarik Tunai</p>
                <input type="number" placeholder="Masukkan Nominal" class="form-control bg-white mb-3" name="debit" min="10000" value="10000">
                <button class="btn btn-primary" style="width: 100%" type="submit">Tarik Tunai</button>
            </form>
        </div>
    </div>
</div>

@endsection