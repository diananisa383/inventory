<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'jenis_id',
         'satuan_id',
        'stock_barang' 
    ];

    public function barangmasukS()
    {
        return $this->hasMany(Barangmasuk::class);
    }
    public function barangkeluars()
    {
        return $this->hasMany(Barangkeluar::class);
    }
    public function laporanmasuks()
    {
        return $this->hasMany(Laporanmasuk::class);
    }
    public function laporankeluars()
    {
        return $this->hasMany(Laporankeluar::class);
    }
    public function laporanstoks()
    {
        return $this->hasMany(Laporanstok::class);
    }
    public function jenises()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function satuans()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
}
