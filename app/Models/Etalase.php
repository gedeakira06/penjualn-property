<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Etalase extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'stock',
        'kode_barang',
        'harga',
    ];

    // Method untuk mengurangi stok
    public function kurangiStok($jumlah)
    {
        $this->stock -= $jumlah;
        $this->save();
    }
}