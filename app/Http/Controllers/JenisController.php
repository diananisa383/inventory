<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenises = Jenis::all();
        return view('jenis.index', ['jenises' => $jenises]);
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $jenis = new Jenis ();
        $jenis->nama_jenis = $request->get("nama_jenis");
        $jenis->save(); // Memanggil save() pada setiap model
        // $request->validate([
        //     'nama_jenis' => 'required|unique:jenises'
        // ]);

        // Jenis::create($request->all());

        return redirect()->route('jenis.index');
    }

    public function edit(Jenis $jenis)
    {
        return view('jenis.edit', compact('jenis'));
    }

    public function update(Request $request, Jenis $jenis)
{
    $request->validate([
        'nama_jenis' => 'required|unique:jenises,nama_jenis,' . $jenis->id
    ]);

    $jenis->update([
        'nama_jenis' => $request->input('nama_jenis')
    ]);

    return redirect()->route('jenis.index');
}
    
    public function destroy(Jenis $jenis)
    {
        $jenis->delete();
        return redirect()->route('jenis.index');
    }
}