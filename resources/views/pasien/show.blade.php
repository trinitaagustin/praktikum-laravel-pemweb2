@extends('admin.app')

@section('content')
    <div class="wrapper">
    <div class="content-wrapper">
        <h1>Detail Pasien: {{ $pasien->nama }}</h1>

        <table class="table table-bordered">
            <tr>
                <th>Kode</th>
                <td>{{ $pasien->kode }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $pasien->nama }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $pasien->tmp_lahir }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $pasien->tgl_lahir }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $pasien->gender }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $pasien->email ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pasien->alamat }}</td>
            </tr>
            <tr>
                <th>Kelurahan</th>
                <td>{{ $pasien->kelurahan ? $pasien->kelurahan->kelurahan : '-' }}</td>
            </tr>
        </table>

        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('pasien.edit', $pasien) }}" class="btn btn-warning">Edit</a>
    </div>
    </div>
@endsection