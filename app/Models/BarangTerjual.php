<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangTerjual extends Model
{
    use HasFactory;

    protected $table = 'barang_terjual';
    protected $fillable = ['etalase_id', 'jumlah_terjual', 'tanggal_terjual'];

    public function etalase()
    {
        return $this->belongsTo(Etalase::class);
    }
}
