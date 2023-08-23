<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Method untuk menampilkan daftar role
    public function index()
    {
        // Ambil daftar role dari model
        $roles = Role::all();

        // Tampilkan daftar role dalam view
        return view('role.index', ['roles' => $roles]);
    }
    public function create()
    {
        $role = Role::all();
    
        return view('role.create', compact('roles'));
    }

    // Method untuk menyimpan data role yang baru di-input
    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama_role' => 'required|unique:roles'
        ]);

        // Simpan data role baru ke dalam model
        $role = new Role();
        $role->nama_role = $request->input('nama_role');
        $role->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('role.index')->with('success', 'Role berhasil ditambahkan.');
    }
    public function edit(Role $role)
    {
        return view('role.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        return redirect()->route('role.index')->with('success', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }
}
