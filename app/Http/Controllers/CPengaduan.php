<?php

namespace App\Http\Controllers;

use App\Models\MPertanyaan;
use App\Models\RPengaduan;
use Illuminate\Http\Request;

class CPengaduan extends Controller
{
    public function index()
    {
        $diagnosis = MPertanyaan::get();
        return view('pengaduan')->with('diagnosis',$diagnosis);
    }
    public function save(Request $request)
    {
        // dd($request->all());
        $pengaduan = [];
        $loop = 0;
        foreach($request->nomor as $nom){
            $pertanyaan = $request->pertanyaan[$loop];
            $jawaban = $request->{'answer'.$nom};
            array_push($pengaduan,[
                'nomor'=>$nom,
                'pertanyaan'=>$pertanyaan,
                'jawaban'=>json_encode($jawaban),
            ]);
            $loop++;
        }
        dd($pengaduan);
        $mPengaduan = new RPengaduan;
        $mPengaduan->nama_pasien = $request->nama;
        $mPengaduan->telp = $request->telp;
        $mPengaduan->alamat = $request->alamat;
        $mPengaduan->pengaduan = json_encode($pengaduan);
        $mPengaduan->save();
    }
}
