{{-- @extends('layouts.app') --}}
@extends('layouts.sidebar_kantin')

@section('content')

<div class="" style="margin-left: 360px; margin-top: 10px">
    <div class="container">
        @if (Auth::user()->role == 'kantin')     
            <h3 class="mb-3">Rekap Data</h3>
            <div class="row d-flex gap-3 mb-3">
                <div class="card border-0" style="width: 35rem;">
                    <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: 20px">Jumlah Transaksi</h5>
                    <p class="card-text" style="font-size: 16px">{{$transactions->count()}}</p>
                    </div>
                </div>
                <div class="card border-0" style="width: 35rem">
                    <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: 20px">Jumlah Product</h5>
                    <p class="card-text" style="font-size: 16px">{{$products->count()}}</p>
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
                            <th scope="col">Product</th>
                            <th scope="col">Tanggal Pembelian</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $key => $transaction)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$transaction->user->name}}</td>
                                    <td>{{$transaction->product->name}}</td>
                                    <td>{{$transaction->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
            <h3 class="mb-3">Product</h3>
            <div style="padding-right: 95px">
                <table class="table rounded-lg">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->desc}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection
