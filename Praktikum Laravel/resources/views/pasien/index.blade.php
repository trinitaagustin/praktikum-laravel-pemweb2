@extends('admin.app')

@section('content')
        <div class="wrapper">
        <div class="content-wrapper">
            <h1>Daftar Pasien</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien Baru</a>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $pasien)
                        <tr>
                            <td>{{ $pasien->kode }}</td>
                            <td>{{ $pasien->nama }}</td>
                            <td>{{ $pasien->tmp_lahir }}</td>
                            <td>{{ $pasien->tgl_lahir }}</td>
                            <td>{{ $pasien->gender }}</td>
                            <td>{{ $pasien->email }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>{{ $pasien->kelurahan ? $pasien->kelurahan->kelurahan : '-' }}</td>
                            <td>
                                <a href="{{ route('pasien.show', $pasien) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('pasien.edit', $pasien) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pasien.destroy', $pasien) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pasien ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data pasien.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endsection