@extends('adminlte::page')

@section('title', 'Tambah Pegawai')

@section('content_header')
    {{-- <h1>Master Divisi</h1> --}}
@stop

@section('content')
    <div class="row">
    	<div class="col-md-6 col-md-offset-3 col-sm-12">
    		<div class="panel panel-primary">
    			<div class="panel-heading">
    				<h4>Tambah Pegawai</h4>
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
    				<form method="post" action="{{ route('admin.master.pegawai.save') }}" class="form">
    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
    					<div class="form-group">
    						<label for="">Nama Pegawai</label>
    						<input type="text" class="form-control" name="nama" required="required" value="{{ old("nama") }}" />
    					</div>
    					<div class="form-group">
    						<label for="">Jabatan</label>
    						<select class="form-control" name="id_jabatan">
								@foreach(DB::table('jabatan')->get() as $jabatan)
									<option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
								@endforeach
    						</select>
    					</div>
    					<div class="form-group">
    						<label for="">Divisi</label>
    						<select class="form-control" name="id_divisi">
								@foreach(DB::table('divisi')->get() as $divisi)
									<option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
								@endforeach
    						</select>
    					</div>
    					<div class="form-group">
    						<label for="">Telepon</label>
    						<input type="text" class="form-control" name="telepon" required="required" value="{{ old("telepon") }}" />
    					</div>
    					<div class="form-group">
    						<label for="">Alamat</label>
    						<textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
    					</div>
    					<div class="form-group">
    						<label for="">Tanggal Awal Kerja</label>
    						<input type="date" class="form-control" name="tanggal_awal_kerja" required="required" value="{{ old("tanggal_awal_kerja") }}" />
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