<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    // Protected $table = 'siswas';
    Protected $fillable =['nama','kelas',];

    public function pembayaran() {
        return $this->hasMany(Peminjaman::class, 'id_siswa');
    }
}

