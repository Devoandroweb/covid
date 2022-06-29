@extends('app')

@section('content')
<center class="mb-5">
    <img src="{{asset('/assets/dist/img/logo-rs-baru.png')}}" width="5%" alt="">
    <h1 class="font-weight-bold">SELAMAT DATANG</h1>
    <h6>Di Aplikasi Pengaduan COVID 19 Pukesmas Cimahi Utara</h6>
    <p>Jl. Jati Serut No.16, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40573</p>
</center>
<div class="row justify-content-center">
	<div class="col-6 col-md-3">
		<div class="small-box bg-info">
			<div class="inner">
				<h3>{{$countPasien}}</h3>
				<p>Pasien</p>
			</div>
            
			<div class="icon"> <i class="ion ion-person-stalker"></i> </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
        </div>
	</div>
	<div class="col-6 col-md-3">
		<div class="small-box bg-success">
			<div class="inner">
				<h3>{{$countPertanyaan}}</h3>
				<p>Diagnosis</p>
			</div>
			<div class="icon"> <i class="ion ion-help"></i> </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
        </div>
	</div>
	</div>
    <div class="row justify-content-center">
        <div class="col-6 col-md-3">
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>{{$countPengaduan}}</h3>
				<p>Pengaduan Pasien</p>
			</div>
			<div class="icon"> <i class="ion ion-speakerphone"></i> </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
        </div>
	</div>
	<div class="col-6 col-md-3">
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>{{$countPengunjung}}</h3>
				<p>Pengunjung</p>
			</div>
			<div class="icon"> <i class="ion ion-eye"></i> </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
        </div>
    </div>

</div>
@endsection