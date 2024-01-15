<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromQuery,WithMapping,ShouldAutoSize,WithHeadings
{
    use Exportable;
    public function query()
    {
        return Product::query();
    }

    public function map($products):array
    {
        return[
            $products->Nama_Produk,
            $products->Kategori_Produk,
            $products->Harga_Beli,
            $products->Harga_Jual,
            $products->Stok
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Produk',
            'Kategori Produk',
            'Harga Barang',
            'Harga Jual',
            'Stok'
        ];
    }
}
