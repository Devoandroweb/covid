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
    <h3 class="text-center">DATA JADWAL KUNJUNGAN PASIEN</h3>
    <table id="data" style="width:100%;" cellspacing>
        <thead>
            <tr>
                <th width="3%">#</th>
                <th width="5%">NIK</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Jadwal Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$key->nik}}</td>
                <td>{{$key->nama_pasien}}</td>
                <td>{{$key->telp}}</td>
                <td>{{$key->alamat}}</td>
                <td>{{$key->jadwal}}</td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
</body>
</html>
<script>
    window.print();
</script>