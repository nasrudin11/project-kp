<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    use HasFactory;

    protected $table = 'pasar';
    protected $primaryKey = 'id_pasar';
    protected $fillable = ['nama_pasar', 'alamat_pasar'];

    
    // Relasi dengan model User
    public function users()
    {
        return $this->hasMany(User::class, 'id_pasar', 'id_pasar');
    }

    // Metode untuk memeriksa apakah pasar memiliki relasi dengan user
    public function hasRelations()
    {
        return $this->users()->exists();
    }

}
