<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporanstok;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;

class LaporanStokController extends Controller
{
    public function index()
    {
        $laporanstoks = collect();

        $barangmasuks = Barangmasuk::with('barangs')->get();
        foreach ($barangmasuks as $barangmasuk) {
            $laporanstoks->push([
                'tanggal' => $barangmasuk->tanggal,
                'nama_barang' => $barangmasuk->barangs->nama_barang,
                'pengirim' => $barangmasuk->pengirims->nama_pengirim,
                'penerima' => $barangmasuk->penerimas->nama_penerima,
                'jumlah_masuk' => $barangmasuk->jumlah_masuk,
                'jumlah_keluar' => 0,
                'keterangan' =>$barangmasuk->keterangan,
            ]);
        }
        

        $barangkeluars = Barangkeluar::with('barangs')->get();
        foreach ($barangkeluars as $barangkeluar) {
            $laporanstoks->push([
                'tanggal' => $barangkeluar->tanggal,
                'nama_barang' => $barangkeluar->barangs->nama_barang,
                'pengirim' => $barangkeluar->pengirims->nama_pengirim,
                'penerima' => $barangkeluar->penerimas->nama_penerima,
                'jumlah_masuk' => 0,
                'jumlah_keluar' => $barangkeluar->jumlah_keluar,
                'keterangan' =>$barangkeluar->keterangan,
            ]);
        }
       

       
        
        return view('laporan.stok.index', ['laporanstoks' => $laporanstoks]);
    }
}