<?php

namespace App\Http\Controllers;

use App\Models\MPasien;
use App\Models\MPertanyaan;
use App\Models\RPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CAdmin extends Controller
{
    public function index()
    {
        $countPasien = MPasien::get()->count();
        $countPertanyaan = MPertanyaan::get()->count();
        $countPengaduan = RPengaduan::get()->count();
        $countPengunjung = DB::table('r_pengunjung')->get()->count();
        return view('admin.index')
                    ->with('countPasien', $countPasien)
                    ->with('countPertanyaan', $countPertanyaan)
                    ->with('countPengaduan', $countPengaduan)
                    ->with('countPengunjung', $countPengunjung)
                    ->with('title', 'Home');
    }
}
