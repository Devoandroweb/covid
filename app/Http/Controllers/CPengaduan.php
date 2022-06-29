<?php

namespace App\Http\Controllers;

use App\Models\MPertanyaan;
use App\Models\RPengaduan;
use App\Traits\Helper;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPengaduan extends Controller
{
    use Helper;
    public function index(Request $request)
    {
        $ip = $request->getClientIp();
        $pengunjung = DB::table("r_pengunjung")->where('ip',$ip)->first();
        if($pengunjung == null){
            DB::table("r_pengunjung")->insert(['ip'=>$ip]);
        }
        $diagnosis = MPertanyaan::get();
        return view('pengaduan')->with('diagnosis',$diagnosis)->with('title', 'Pengaduan');
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
        // dd($pengaduan);
        $mPengaduan = new RPengaduan;
        $mPengaduan->nik = $request->nik;
        $mPengaduan->nama_pasien = $request->nama_pasien;
        $mPengaduan->telp = $request->no_telp;
        $mPengaduan->alamat = $request->alamat;
        $mPengaduan->pengaduan = json_encode($pengaduan);
        $mPengaduan->jadwal = $this->generateJadwal();
        $mPengaduan->created_by = 0;
        $mPengaduan->updated_by = 0;
        $mPengaduan->updated_at = date('Y-m-d H:i:s');
        $mPengaduan->ip_address = $request->getClientIp();
        $mPengaduan->save();
        $request->session()->put('ip_address', $request->getClientIp());

        return redirect(url('pengaduan-jadwal'));

    }
    function generateJadwal()
    {
        $dateDay = date("D");
        $date = date("Y-m-d H:i:s",strtotime("+2 day"));
        if(strtolower($dateDay) == 'fri'){
            $date = date("Y-m-d", strtotime("+ 3 day"));
        }
        return $date;
    }
    public function jadwalKunjungan(Request $request)
    {
        // dd($request->session()->get('ip_address'));
        $pengaduan = RPengaduan::where('ip_address', $request->session()->get('ip_address'))->first();
        return view('jadwal-kunjungan')->with('title', 'Jadwal Pengaduan')->with('data', $pengaduan);
    }
    //admin
    public function pengaduan()
    {
        $pengaduan = RPengaduan::get();
        return view('pengaduan.index')->with('title', 'Pengaduan')->with('pengaduan', $pengaduan);
    }
    public function print()
    {
        $pengaduan = RPengaduan::get();
        return view('pengaduan.print')->with('data', $pengaduan);
    }

}
