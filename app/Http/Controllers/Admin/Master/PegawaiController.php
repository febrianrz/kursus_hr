<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pegawai;
class PegawaiController extends Controller
{
    public function index()
    {
    	$data['result'] = Pegawai::get();
    	return view('admin.master.pegawai.index',$data);
    }

    public function create()
    {
        
    	return view('admin.master.pegawai.created');	
    }

    public function save(Request $request)
    {
    	$request->validate([
		    'nama' 			=> 'required|min:3',
		    'id_jabatan'	=> 'required|exists:jabatan,id',
		    'id_divisi'		=> 'required|exists:divisi,id',
		    'telepon'		=> 'required|numeric',
		    'tanggal_awal_kerja' => 'required',
		    'alamat'		=> 'required'
		]);
    	$pegawai = new Pegawai();
    	$pegawai->nama 			= $request->nama;
    	$pegawai->id_jabatan	= $request->id_jabatan;
    	$pegawai->id_divisi		= $request->id_divisi;
    	$pegawai->telepon		= $request->telepon;
    	$pegawai->alamat		= $request->alamat;
    	$pegawai->tanggal_awal_kerja = date('Y-m-d', strtotime($request->tanggal_awal_kerja));
    	$pegawai->save();
    	return redirect()->route('admin.master.pegawai');
    }

    public function edit($id)
    {
        $data['row'] = Pegawai::findOrFail($id);
        return view('admin.master.pegawai.edit',$data);    
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama'             => 'required|min:3',
            'id_jabatan'    => 'required|exists:jabatan,id',
            'id_divisi'        => 'required|exists:divisi,id',
            'telepon'        => 'required|numeric',
            'tanggal_awal_kerja' => 'required',
            'alamat'        => 'required'
        ]);
        $pegawai = Pegawai::find($id);
        $pegawai->nama             = $request->nama;
        $pegawai->id_jabatan       = $request->id_jabatan;
        $pegawai->id_divisi        = $request->id_divisi;
        $pegawai->telepon          = $request->telepon;
        $pegawai->alamat           = $request->alamat;
        $pegawai->tanggal_awal_kerja = date('Y-m-d', strtotime($request->tanggal_awal_kerja));
        $pegawai->save();
        return redirect()->route('admin.master.pegawai');
    }


}
