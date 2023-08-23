<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmasuk;
use App\Models\Barang;
use App\Models\Pengirim;
use App\Models\Penerima;

class LaporanMasukController extends Controller
{
    public function index()
    {
        $barangmasuks = Barangmasuk::with(['barangs', 'pengirims', 'penerimas'])->get();

        return view('laporan.barangmasuk.index', ['barangmasuks' => $barangmasuks]);
    }  
}
