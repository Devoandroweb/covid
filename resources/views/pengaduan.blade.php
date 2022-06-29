@extends('app')

@section('content')
<div style="position: relative;text-align:center;align-items:center; display:flex;">
    <hr style="width:100%;position:absolute">
    <div class="" style="background: #f4f6f9;
                padding: 1rem;
                z-index: 9;
                margin:auto">
                
        <img src="{{asset('/assets/dist/img/logo-rs-baru.png')}}" style="width: 10%" class="mr-3 mb-2" alt="">
        <div style="">
            <h1 class="font-weight-bold">SELAMAT DATANG</h1>
            <h6>Di Aplikasi Pengaduan COVID 19 Pukesmas Cimahi Utara</h6>
        </div>
    </div>
</div>
<br>
<form action="{{url('pengaduan-save')}}" method="post">
    @csrf
    <div class="card card-default">
        <div class="card-body p-sm-0 p-md-2">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                            id="logins-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Identitas Pasien</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                            id="information-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Diagnosis</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content" id="step-1">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIK</label>
                            <input type="text" class="form-control" name="nik" id="exampleInputEmail1" placeholder="Masukkan Nomor Induk Kependudukan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama_pasien" id="exampleInputEmail1" placeholder="Masukkan Nama Pasien">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No. Telepon</label>
                            <input type="text" class="form-control" name="no_telp" id="exampleInputPassword1"
                                placeholder="Masukkan Nomor Telepon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" id="exampleInputPassword2"
                                placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <button type="button" class="btn btn-success btn-next" disabled onclick="stepper.next()">Selanjutnya <i class="fas fa-chevron-circle-right"></i></button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel"
                        aria-labelledby="information-part-trigger">
                        @foreach($diagnosis as $key)
                            @php
                                $jawaban = json_decode($key->jawaban);
                            @endphp
                            <input type="hidden" name="nomor[]" value="{{$key->nomor}}">
                            <input type="hidden" name="pertanyaan[]" value="{{$key->pertanyaan}}">
                            @if($key->tipe == 3)
                            <div class="form-group">
                                <label for="exampleInputPassword2">{{$key->nomor.". ".$key->pertanyaan}}</label>
                                <div>
                                @foreach($jawaban as $jaw)
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="answer{{$key->nomor}}[]" value="{{$jaw}}" id="checkbox{{$key->nomor.'-'.$loop->iteration}}">
                                    <label for="checkbox{{$key->nomor.'-'.$loop->iteration}}">
                                        {{$jaw}}
                                    </label>
                                </div>
                                @endforeach
                                </div>
                            </div>
                            @elseif($key->tipe == 1)
                             <div class="form-group">
                                 <label for="exampleInputPassword2">{{$key->nomor.". ".$key->pertanyaan}}</label>
                                 <div>
                                 @foreach($jawaban as $jaw)
                                 <div class="icheck-primary d-inline">
                                     <input type="radio" name="answer{{$key->nomor}}[]" value="{{$jaw}}"
                                         id="checkbox{{$key->nomor.'-'.$loop->iteration}}">
                                     <label for="checkbox{{$key->nomor.'-'.$loop->iteration}}">
                                         {{$jaw}}
                                     </label>
                                 </div>
                                 @endforeach
                                 </div>
                             </div>
                            @else
                            <div class="form-group">
                                <label for="exampleInputPassword2">{{$key->nomor.". ".$key->pertanyaan}}</label>
                                <textarea name="answer{{$key->nomor}}[]" class="form-control" id="exampleInputPassword2"
                                    placeholder=""></textarea>
                            </div>
                            @endif
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="stepper.previous()"><i class="fas fa-chevron-circle-left"></i> Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection
@push('js')
<script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });
    cekInput();
    $("#logins-part .form-control").keyup(function (e) { 
        e.preventDefault();
        cekInput();
    });
    function cekInput(){
        var el = $("#logins-part").find('.form-control');
        var btn = false;
        $.each(el, function (indexInArray, valueOfElement) { 
            if(valueOfElement.value != ""){
                $(".btn-next").removeAttr('disabled');
                btn = true;
            }
        });
        $.each(el, function (indexInArray, valueOfElement) { 
            if(valueOfElement.value == ""){
                $(".btn-next").removeAttr('disabled');
                btn = false;
            }
        });
        if(btn){
            console.log(btn);
        }else{
            $(".btn-next").prop("disabled","disabled");
            console.log(btn);
        }
    }
</script>
@endpush