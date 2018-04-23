<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gaji;
class GajiController extends Controller
{
    public function index()
    {
    	$data['result'] = Gaji::get();
    	return view('admin.master.gaji.index',$data);
    }

    public function create()
    {
    	return view('admin.master.gaji.create');	
    }

    public function save(Request $request)
    {
    	$request->validate([
		    'gaji' 			=> 'required|numeric',
		    'id_jabatan'	=> 'required|exists:jabatan,id',
		    'id_divisi'		=> 'required|exists:divisi,id'
		]);

        // $gambar = $request->file('avatar')->store('gambars');
		$gaji               = new Gaji();    
		$gaji->gaji 		= $request->gaji;
		$gaji->id_jabatan	= $request->id_jabatan;
		$gaji->id_divisi	= $request->id_divisi;
        // $gaji->gambar        = $gambar;
		$gaji->save();
		return redirect()->route('admin.master.gaji');
    	
    }

    public function edit($id)
    {
        $data['row']    = Gaji::find($id);
        return view('admin.master.gaji.edit',$data);    
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'gaji'             => 'required|numeric',
            'id_jabatan'    => 'required|exists:jabatan,id',
            'x'        => 'required|exists:divisi,id'
        ]);

        $gaji               = Gaji::find($id);
        $gaji->gaji         = $request->gaji;
        $gaji->id_jabatan    = $request->id_jabatan;
        $gaji->id_divisi    = $request->id_divisi;
        $gaji->save();
        return redirect()->route('admin.master.gaji');
    }
}
