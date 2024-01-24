@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        @if (Auth::user()->role == 'siswa')
            <div class="col" style="display: flex; justify-content: space-between; margin-bottom: 70px">
                <div>
                    <div class="" style="font-size: 16px">Selamat Datang Kembali {{Auth::user()->name}}</div>
                    <div class="" style="font-size: 16px; font-weight: 600">Pilih Product Menarik</div>
                </div>
                <div>
                    <a href="{{url('/tariktunai')}}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                        </svg>
                        <br>
                        Tarik Tunai
                    </a>
                    <a href="{{url('/topup')}}" class="btn btn-primary align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                        </svg>
                        <br>
                        Top Up
                    </a>
                    <button class="btn btn-primary px-4">Saldo Anda <br>Rp. {{$saldo}}</button>
                </div>
            </div>
            <div class="mb-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Pilih Kategori Produk
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)       
                            <li value="{{ $category->id}}"><a class="dropdown-item" href="#" >{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <div class="d-flex gap-3">
                    @foreach ($products as $product)    
                        <div class="card shadow-lg" style="width: 16rem; border-radius: 10px; height: 20rem;">
                            <img src="{{$product->photo}}" class="card-img-top" alt="..." width="200px" height="150px">
                            <div class="card-body">
                                <form action="{{ route('addToCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                                    <input type="hidden" value="{{ $product->id }}" name="products_id">
                                    <input type="hidden" value="{{ $product->price }}" name="price">

                                    <h5 class="card-title" style="font-weight: bold">{{$product->name}}</h5>
                                    <h5 class="card-text" style="font-size: 12px">{{$product->desc}}</h5>
                                    <p class="card-text" style="font-weight: bold">Rp. {{$product->price}}</p>
                                    <div class="d-flex justify-content-end gap-2" style="">
                                        <input type="number" class="form-control" name="quantity" value="1" min="1">
                                        <button type="submit" href="#" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                        </svg>
                                        </a>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
