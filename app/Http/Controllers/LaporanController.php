<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Respon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{

    public function dashboard()
    {
        $data = Laporan::paginate(2);
        $user_id = Auth::user()->id;

        // menghitung semua laporan saya
        $laporan_saya = Laporan::where('id_user', $user_id)->count();
        
        // laporan yang sedang diproses
        $diproses = Laporan::where('id_user', $user_id)
        ->where('status', 'diproses')
        ->count();

        // laporan yang sedang selesai
        $selesai = Laporan::where('id_user', $user_id)
        ->where('status', 'selesai')
        ->count();

        $ditolak = Laporan::where('id_user', $user_id)
        ->where('status', 'ditolak')
        ->count();

        return view('user.dashboard', [
            'data' => $data,
            'laporan_saya' => $laporan_saya,
            'diproses' => $diproses,
            'selesai' => $selesai,
            'ditolak' => $ditolak
        ]);
    }

    public function index()
    {
        $user_id = Auth::user()->id; //mengambil nilai id yang sedang login.
        $data = Laporan::where('id_user', $user_id)->get();
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
        $today = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'); //jam hari ini.

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
            $gambar->storeAs($path, $nama);
            $simpan['dokumentasi'] = $nama;
        }

        Laporan::create($simpan); //menyimpan ke database
        return redirect()->route('laporan-saya.index');

    }

    public function show($id)
    {
        $data = Laporan::find($id);
        $respon = Respon::where('id_pengaduan', $id)->get();
        return view('user.laporan.detail', compact('data', 'respon'));
    }

}
