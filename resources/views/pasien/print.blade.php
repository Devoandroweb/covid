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
    <h3 class="text-center">DATA PASIEN</h3>
    <table id="data" style="width:100%;" cellspacing>
        <thead>
            <tr>
                <th width="3%">#</th>
                <th>No. RM</th>
                <th width="10%">NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
                <th>Status</th>
                <th>No. Telp</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$key->no_rm}}</td>
                <td>{{$key->nik}}</td>
                <td>{{$key->nama}}</td>
                <td>
                    <i>
                        @php
                        $jk = $key->jk;
                        if($jk == 1){
                            $jk = 'Laki-Laki';
                        }elseif($jk == 2){
                            $jk = 'Perempuan';
                        }
                        echo $jk;
                        @endphp
                    </i>
                </td>
                <td>{{$key->usia}}</td>
                <td>{{$key->status}}</td>
                <td>{{$key->telp}}</td>
                <td>{{$key->alamat}}</td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
</body>
</html>
<script>
    window.print();
</script>