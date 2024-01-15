<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'gambar',
        'Nama_Produk',
        'Kategori_Produk',
        'Harga_Beli',
        'Harga_Jual',
        'Stok',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($product) {
            $product->Harga_Jual = $product->Harga_Beli * 1.3;
        });
        self::updating(function ($product) {
            $product->Harga_Jual = $product->Harga_Beli * 1.3;
        });
    }
}
