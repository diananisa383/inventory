<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    public function index()
    {
        $penerimas = Penerima::all();
        return view('penerima.index', ['penerimas' => $penerimas]);
    }

    public function create()
    {
        return view('penerima.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|unique:penerimas'
        ]);

        $penerima = new Penerima();
        $penerima->nama_penerima = $request->input('nama_penerima');
        $penerima->save();

        return redirect()->route('penerima.index')->with('success', 'Penerima berhasil ditambahkan.');
    }

    public function edit(Penerima $penerima)
    {
        return view('penerima.edit', compact('penerima'));
    }

    public function update(Request $request, Penerima $penerima)
    {
        $request->validate([
            'nama_penerima' => 'required|unique:penerimas,nama_penerima,' . $penerima->id
        ]);
    
        $penerima->update([
            'nama_penerima' => $request->input('nama_penerima')
        ]);
        return redirect()->route('penerima.index')->with('success', 'Penerima updated successfully');
    }

    public function destroy(Penerima $penerima)
    {
        $penerima->delete();
        return redirect()->route('penerima.index')->with('success', 'Penerima deleted successfully');
    }
}
