<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['id', 'barang','gambar'];

    public function pembayaran()
    {
        return $this->hasMany(peminjaman::class, 'id_barang');
    }
}
