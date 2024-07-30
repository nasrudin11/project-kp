<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaProduk extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'harga_produk';

    protected $primaryKey = 'id_harga';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_produk',
        'harga',
        'pasokan',
        'satuan_harga',
        'satuan_pasokan',
        'tgl_entry',
        'tgl_pelaporan',
        'tipe_harga', 
    ];

    // Jika Anda menggunakan timestamp untuk created_at dan updated_at
    public $timestamps = false;

    // Harga.php
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
