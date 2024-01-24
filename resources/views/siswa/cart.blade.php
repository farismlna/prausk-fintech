@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col">
        <a class="btn btn-primary btn-sm mb-4" href="{{ route('home')}}">Kembali</a>
    
        <div>
            <form action="{{ route('topUpNow') }}"  method="POST">
                @csrf
                <p style="font-size: 16px; font-weight: bold">Keranjangmu</p>
                {{-- @foreach ($collection as $item)
                    
                @endforeach --}}
            </form>
        </div>
    </div>
</div>

@endsection