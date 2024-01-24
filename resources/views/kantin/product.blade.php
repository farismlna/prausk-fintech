@extends('layouts.sidebar_kantin')

@section('content')

<div class="" style="margin-left: 360px; margin-top: 10px">
    <div class="container">
        <div class="col d-flex justify-content-between mb-3">
            <span class="" style="font-size: 24px; font-weight: bold">Daftar Product</span>
            <a href="{{route('product.add')}}" class="btn btn-primary" style="margin-right: 95px">Tambah Produk</a>
        </div>
        <div style="padding-right: 95px;">
            <table class="table table-striped table-hover justify-content-center align-items-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Thumbnail</th>
                        <th>Nama</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)    
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>
                                <img src="{{$product->photo}}" alt="" width="80" height="50">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->desc}}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{route('product.destroy', ['id' => $product->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger mx-2" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <a class="btn btn-warning text-white" href="{{route('product.edit', ['id' => $product->id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                                        </svg>
                                    </a>
                                    
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