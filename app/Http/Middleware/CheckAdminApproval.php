<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminApproval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna telah di-approve oleh admin
        if (auth()->check() && auth()->user()->role->role_name === 'admin') {
            return $next($request);
           
        }
         // Jika pengguna bukan admin atau belum di-approve, kembalikan respons yang sesuai
         return redirect()->route('login'); // Ganti ini dengan rute yang sesuai
    }
       

        
    }

