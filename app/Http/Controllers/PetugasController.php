<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Respon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function index()
    {
        $data = Laporan::all();
        return view('petugas.laporan.index', compact('data'));
    }
    public function show($id)
    {
        $data = Laporan::find($id);
        $respon = Respon::where('id_pengaduan', $id)->get();
        return view('petugas.laporan.detail', compact('data', 'respon'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'respon' => ['required']
        ]);

        $user_id = Auth::user()->id; //mengambil id user yang sedang login(yang merespon laporan);
        $today = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'); //jam hari ini.

        // array untuk menyimpan data respon
        $simpan = [
            'id_user' => $user_id,
            'id_pengaduan' => $id,
            'tanggapan' => $request->input('respon'),
            'tanggal_tanggapan' => $today
        ];

        // mengubah data status pada laporan.
        $ubah_status = Laporan::find($id); //mencari laporan yang akan diubah statusnya berdasarkan ID
        $ubah_status->status = $request->status; //edit dengan status terbaru yang diinputkan di form status.
        $ubah_status->save(); //menyimpan ke model laporan dengan status terbaru

        Respon::create($simpan); //menambahkan data respon.
        return back()->with('success', 'Respon baru ditambahkan');
    }

}
