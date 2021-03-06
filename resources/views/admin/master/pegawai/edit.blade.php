@extends('adminlte::page')

@section('title', 'Edit Pegawai')

@section('content_header')
    {{-- <h1>Master Divisi</h1> --}}
@stop

@section('content')
    <div class="row">
    	<div class="col-md-6 col-md-offset-3 col-sm-12">
    		<div class="panel panel-primary">
    			<div class="panel-heading">
    				<h4>Edit Pegawai</h4>
    			</div>
    			<div class="panel-body">
    				@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
    				<form method="post" action="{{ route('admin.master.pegawai.update',$row->id) }}" class="form">
    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="put">
    					<div class="form-group">
    						<label for="">Nama Pegawai</label>
    						<input type="text" class="form-control" name="nama" required="required" value="{{ $row->nama }}" />
    					</div>
    					<div class="form-group">
    						<label for="">Jabatan</label>
    						<select class="form-control" name="id_jabatan">
								@foreach(DB::table('jabatan')->get() as $jabatan)
									<option value="{{ $jabatan->id }}" {{ ($jabatan->id==$row->id_jabatan?'selected':null) }}>{{ $jabatan->nama_jabatan }}</option>
								@endforeach
    						</select>
    					</div>
    					<div class="form-group">
    						<label for="">Divisi</label>
    						<select class="form-control" name="id_divisi">
								@foreach(DB::table('divisi')->get() as $divisi)
									<option value="{{ $divisi->id }}" {{ ($divisi->id == $row->id_divisi?'selected':null) }}>{{ $divisi->nama_divisi }}</option>
								@endforeach
    						</select>
    					</div>
    					<div class="form-group">
    						<label for="">Telepon</label>
    						<input type="text" class="form-control" name="telepon" required="required" value="{{ $row->telepon }}" />
    					</div>
    					<div class="form-group">
    						<label for="">Alamat</label>
    						<textarea class="form-control" name="alamat">{{ $row->alamat }}</textarea>
    					</div>
    					<div class="form-group">
    						<label for="">Tanggal Awal Kerja</label>
    						<input type="date" class="form-control" name="tanggal_awal_kerja" required="required" value="{{ $row->tanggal_awal_kerja }}" />
    					</div>
    					<div class="form-group text-right">
    						<button class="btn btn-primary" type="submit">Simpan</button>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop