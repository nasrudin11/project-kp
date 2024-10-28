<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $fillable = ['nama_kecamatan'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_kecamatan', 'id_kecamatan');
    }

    // Metode untuk memeriksa apakah pasar memiliki relasi dengan user
    public function hasRelations()
    {
        return $this->users()->exists();
    }
}
