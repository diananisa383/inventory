<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use App\Models\Barang;
use App\Models\Pengirim;
use App\Models\Penerima;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuks = Barangmasuk::with('barangs', 'pengirims', 'penerimas')->get();
        return view('barangmasuk.index', ['barangmasuks' => $barangmasuks]);
    }

    public function create()
    {
        $barangs = Barang::pluck('nama_barang', 'id');
        $pengirims = Pengirim::pluck('nama_pengirim', 'id');
        $penerimas = Penerima::pluck('nama_penerima', 'id');
        return view('barangmasuk.create', ['barangs' => $barangs, 'pengirims' => $pengirims, 'penerimas' => $penerimas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'barang_id' => 'required',
            'pengirim_id' => 'required',
            'penerima_id' => 'required',
            'jumlah_masuk' => 'required|numeric'
        ]);

        $barangmasuk = new Barangmasuk();
        $barangmasuk->tanggal = $request->input('tanggal');
        $barangmasuk->barang_id = $request->input('barang_id');
        $barangmasuk->pengirim_id = $request->input('pengirim_id');
        $barangmasuk->penerima_id = $request->input('penerima_id');
        $barangmasuk->jumlah_masuk = $request->input('jumlah_masuk');
        $barangmasuk->keterangan = $request->input('keterangan');
        $barangmasuk->save();

        $barang = Barang::find($request->input('barang_id'));
         if ($barang) {
        $barang->stock_barang += $request->input('jumlah_masuk');
        $barang->save();
        }
        
        return redirect()->route('barangmasuk.index')->with('success', 'Barang Masuk berhasil ditambahkan.');
    }

    public function edit(Barangmasuk $barangmasuk)
    {
        $barangs = Barang::pluck('nama_barang', 'id');
        $pengirims = Pengirim::pluck('nama_pengirim', 'id');
        $penerimas = Penerima::pluck('nama_penerima', 'id');
        return view('barangmasuk.edit', compact('barangmasuk', 'barangs', 'pengirims', 'penerimas'));
    }

    public function update(Request $request, Barangmasuk $barangmasuk)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'barang_id' => 'required',
            'pengirim_id' => 'required',
            'penerima_id' => 'required',
            'jumlah_masuk' => 'required|numeric'
        ]);

        $barangmasuk->update($request->all());
        return redirect()->route('barangmasuk.index')->with('success', 'Barang Masuk updated successfully');
    }

    public function destroy(Barangmasuk $barangmasuk)
    {
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index')->with('success', 'Barang Masuk deleted successfully');
    }
}
