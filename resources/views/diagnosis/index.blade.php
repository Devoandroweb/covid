@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            
            <div class="card p-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title font-weight-bold">Diagnosis</h3><br>
                            <p class="mb-0"><small>Pertanyaan untuk Pengaduan Pasien</small></p>
                        </div>
                        <div class="col text-right">
                            <a href="{{url('/diagnosis/create')}}" class="btn btn-info"><i
                                    class="fas fa-plus-circle"></i> Tambah Pertanyaan</a>
                            <a href="{{url('/diagnosis/print')}}" class="btn btn-warning">
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
                                <th width="5%">Nomor</th>
                                <th>Tipe</th>
                                <th>Pertanyaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <span class="right badge badge-info">{{$key->nomor}}</span>
                                        </td>
                                    <td>
                                        <i>
                                        @php
                                        $tipe = $key->tipe;
                                            if($tipe == 1){
                                                $tipe = 'Pilihan Ganda';
                                            }elseif($tipe == 2){
                                                $tipe = 'Essai';
                                            }elseif($tipe == 3){
                                                $tipe = 'Multi';
                                            }
                                            echo $tipe;
                                        @endphp
                                        </i>
                                    </td>
                                    <td>{{$key->pertanyaan}}</td>
                                    <td>
                                        <a href="{{url('diagnosis/delete/'.$key->id)}}"
                                            class="text-danger delete mr-2"><i class="fas fa-trash"></i></a>
                                        <a href="{{url('diagnosis/show/'.$key->id)}}" class="text-info">
                                            <i class="fas fa-pencil-ruler"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nomor</th>
                                <th>Tipe</th>
                                <th>Pertanyaan</th>
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
    $(function () {
        $("#data").DataTable({
            "responsive": true,
            "autoWidth": false,
        }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
        
    });
</script>
@endpush