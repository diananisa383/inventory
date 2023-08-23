<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
//     public function showRegistrationForm()
//     {
//         return view('register');
//     }
//     public function register(Request $request)
//     {
//          $request->validate([
//         'username' => 'required|string|max:255',
//         'password' => 'required|string|min:8|confirmed',
//         ]);

//          // Buat pengguna baru
//         $user = User::create([
//         'username' => $request->username,
//         'password' => Hash::make($request->password),
//         'role_id' => 2, // Assign role sesuai kebutuhan
//         'status' => 'pending', // Set status pengguna sebagai pending
//         ]);

//         return redirect()->route('login')->with('success', 'Registration successful. Please wait for approval.');
//         }
//     public function approveUser($id)
//         {
//          $user = User::findOrFail($id);
//          $user->status = 'active';
//          $user->save();

//         return redirect()->route('dashboard')->with('success', 'User approved successfully.');
//         }
//         public function login(Request $request)
// {
//     $credentials = $request->validate([
//         'username' => 'required|username',
//         'password' => 'required|string',
//     ]);

//     if (Auth::attempt($credentials)) {
//         if (Auth::user()->status === 'active') {
//             return redirect()->intended('/dashboard'); // Ganti "/dashboard" sesuai rute dashboard
//         } else {
//             Auth::logout();
//             return back()->with('error', 'Your account is not yet approved.');
//         }
//     } else {
//         return back()->with('error', 'Invalid login credentials.');
//     }
// }

// public function logout()
// {
//     Auth::logout();
//     return redirect('/login')->with('success', 'Logged out successfully.');
// }
    public function index()
         {
        $users = User::with('role')->get();

        return view('user.index', ['users' => $users]);
        }

    public function create()
    {
        $roles = Role::pluck('nama_role', 'id');

        return view('user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required',
            'status' => 'required|in:active,inactive', // Added status validation
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->status = $request->input('status'); // Set user status
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('nama_role', 'id');

        return view('user.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'nullable|min:8',
            'role_id' => 'required',
            'status' => 'required|in:active,inactive', // Added status validation
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->input('username');
        
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        
        $user->role_id = $request->input('role_id');
        $user->status = $request->input('status'); // Update user status
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}