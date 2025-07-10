<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Laporan::all();
        return view('user.laporan.index', compact('data'));
    }

    public function create()
    {
        return view('user.laporan.create');
    }

    public function store(Request $request)
    {
        // validator
        $request->validate([
            'title_report' => ['required', 'string', 'min:5', 'max:50'],
            'location' => ['required', 'string', 'min:5', 'max:50'],
            'report_type' => ['required'],
            'photo' => ['required', 'file', 'max:10240', 'mimes:png,jpg,jpeg,heic'],
            'desc' => ['required']
        ]);

        $user_id = Auth::user()->id; //mengambil id user yang sedang login(pelapor);
        $today = Carbon::now('Asia/Jakarta'); //jam hari ini.

        $simpan = [
            'id_user' => $user_id,
            'judul' => $request->input('title_report'),
            'jenis_pengaduan' => $request->input('report_type'),
            'deskripsi' => $request->input('desc'),
            'lokasi' => $request->input('location'),
            'tanggal_pengaduan' => $today

        ];
         // konidisi untuk dokumentasi
        if($request->hasFile('photo'))
        {
            $gambar = $request->file('photo');
            $path = 'public/images/laporan';
            $ext = $gambar->getClientOriginalExtension();
            $nama = 'laporan_pengaduan_'.Carbon::now()->format('ymdhis').'.'.$ext;
            $simpan['dokumentasi'] = $nama;
        }

        return $simpan;

    }

}
