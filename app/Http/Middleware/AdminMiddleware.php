<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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
        $user = Auth::user()->level == 'user'; // nilai value user
        $check = Auth::check(); //check user sudah login.

        //jika user adalah super admin
        if ($check && $admin) {
            return $next($request); //jika admin akan diizinkan masuk ke dashboard admin.
        } elseif ($check && $petugas) {
            return redirect()->route('dashboard.petugas'); //jika login petugas -> petugas
        }
        return redirect()->route('dashboard.user'); //jika tidak keduanya maka akan diarahkan ke dashboard user.
    }
}
