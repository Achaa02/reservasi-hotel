<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'kamars_id',
        'tanggal_check_in',
        'tanggal_check_out',   
        'ketersediaan',        
        'jumlah_tamu',
        'harga',
        'note',        
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamars_id');
    }

}
