@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/products') }}"> Back</a>
    </div>
    <form action="{{route('products.update', $product->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="Nama_Produk" class="form-control" placeholder="Nama Produk" value="{{ $product->Nama_Produk }}" >
            </div>
            <div class="col">
                <label for="Kategori_Produk">Kategori Produk</label>
                <select id="Kategori_Produk" name="Kategori_Produk">
                <option value="Alat Olahraga">Alat Olahraga</option>
                <option value="Alat Musik">Alat Musik</option>
                </select>
            </div>
        </div>
        <div class="row">
        <div class="col mb-3">
            <label class="form-label">Harga Beli</label>
            <input type="number" name="Harga_Beli" class="form-control" placeholder="Harga Beli" value="{{ $product->Harga_Beli }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="Stok" class="form-control" placeholder="Stok" value="{{ $product->Stok }}">
        </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection