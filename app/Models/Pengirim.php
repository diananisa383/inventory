<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pengirim'
    ];
    public function barangmasuks()
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
}
