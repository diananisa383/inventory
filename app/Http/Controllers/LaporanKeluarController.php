<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangkeluar;
use App\Models\Barang;
use App\Models\Pengirim;
use App\Models\Penerima;

class LaporanKeluarController extends Controller
{
    public function index()
    {
        $barangkeluars = Barangkeluar::with(['barangs', 'pengirims', 'penerimas'])->get();

        return view('laporan.barangkeluar.index', ['barangkeluars' => $barangkeluars]);
    }  
}
