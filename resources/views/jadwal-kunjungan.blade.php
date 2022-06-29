@extends('app')

@section('content')
<?php 
use App\Traits\Helper;  
$nomor = DB::table('setting')->where('kode','call_darurat')->pluck('value');

?>

<div class="row justify-content-center mt-4">
    <div class="col col-md-5">
        <div class="callout callout-danger p-5">
            <center class="mb-4">
                    <img src="{{asset('/assets/dist/img/logo-rs-baru.png')}}" style="width: 15%" class="mb-4" alt="">
                <h1 class="font-weight-bold">RS Gela Gelo</h1><br>
                <h6><i>Pengaduan sudah kami terima,<br> silahkan datang sesuai jadwal di bawah ini</i></h6>
            </center>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6 mb-2">
                    <div class="font-weight-bold">Nomor Induk Kependudukan</div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="text-right w-100">{{$data->nik}}</div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6 mb-2">
                    <div class="font-weight-bold">Jadwal Kunjungan</div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="text-right w-100">{{Helper::convertDate($data->jadwal,true,false,false)}}</div>
                </div>
            </div>
            <br>
            <br>
            <p><small>
                Jika darurat silahkan hubungi  pertugas <br>
                {{$nomor[0]}}    
            </small></p>
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    
</script>