<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = Product::query();
        $product -> when($request->search, function ($query) use ($request){
            return $query->where('Nama_Produk', 'like', '%'.$request->search.'%')->paginate(10);
        });
        $product -> when($request->Kategori_Produk, function ($query) use ($request){
            return $query->where('Kategori_Produk', 'like', '%'.$request->Kategori_Produk.'%')->paginate(10);
        });
        return view('products.index', ['product' => $product->paginate(10)]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Produk'=>'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:100',
        ]);

        $input = $request->all();
   
        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }
        Product::create($input);

        return redirect()-> route('products')->with('success', 'Produk Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        
        $product->update($request->all());

        return redirect()->route('products')->with('success','Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success','Produk berhasil dihapus');
    }

    public function exportexcel()
    {
        return Excel::download(new ProductExport,'DataProduk.xlsx');

    }
}
