<!DOCTYPE html>
<html>

<head>
    <title>Daftar Program Studi</title>
</head>

<body>
    <h1>Daftar Program Studi</h1>
    <ul>
        @foreach($ar_prodi as $prodi)
            <li>{{ $prodi->kode }} - {{ $prodi->nama }}</li>
        @endforeach
    </ul>
</body>

</html>