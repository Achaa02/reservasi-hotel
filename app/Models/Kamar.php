<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kamar', 'tipe_kamar', 'harga', 'kapasitas', 'ketersediaan'];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}
