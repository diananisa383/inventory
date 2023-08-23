<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::all();
        return view('satuan.index', ['satuans' => $satuans]);
    }

    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_satuan' => 'required|unique:satuans'
        ]);

        $satuan = new Satuan();
        $satuan->nama_satuan = $request->input('nama_satuan');
        $satuan->save();

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan.');
    }

    public function edit(Satuan $satuan)
    {
        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'nama_satuan' => 'required|unique:satuans,nama_satuan,' . $satuan->id
        ]);
    
        $satuan->update([
            'nama_satuan' => $request->input('nama_satuan')
        ]);
    
        return redirect()->route('satuan.index');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index');
    }
}
