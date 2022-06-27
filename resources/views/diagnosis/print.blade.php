<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>
<style>
    table, th,td{
        border-collapse: collapse;
        border: 1px solid black;
        border-spacing: 0;
    }
    td,th{
        padding: 1rem;
    }
    .text-center{
        text-align: center;
    }
</style>
<body>
    <h3 class="text-center">DATA DIAGNOSIS PASIEN</h3>
    <table id="data" style="width:100%;" cellspacing>
        <thead>
            <tr>
                <th width="3%">#</th>
                <th width="5%">Nomor</th>
                <th>Tipe</th>
                <th>Pertanyaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td class="text-center">
                    <span class="">{{$key->nomor}}</span>
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
            </tr>
            @endforeach
        </tbody>
    
    </table>
</body>
</html>
<script>
    window.print();
</script>