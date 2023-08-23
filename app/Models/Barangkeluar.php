<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'barang_id',
         'pengirim_id',
        'penerima_id' ,
        'jumlah_keluar',
        'keterangan'
    ];
    public function barangs()
    {
    return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function pengirims()
    {
        return $this->belongsTo(Pengirim::class, 'pengirim_id');
    }
    public function penerimas()
    {
        return $this->belongsTo(Penerima::class, 'penerima_id');
    }
    public function laporanstoks()
    {
        return $this->hasMany(Laporanstok::class);
    }
}
