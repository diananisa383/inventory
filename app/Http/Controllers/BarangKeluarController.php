<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Barang;
use App\Models\Pengirim;
use App\Models\Penerima;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangkeluars = Barangkeluar::with('barangs', 'pengirims', 'penerimas')->get();
        return view('barangkeluar.index', ['barangkeluars' => $barangkeluars]);
    }

    public function create()
    {
        $barangs = Barang::pluck('nama_barang', 'id');
        $pengirims = Pengirim::pluck('nama_pengirim', 'id');
        $penerimas = Penerima::pluck('nama_penerima', 'id');
        return view('barangkeluar.create', ['barangs' => $barangs, 'pengirims' => $pengirims, 'penerimas' => $penerimas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'barang_id' => 'required',
            'pengirim_id' => 'required',
            'penerima_id' => 'required',
            'jumlah_keluar' => 'required|numeric'
        ]);

        $barangkeluar = new Barangkeluar();
        $barangkeluar->tanggal= $request->input('tanggal');
        $barangkeluar->barang_id = $request->input('barang_id');
        $barangkeluar->pengirim_id = $request->input('pengirim_id');
        $barangkeluar->penerima_id = $request->input('penerima_id');
        $barangkeluar->jumlah_keluar = $request->input('jumlah_keluar');
        $barangkeluar->keterangan = $request->input('keterangan');
        $barangkeluar->save();

        $barang = Barang::find($request->input('barang_id'));
    if ($barang) {
        $barang->stock_barang -= $request->input('jumlah_keluar');
        $barang->save();
    }
        return redirect()->route('barangkeluar.index')->with('success', 'Barang Keluar berhasil ditambahkan.');
    }

    public function edit(Barangkeluar $barangkeluar)
    {
        $barangs = Barang::pluck('nama_barang', 'id');
        $pengirims = Pengirim::pluck('nama_pengirim', 'id');
        $penerimas = Penerima::pluck('nama_penerima', 'id');
        return view('barangkeluar.edit', compact('barangkeluar', 'barangs', 'pengirims', 'penerimas'));
    }

    public function update(Request $request, Barangkeluar $barangkeluar)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'barang_id' => 'required',
            'pengirim_id' => 'required',
            'penerima_id' => 'required',
            'jumlah_keluar' => 'required|numeric'
        ]);

        $barangkeluar->update($request->all());
        return redirect()->route('barangkeluar.index')->with('success', 'Barang Keluar updated successfully');
    }

    public function destroy(BarangKeluar $barangkeluar)
    {
        $barangkeluar->delete();
        return redirect()->route('barangkeluar.index')->with('success', 'Barang Keluar deleted successfully');
    }
}
