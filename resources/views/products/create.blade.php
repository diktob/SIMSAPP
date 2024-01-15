@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr />
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="Nama_Produk" class="form-control" value="{{ old('Nama_Produk') }}" placeholder="Nama Produk">
            </div>
            <div class="col">
                <label for="Kategori_Produk">Kategori Produk</label>
                <select id="Kategori_Produk" name="Kategori_Produk">
                <option value="Alat Olahraga" selected="{{isset($_GET['Kategori_Produk']) && $_GET['Kategori_Produk'] == 'Alat Olahraga'}}">Alat Olahraga</option>
                <option value="Alat Musik" selected="{{isset($_GET['Kategori_Produk']) && $_GET['Kategori_Produk'] == 'Alat Olahraga'}}">Alat Musik</option>
                </select>
            </div>
            <div class="col">
                <input type="number" name="Harga_Beli" class="form-control" value="{{ old('Harga_Beli') }}" placeholder="Harga Beli">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="number" class="form-control" name="Stok" value="{{ old('Stok') }}" placeholder="Stok Barang"></input>
            </div>
            <div class="col">
                <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}">
            </div>
        </div>
        
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection