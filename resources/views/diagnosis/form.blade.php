@extends('app')
@section('content')
<?php 
use App\Traits\Helper;  
$name[] = 'nomor';
$name[] = 'tipe';
$name[] = 'pertanyaan';
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
                            <h3 class="card-title font-weight-bold">{{$titlePage}} Diagnosis</h3><br>
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
                           <div class="form-group col">
                               <label for="exampleInputEmail1">Nomor</label>
                               <input type="number" class="form-control @error($name[0]) is-invalid @enderror"
                                   value="{{Helper::showData($data,$name[0])}}" name="{{$name[0]}}" autocomplete="off" required />
                           </div>
                           <div class="form-group col">
                               <label for="exampleInputEmail1">Tipe Pertanyaan</label>
                               <select id="tipe" class="form-control @error($name[1]) is-invalid @enderror"
                                   name="{{$name[1]}}" autocomplete="off" required>
                                   <option value="" selected disabled> Pilih Tipe</option>

                                   <option value="1" {{(old($name[1]) == 1) ? 'selected' : ''}}
                                       {{Helper::showDataSelected2($data,$name[1],1)}}>
                                       Pilihan Ganda
                                   </option>
                                   <option value="2" {{(old($name[1]) == 2) ? 'selected' : ''}}
                                       {{Helper::showDataSelected2($data,$name[1],2)}}>
                                       Essai
                                   </option>
                                   <option value="3" {{(old($name[1]) == 3) ? 'selected' : ''}}
                                       {{Helper::showDataSelected2($data,$name[1],3)}}>
                                       Multi
                                   </option>
                               </select>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pertanyaan</label>
                            <textarea type="text" class="form-control @error($name[2]) is-invalid @enderror" cols="5"
                                rows="6" value="" name="{{$name[2]}}"
                                autocomplete="off" required>{{Helper::showData($data,$name[2])}}</textarea>
                        </div>
                        @php
                            $style = 'display:none;';
                            if($data != null){
                                if($data->tipe == 1 || $data->tipe == 3){
                                    $style = 'display:block;';
                                }
                            }
                        @endphp
                        <div class="jawaban py-2 mb-4" style="{{$style}}">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputEmail1">Pilihan Jawaban</label>
                                </div>
                                <div class="col text-right">
                                    <a href="#" id="add-jawaban"> + Tambah Pilihan Jawaban</a>
                                </div>
                            </div>
                            <div id="ganda">
                                <table class="w-100" id="table-jawaban">
                                    @if($data == null)
                                    <tr>
                                        <td>
                                            <input type="text" name="answer[]" class="w-100 form-control answer"
                                                placeholder="Tuliskan Pilihan Jawaban disini" autocomplete="off"
                                                required>
                                        </td>
                                        <td class="text-right text-danger">
                                            <i class="fas fa-trash pointer del-jawaban"></i>
                                        </td>
                                    </tr>
                                    @else
                                        @if($data->tipe == 1 || $data->tipe == 3)
                                            @php 
                                                $jawaban = json_decode($data->jawaban);
                                            @endphp
                                            @foreach($jawaban as $jaw)
                                                <tr>
                                                    <td>
                                                        <input type="text" name="answer[]" class="w-100 form-control answer"
                                                            placeholder="Tuliskan Pilihan Jawaban disini" value="{{$jaw}}"
                                                            autocomplete="off" required>
                                                    </td>
                                                    <td class="text-right text-danger">
                                                        <i class="fas fa-trash pointer del-jawaban"></i>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endif
                                </table>   
                            </div>
                            <div id="multi">

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