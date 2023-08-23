<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporanstok extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tanggal',
        'barang_id',
        'pengirim_id',
        'penerima_id',
        'barangmasuk_id',
        'barangkeluar_id',
        'jumlah_masuk',
        'jumlah_keluar',
        'total_stock',
        'keterangan'
    ];
    
    // public function getTotalStockAttribute()
    // {
    //     // Ambil jumlah masuk dan jumlah keluar dari relasi
    //     $jumlah_masuk = $this->barangmasuks->jumlah_masuk;
    //     $jumlah_keluar = $this->barangkeluars->jumlah_keluar;

    //     // Hitung total stok
    //     $total_stock = $this->barangs->stock_barang + $jumlah_masuk - $jumlah_keluar;

    //     return $total_stock;
    // }
    
    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    
    public function barangmasuks()
    {
        return $this->belongsTo(BarangMasuk::class, 'id_barangmasuk');
    }
    
    public function barangkeluars()
    {
        return $this->belongsTo(BarangKeluar::class, 'id_barangkeluar');
    }
    
    public function pengirims()
    {
        return $this->belongsTo(Pengirim::class, 'id_pengirim');
    }
    
    public function penerimas()
    {
        return $this->belongsTo(Penerima::class, 'id_penerima');
    }
}
