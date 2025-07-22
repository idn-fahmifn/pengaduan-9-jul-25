<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // untuk dashboard admin
    public function dashboard()
    {
        $total_laporan = Laporan::count();
        $pending = Laporan::where('status', 'pending')->count();
        $diproses = Laporan::where('status', 'diproses')->count();
        $selesai = Laporan::where('status', 'selesai')->count();
        $ditolak = Laporan::where('status', 'ditolak')->count();
        $data = Laporan::all();
        return view('admin.dashboard', [
            'total' => $total_laporan,
            'pending' => $pending,
            'diproses' => $diproses,
            'selesai' => $selesai,
            'ditolak' => $ditolak,
            'data' => $data
        ]);
    }

    public function index()
    {
        $data = User::where('level','petugas')->get();
        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ], 
        [
            'name.required' => 'Name wajib diisi',
            'name.string' => 'Name berupa karakter string',
            'name.max' => 'Isi maksimal 50 karakter',

            'email.required' => 'Email wajib diisi',
            'email.string' => 'Email berupa karakter',
            'email.lowercase' => 'Masukan email tanpa huruf kapital',
            'email.emaik' => 'Masukan dalam bentuk email (cth. test@test.com)',
            'email.max' => 'Masukan maksimal 255 karakter',
            'email.unique' => 'Email sudah digunakan',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'petugas',
            'password' => Hash::make('passworddefault')
        ]);

        return back()->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
