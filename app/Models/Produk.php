<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'gambar',
        'target'
    ];

    public function hargaProduk()
    {
        return $this->hasMany(HargaProduk::class, 'id_produk', 'id_produk');
    }
}
