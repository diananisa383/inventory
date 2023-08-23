<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required', 'in:user,admin'],
        ]);
    }

    protected function create(array $data)
    {
        $role = Role::where('nama_role', $data['role_id'])->first();

        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role_id' => $role->id,
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Override the RegistersUsers trait method
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    public function _construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Override the AuthenticatesUsers trait method
    protected function authenticated(Request $request, $user)
    {
        if ($user->role->nama_role !== 'admin') {
            return redirect('/dashboard'); // Ganti dengan rute yang sesuai setelah login
        }

        return redirect($this->redirectTo);
    }
}