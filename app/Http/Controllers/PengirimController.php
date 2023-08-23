<?php

namespace App\Http\Controllers;

use App\Models\Pengirim;
use Illuminate\Http\Request;

class PengirimController extends Controller
{
    public function index()
    {
        $pengirims = Pengirim::all();
        return view('pengirim.index', ['pengirims' => $pengirims]);
    }

    public function create()
    {
        return view('pengirim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|unique:pengirims'
        ]);

        $pengirim = new Pengirim();
        $pengirim->nama_pengirim = $request->input('nama_pengirim');
        $pengirim->save();

        return redirect()->route('pengirim.index')->with('success', 'Pengirim berhasil ditambahkan.');
    }

    public function edit(Pengirim $pengirim)
    {
        return view('pengirim.edit', compact('pengirim'));
    }

    public function update(Request $request, Pengirim $pengirim)
    {
        $request->validate([
            'nama_pengirim' => 'required|unique:pengirims,nama_pengirim,' . $pengirim->id
        ]);
    
        $pengirim->update([
            'nama_pengirim' => $request->input('nama_pengirim')
        ]);
        return redirect()->route('pengirim.index')->with('success', 'Pengirim updated successfully');
    }

    public function destroy(Pengirim $pengirim)
    {
        $pengirim->delete();
        return redirect()->route('pengirim.index')->with('success', 'Pengirim deleted successfully');
    }
}
