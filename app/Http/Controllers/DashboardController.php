<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\Satuan;
use App\Models\Barang;
use App\Models\Pengirim;
use App\Models\Penerima;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJenis = Jenis::count();
        $totalSatuan = Satuan::count();
        $totalBarang = Barang::count();
        $totalPengirim = Pengirim::count();
        $totalPenerima = Penerima::count();
        $totalBarangMasuk = Barangmasuk::sum('jumlah_masuk');
        $totalBarangKeluar = Barangkeluar::sum('jumlah_keluar');
        $totalUser = User::count();
        $totalRole = Role::count();

        return view('dashboard.index', [
            'totalJenis' => $totalJenis,
            'totalSatuan' => $totalSatuan,
            'totalBarang' => $totalBarang,
            'totalPengirim' => $totalPengirim,
            'totalPenerima' => $totalPenerima,
            'totalBarangMasuk' => $totalBarangMasuk,
            'totalBarangKeluar' => $totalBarangKeluar,
            'totalUser' => $totalUser,
            'totalRole' => $totalRole,
        ]);
    }
}

