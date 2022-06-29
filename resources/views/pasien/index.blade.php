@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            
            <div class="card p-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title font-weight-bold">Pasien</h3><br>
                            <p class="mb-0"><small>Data Pasien dan Penentuan Nomor RM</small></p>
                        </div>
                        <div class="col text-right">
                            <a href="{{url('/pasien/create')}}" class="btn btn-info"><i
                                    class="fas fa-plus-circle"></i> Tambah Pasien</a>
                            <a href="{{url('/pasien/print')}}" class="btn btn-warning">
                                <i class="fas fa-print"></i> Cetak</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                    @endif
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="3%">#</th>
                                <th width="10%">NIK</th>
                                <th>No. RM</th>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>JK</th>
                                <th>Usia</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key)
                                <tr data-child-name="row{{$loop->iteration-1}}" data-childvalue="{{$key->nama}}">
                                    <td></td>
                                    <td>
                                        <span class="right badge badge-info">{{$key->nik}}</span>
                                    </td>
                                    <td>{{$key->no_rm}}</td>
                                    
                                    <td>{{$key->nama}}</td>
                                    <td>{{$key->telp}}</td>
                                    <td>{{$key->alamat}}</td>
                                    <td>
                                        @if($key->jk == 1)
                                            Laki-Laki
                                        @elseif($key->jk == 2)
                                            Perempuan
                                        @endif
                                    </td>
                                    <td>{{$key->usia}}</td>
                                    <td>
                                        @if($key->status == 1)
                                            Sembuh
                                        @elseif($key->status == 2)
                                            Positif
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('pasien/delete/'.$key->id)}}"
                                            class="text-danger delete mr-2"><i class="fas fa-trash"></i></a>
                                        <a href="{{url('pasien/show/'.$key->id)}}" class="text-info">
                                            <i class="fas fa-pencil-ruler"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="3%">#</th>
                                <th width="5%">ID Pengaduan</th>
                                <th>No. RM</th>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>JK</th>
                                <th>Usia</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection
@push('js')
<script>
    var table = $("#data").DataTable({
            "responsive": true,
            "autoWidth": false,
            "columnDefs": [
                { className: "dt-control", "targets": [ 0 ] },
                {
                    "targets": [ 4,5,6 ],
                    visible: false,
                },
            ]
        });
        // Add event listener for opening and closing details
    function format(value) {
        return '<div><table>\
                    <tr>\
                        <td class="font-weight-bold">No. Telepon</td>\
                        <td>:</td>\
                        <td>'+value[4]+'</td>\
                    </tr>\
                    <tr>\
                        <td class="font-weight-bold">Jenis Kelamin</td>\
                        <td>:</td>\
                        <td>'+value[6]+'</td>\
                    </tr>\
                    <tr>\
                        <td class="font-weight-bold">Alamat</td>\
                        <td>:</td>\
                        <td>'+value[5]+'</td>\
                    </tr>\
                </table></div>';
    };
    $('#data tbody').on('click', 'td.dt-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        
        if (row.child.isShown()) {
            // This row is already open - close it
	        row.child.hide();
	        tr.removeClass('shown');
	    } else {
            // Open this row
            console.log(row.data()[3]);
	        row.child(format(row.data())).show();
	        tr.addClass('shown');
	    }
    });
</script>
@endpush
