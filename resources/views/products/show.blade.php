@extends('layouts.app')
  
@section('title', 'Show Product')
  
@section('contents')
    <h1 class="mb-0">Detail Product</h1>
    <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/products') }}"> Back</a>
    </div>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="Nama_Produk" class="form-control" placeholder="Nama Produk" value="{{ $product->Nama_Produk }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Kategori Produk</label>
            <input type="text" name="Kategori_Produk" class="form-control" placeholder="Kategori Produk" value="{{ $product->Kategori_Produk }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Harga Beli</label>
            <input type="text" name="Harga_Beli" class="form-control" placeholder="Harga Beli" value="{{ $product->Harga_Beli }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Harga Jual</label>
            <input type="text" name="Harga_Jual" class="form-control" placeholder="Harga Jual" value="{{ $product->Harga_Jual }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Stok</label>
            <input type="text" name="Stok" class="form-control" placeholder="Stok" value="{{ $product->Stok }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <strong>Image</strong>
           <img src="/images/{{$product->gambar}}" width="300px">
        </div>
    </div>
@endsection