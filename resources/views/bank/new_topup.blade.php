@extends('layouts.sidebar_bank')

@section('content')

<div class="" style="margin-left: 360px; margin-top: 40px">
    <div class="container">
            <div class="col d-flex justify-content-between mb-3">
                <span class="" style="font-size: 24px; font-weight: bold">Top Up Baru</span>
                <a href="/getTopUpRequest" class="btn btn-primary" style="margin-right: 60px">Kembali</a>
            </div>
            <div class="card border-0" style="width: 95%">
                <div class="card-body">
                    <form action="/sendTopUp" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="" class="mb-3">Nominal</label>
                                <input type="number" placeholder="Masukkan Nominal" name="credit" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="mb-3">Masukkan Kategori Produk</label>
                                <select name="user_id" class="form-control">
                                    <option value="">Pilih User Penerima</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>