@extends('layouts.sidebar_bank')

@section('content')

<div class="" style="margin-left: 360px; margin-top: 40px">
    <div class="container">
        <div class="col d-flex justify-content-between mb-3">
            <span class="" style="font-size: 24px; font-weight: bold">Daftar Permintaan Top Up</span>
            <a href="{{route('newTopUp')}}" class="btn btn-primary" style="margin-right: 95px">Top Up Baru</a>
        </div>
        <div style="padding-right: 95px;">
            <table class="table table-striped table-hover justify-content-center align-items-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wallets as $key => $wallet)    
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$wallet->user->name}}</td>
                            <td>{{$wallet->credit}}</td>
                            <td>{{$wallet->status}}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="" method="POST">
                                        @csrf
                                        <button class="btn btn-success mx-2" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection