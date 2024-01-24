@extends('layouts.sidebar_kantin')

@section('content')

<div class="" style="margin-left: 360px; margin-top: 40px">
    <div class="container">
        <a class="btn btn-primary btn-sm mb-4" href="{{ route('product')}}">Kembali</a>
        <h3 class="mb-3">Tambah Produk Baru</h3>
        <div class="card border-0" style="width: 95%">
            <div class="card-body">
                <form action="{{route('product.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                            <label for="" class="mb-3">Nama Produk</label>
                            <input type="text" placeholder="Masukkan Nama Produk" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="" class="mb-3">Stock Produk</label>
                            <input type="text" placeholder="Masukkan Stok Produk" name="stock" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="mb-3">Masukkan Kategori Produk</label>
                            <select name="categories_id" class="form-control">
                                <option value="">Pilih Kategori Produk</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="" class="mb-3">Harga</label>
                            <input type="text" placeholder="Masukkan Harga Produk" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="" class="mb-3">Deskripsi</label>
                            <textarea type="text" name="desc" placeholder="Masukkan Deskripsi Produk" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="" class="mb-3">Thumbnail</label>
                            <input type="file"name="photo" class="form-control">
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