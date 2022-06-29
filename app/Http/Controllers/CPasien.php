<?php

namespace App\Http\Controllers;

use App\Models\MPasien;
use App\Models\RPengaduan;
use Illuminate\Http\Request;

class CPasien extends Controller
{
    public function index()
    {
        $data = MPasien::get();
        return view('pasien.index')->with('title', 'Pasien')->with('data', $data);
    }
    public function create($title_page = 'Tambah')
    {
        $url = url('pasien/create-save');
        return view('pasien.form')
        ->with('data', null)
            ->with('title', 'Pasien')
            ->with('titlePage', $title_page)
            ->with('url', $url);
    }
    public function create_save(Request $request)
    {
        // dd($request->all());
        
        $mPasien = new MPasien;
        $this->creadentials($mPasien, $request);
        $mPasien->save();
        return redirect(url('pasien'))->with('msg', 'Sukses Menambahkan Data');
    }
    public function show($id)
    {
        // dd(MAgama::find($id));

        return view('pasien.form')
        ->with('data', MPasien::find($id))
            ->with('title', 'Pasien')
            ->with('titlePage', 'Edit')
            ->with('url', url('pasien/show-save/' . $id));
    }
    public function show_save($id, Request $request)
    {
        
        $mPasien = MPasien::find($id);
        $this->creadentials($mPasien, $request);
        $mPasien->update();
        return redirect(url('pasien'))->with('msg', 'Sukses Mengubah Data');
    }
    public function delete($id)
    {
        MPasien::find($id)->delete();
        return redirect(url('pasien'))->with('msg', 'Sukses Menghapus Data');
    }
    public function creadentials($mPasien, $request)
    {

        $mPasien->nik = $request->nik;
        $mPasien->no_rm = $request->no_rm;
        $mPasien->nama = $request->nama;
        $mPasien->jk = $request->jk;
        $mPasien->usia = $request->usia;
        $mPasien->status = $request->status;
        $mPasien->telp = $request->telp;
        $mPasien->alamat = $request->alamat;
    }
    public function print()
    {
        $data = MPasien::get();
        return view('pasien.print')->with('data', $data);
    }
    public function move($id)
    {
        $data = RPengaduan::select("*","nama_pasien as nama")->where('id',$id)->first();
        return view('pasien.form')
        ->with('data', $data)
            ->with('title', 'Pasien')
            ->with('titlePage', 'Tambah')
            ->with('url', url('pasien/create-save'));
    }
    
}
