@extends('layouts.sidebar_bank')

@section('content')

<div class="" style="margin-left: 360px; margin-top: 10px">
    <div class="container">
        @if (Auth::user()->role == 'bank')     
            <h3 class="mb-3">Rekap Data</h3>
            <div class="row d-flex gap-3 mb-3">
                <div class="card border-0" style="width: 35rem;">
                    <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: 20px">Jumlah TopUp</h5>
                    <p class="card-text" style="font-size: 16px">{{$wallets->count()}}</p>
                    </div>
                </div>
                <div class="card border-0" style="width: 35rem">
                    <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: 20px">Jumlah TarikTunai</h5>
                    <p class="card-text" style="font-size: 16px">{{$wallets->count()}}</p>
                    </div>
                </div>
            </div>

            <div style="padding-right: 95px">
                <h3 class="mb-3">Transaksi</h3>
                <div>
                    <table class="table rounded-lg">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">User</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Debit</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($wallets as $key => $wallet)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$wallet->user->name}}</td>
                                    @if($wallet->credit)
                                        <td>{{$wallet->credit}}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if($wallet->debit)
                                        <td>{{$wallet->debit}}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>{{$wallet->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
