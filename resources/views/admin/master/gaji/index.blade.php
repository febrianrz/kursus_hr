@extends('adminlte::page')

@section('title', 'Master Gaji')

@section('content_header')
    {{-- <h1>Master Divisi</h1> --}}
@stop

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-primary">
    			<div class="panel-heading">
    				<h4>Master Gaji</h4>
    			</div>
    			<div class="panel-body">
    				{{-- <a href="{{ route("admin.master.gaji.create") }}" class="btn btn-primary">Tambah</a> --}}
    				<div class="table-responsive">
    					<table class="table table-striped table-bordered datatable">
    						<thead>
    							<tr>
    								<th>Divisi</th>
    								<th>Jabatan</th>
    								<th>Gaji</th>
    								<th>Action</th>
    							</tr>
    						</thead>
                            <tbody>
                                @foreach ($result as $row)
                                    <tr>
                                        <td>{{ $row->divisi->nama_divisi }}</td>
                                        <td>{{ $row->jabatan->nama_jabatan }}</td>
                                        <td>{{ $row->gaji }}</td>
                                        <td class="text-center">  
                                            <a href="{{ route("admin.master.gaji.edit",$row->id) }}" title="Edit">
                                                <i class="glyphicon glyphicon-pencil" style="color: green"></i>
                                            </a>&nbsp;&nbsp;
                                            <a href="{{ route("admin.master.gaji.delete",$row->id) }}" title="Hapus" class="hapus">
                                                <i class="glyphicon glyphicon-trash" style="color: red"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".datatable").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'Tambah',
                        action: function ( e, dt, node, config ) {
                            window.location.href = "{{ route("admin.master.gaji.create") }}";
                        }
                    }
                ],
            });

            $(".dt-buttons .btn-default").removeClass('btn-default')
                .addClass('btn-primary');

        });    
    </script>
@stop