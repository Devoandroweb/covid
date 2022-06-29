<?php

namespace App\Http\Controllers;

use App\Models\MPertanyaan;
use Illuminate\Http\Request;
use DataTables;
class CDiagnosis extends Controller
{
    public function index()
    {
        $data = MPertanyaan::get();
        return view('diagnosis.index')->with('title', 'Diagnosis')->with('data',$data);
    }
    public function create($title_page = 'Tambah')
    {
        $url = url('diagnosis/create-save');
        return view('diagnosis.form')
            ->with('data',null)
            ->with('title','Diagnosis')
            ->with('titlePage',$title_page)
            ->with('url',$url);
    }
    public function create_save(Request $request)
    {
        // dd($request->all());
        $existNomor = MPertanyaan::where('nomor',$request->nomor)->get()->count();
        if($existNomor > 0){
            return redirect()->back()->with('msg','Nomor Sudah tersedia');
        }
        $mPertanyaan = new MPertanyaan;
        $this->creadentials($mPertanyaan,$request);
        $mPertanyaan->save();
        return redirect(url('diagnosis'))->with('msg','Sukses Menambahkan Data');
    }
    public function show($id)
    {
        // dd(MAgama::find($id));
        
        return view('diagnosis.form')
            ->with('data',MPertanyaan::find($id))
            ->with('title','Diagnosis')
            ->with('titlePage','Edit')
            ->with('url',url('diagnosis/show-save/'.$id));
    }
    public function show_save($id, Request $request)
    {
        $existNomor = MPertanyaan::where('id','!=',$id)->where('nomor',$request->nomor)->get()->count();
        if($existNomor > 0){
            return redirect()->back()->with('msg','Nomor Sudah tersedia');
        }
        $mPertanyaan = MPertanyaan::find($id);
        $this->creadentials($mPertanyaan,$request);
        $mPertanyaan->update();
        return redirect(url('diagnosis'))->with('msg','Sukses Mengubah Data');

    }
    public function delete($id)
    {
        MPertanyaan::find($id)->delete();
        return redirect(url('diagnosis'))->with('msg','Sukses Menghapus Data');

    }
    public function creadentials($mPertanyaan,$request)
    {
        
        $mPertanyaan->nomor = $request->nomor;
        $mPertanyaan->tipe = $request->tipe;
        $mPertanyaan->pertanyaan = $request->pertanyaan;
        if($request->tipe == 1 || $request->tipe == 3){
            $mPertanyaan->jawaban = json_encode($request->answer);
        }else{
             $mPertanyaan->jawaban = json_encode([]);
        }   
    }
    public function print()
    {
        $data = MPertanyaan::get();
        return view('diagnosis.print')->with('data',$data);
    }
    
}
