<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('jenises', 'satuans')->get();
        return view('barang.index', ['barangs' => $barangs]);
    }

    public function create()
    {
        $jenises = Jenis::pluck('nama_jenis', 'id');
        $satuans = Satuan::pluck('nama_satuan', 'id');
        return view('barang.create', ['jenises' => $jenises, 'satuans' => $satuans]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barangs',
            'jenis_id' => 'required',
            'satuan_id' => 'required',
            'stock_barang' => 'required|numeric'
        ]);

        $barang = new Barang();
        $barang->nama_barang = $request->input('nama_barang');
        $barang->jenis_id = $request->input('jenis_id');
        $barang->satuan_id = $request->input('satuan_id');
        $barang->stock_barang = $request->input('stock_barang');
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        $jenises = Jenis::pluck('nama_jenis', 'id');
        $satuans = Satuan::pluck('nama_satuan', 'id');
        return view('barang.edit', compact('barang', 'jenises', 'satuans'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barangs,nama_barang,' . $barang->id,
            'jenis_id' => 'required',
            'satuan_id' => 'required',
            'stock_barang' => 'required|numeric'
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
