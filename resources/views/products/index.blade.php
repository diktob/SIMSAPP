@extends('layouts.app')
  
@section('title', 'Home Product')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr/>
    <form action="" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="row mb-3">
      <input type="search" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
      <div class="col-sm-3">
                  <label for="Kategori_Produk">Kategori Produk</label>
                  <select id="Kategori_Produk" name="Kategori_Produk">
                      <option value="Alat Olahraga" selected="{{isset($_GET['Kategori_Produk']) && $_GET['Kategori_Produk'] == 'Alat Olahraga'}}">Alat Olahraga</option>
                      <option value="Alat Musik" selected="{{isset($_GET['Kategori_Produk']) && $_GET['Kategori_Produk'] == 'Alat Musik'}}">Alat Musik</option>
                      <option value="" selected="{{isset($_GET['Kategori_Produk']) && $_GET['Kategori_Produk'] == '-'}}">-</option>
                  </select>
      </div>
      <div class="col-sm-2">
      <button type="submit" class="btn btn-primary mt-4">Search</button>
      </div>
      <div class="col-auto">
      <a href="/exportexcel" class="btn btn-info">Export Excel</a>
      </div>
    </div>
  </form>
  <br/>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Nama Produk</th>
                <th>Kategori Produk</th>
                <th>Harga Beli(Rp)</th>
                <th>Harga Jual(Rp)</th>
                <th>Stok Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>+
            @if($product->count() > 0)
                @foreach($product as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle"><img src="/images/{{$rs->gambar}}" width="50px"></td>
                        <td class="align-middle">{{ $rs->Nama_Produk }}</td>
                        <td class="align-middle">{{ $rs->Kategori_Produk }}</td>
                        <td class="align-middle">{{ $rs->Harga_Beli }}</td>  
                        <td class="align-middle">{{ $rs->Harga_Jual }}</td>  
                        <td class="align-middle">{{ $rs->Stok }}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('products.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('products.edit', $rs->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="row"> {{$product->links()}}</div>
    <br/>
@endsection
