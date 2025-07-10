<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

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
        return view('petugas.laporan.detail', compact('data'));
    }
}
