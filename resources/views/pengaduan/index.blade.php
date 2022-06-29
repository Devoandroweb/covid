@extends('app')

@section('content')
<style>
    ul{
        list-style: none;
        display: contents;
    }
</style>
<?php
use App\Traits\Helper;  
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            
            <div class="card p-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title font-weight-bold">Jadwal Kunjungan Pasien</h3><br>
                            <p class="mb-0"><small>Data Kunjungan dan Diagnosis Pasien</small></p>
                        </div>
                        <div class="col text-right">
                            <a target="_blank" href="{{url('/pengaduan/print')}}" class="btn btn-warning">
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
                                <th width="5%">NIK</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Jadwal Kunjungan</th>
                                <th>Diagnosis</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduan as $key)
                                <tr>
                                    <td></td>
                                    <td>{{$key->nik}}</td>
                                    <td>{{$key->nama_pasien}}</td>
                                    <td>{{$key->telp}}</td>
                                    <td>{{$key->alamat}}</td>
                                    <td>{{Helper::convertDate($key->jadwal,true,false,false)}}</td>
                                    {{-- <td>
                                        <a href="{{url('pasien/delete/'.$key->id)}}"
                                            class="text-danger delete mr-2"><i class="fas fa-trash"></i></a>
                                        <a href="{{url('pasien/show/'.$key->id)}}" class="text-info">
                                            <i class="fas fa-pencil-ruler"></i></a>
                                    </td> --}}
                                    <td>
                                        @php
                                            $jsonPengaduan = json_decode($key->pengaduan);

                                            $html = "<ul>";
                                            foreach($jsonPengaduan as $peng){
                                                // dd($jsonPengaduan);
                                                $html .= "<li>".$peng->nomor.". ".$peng->pertanyaan."</li>";
                                                $html .= "<div class='ml-3 text-success'>";
                                                $html .= "<i>";
                                                    
                                                $jawaban = json_decode($peng->jawaban);
                                                $i = 0;
                                                $len = count($jawaban);
                                                        // dd($jawaban);
                                                foreach ($jawaban as $jaw) {
                                                    $html .= $jaw;
                                                    if ($i != $len - 1) {
                                                        $html .= ", ";
                                                    }
                                                    // …
                                                    $i++;
                                                }
                                                $html .= "</i>";
                                                $html .= "</div>";
                                            }
                                            $html .= "</ul>";
                                            echo $html;
                                        @endphp
                                    </td>
                                    <td><a href="{{url('pasien/move/'.$key->id)}}" class="text-info" data-toggle="tooltip" data-placement="top" title="Simpan Sebagai Pasien"><i class="fas fa-save"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="3%">#</th>
                                <th width="5%">NIK</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Jadwal Kunjungan</th>
                                <th>Diagnosis</th>
                                 <th></th>
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
                    "targets": [ 6 ],
                    visible: false,
                },
                {
                    "targets": [ 7 ],
                    orderable: false,
                },
            ]
        });
        // Add event listener for opening and closing details
    function format(value) {
        return '<table><tr><th>Diagnosis</th><td><div>'+value[6]+'</div></td></tr></table>';
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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
</script>
@endpush
