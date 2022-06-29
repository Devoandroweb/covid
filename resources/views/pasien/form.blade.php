@extends('app')
@section('content')
<?php 
use App\Traits\Helper;  
$name[] = 'nik';
$name[] = 'no_rm';
$name[] = 'nama';
$name[] = 'jk';
$name[] = 'usia';
$name[] = 'status';
$name[] = 'telp';
$name[] = 'alamat';
?>
<style>
    .pointer{
        cursor: pointer;
    }
    .answer{
        border: 0 solid !important;
    }
    .answer:hover,.answer:focus{
        border: 1px solid rgb(174, 174, 174) !important;
    }
    table td{
        padding-bottom: 10px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card p-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title font-weight-bold">{{$titlePage}} Pasien</h3><br>
                            <p class="mb-0"><small>Tambah Pertanyaan untuk Pengaduan Pasien</small></p>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(session('msg'))
                        <div class="alert alert-danger">{{session('msg')}}</div>
                    @endif
                   <form action="{{$url}}" method="post">
                       @csrf
                       <div class="row">
                           <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">NIK</label>
                               <input type="text" class="form-control @error($name[0]) is-invalid @enderror"
                                   value="{{Helper::showData($data,$name[0])}}" name="{{$name[0]}}" autocomplete="off" required />
                           </div>
                           <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">No. RM</label>
                               <input type="text" class="form-control @error($name[1]) is-invalid @enderror"
                                   value="{{Helper::showData($data,$name[1])}}" name="{{$name[1]}}" autocomplete="off" required />
                           </div>
                           <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Nama</label>
                               <input type="text" class="form-control @error($name[2]) is-invalid @enderror"
                                   value="{{Helper::showData($data,$name[2])}}" name="{{$name[2]}}" autocomplete="off" required />
                           </div>
                           
                           <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Jenis Kelamin</label>
                               <select id="tipe" class="form-control @error($name[3]) is-invalid @enderror"
                                   name="{{$name[3]}}" autocomplete="off" required>
                                   <option value="" selected disabled> Pilih Jenis Kelamin</option>

                                   <option value="1" {{(old($name[3]) == 1) ? 'selected' : ''}}
                                       {{Helper::showDataSelected2($data,$name[3],1)}}>
                                       Laki - Laki
                                   </option>
                                   <option value="2" {{(old($name[3]) == 2) ? 'selected' : ''}}
                                       {{Helper::showDataSelected2($data,$name[3],2)}}>
                                       Perempuan
                                   </option>
                               </select>
                           </div>
                           <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Usia</label>
                               <input type="number" class="form-control @error($name[4]) is-invalid @enderror"
                                   value="{{Helper::showData($data,$name[4])}}" name="{{$name[4]}}" autocomplete="off" required />
                           </div>
                           <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Status</label>
                               <select id="tipe" class="form-control @error($name[5]) is-invalid @enderror"
                                   name="{{$name[5]}}" autocomplete="off" required>
                                   <option value="" selected disabled> Pilih Status Pasien</option>

                                   <option value="1" {{(old($name[5]) == 1) ? 'selected' : ''}}
                                       {{Helper::showDataSelected2($data,$name[5],1)}}>
                                       Sembuh
                                   </option>
                                   <option value="2" {{(old($name[5]) == 2) ? 'selected' : ''}}
                                       {{Helper::showDataSelected2($data,$name[5],2)}}>
                                       Positif
                                   </option>
                               </select>
                           </div>
                           <div class="form-group col-md-12">
                               <label for="exampleInputEmail1">No Telepon</label>
                               <input type="text" class="form-control @error($name[6]) is-invalid @enderror"
                                   value="{{Helper::showData($data,$name[6])}}" name="{{$name[6]}}" autocomplete="off" required />
                           </div>
                           <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Pertanyaan</label>
                            <textarea type="text" class="form-control @error($name[7]) is-invalid @enderror" cols="5"
                                rows="6" value="" name="{{$name[7]}}"
                                autocomplete="off" required>{{Helper::showData($data,$name[7])}}</textarea>
                        </div>
                        </div>
                       
                       <input type="submit" class="btn btn-success" value="Simpan" />
                       <a href="" onclick="history.back()" class="btn btn-default">Kembali</a>
                   </form>
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
    $(document).ready(function(){
       
        $("#add-jawaban").click(function(e){
            e.preventDefault();
            var html = generateJawabanInput();
            $("#table-jawaban").append(html);
        });
        $(document).on('click', '.del-jawaban',function (e) {
            var el = $(this).closest('tr');
            el.remove();
        });
        $("#tipe").change(function(e){
            if($(this).val() == 1 || $(this).val() == 3){
                $(".jawaban").show();
                var html = generateJawabanInput();
                $("#table-jawaban").html(html);
                $('.answer').attr('required','required');
                
            }else{
                $(".jawaban").hide();
                $('.answer').removeAttr('required');
            }
        });
        function generateJawabanInput(){
            var html = '<tr>\
                <td>\
                    <input type="text" name="answer[]" class="w-100 form-control answer" \
                        placeholder="Tuliskan Pilihan Jawaban disini">\
                </td>\
                <td class="text-right text-danger">\
                    <i class="fas fa-trash pointer del-jawaban"></i>\
                </td>\
            </tr>';
            return html;
        }
    });
</script>

@endpush