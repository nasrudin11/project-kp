<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaProduk extends Model
{
    use HasFactory;

    protected $table = 'harga_produk';

    protected $primaryKey = 'id_harga';

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

    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
