<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PetugasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Auth::user()->level == 'superadmin'; //nilai value admin
        $petugas = Auth::user()->level == 'petugas'; //nilai value petugas
        $check = Auth::check(); //check user sudah login.

        //jika user adalah super admin
        if ($check && $petugas) {
            return $next($request); //jika admin akan diizinkan masuk ke dashboard admin.
        } elseif ($check && $admin) {
            return redirect()->route('dashboard'); //jika login admin -> admin
        }
        return redirect()->route('dashboard.user'); //jika tidak keduanya maka akan diarahkan ke dashboard user.
    }
}
