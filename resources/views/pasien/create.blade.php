@extends('admin.app')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1>Tambah Pasien Baru</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pasien.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode') }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="{{ old('tmp_lahir') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="">- Pilih -</option>
                        <option value="L" {{ old('gender', $editData->gender ?? '') == 'L' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="P" {{ old('gender', $editData->gender ?? '') == 'P' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email (Opsional)</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="kelurahan_id" class="form-label">Kelurahan</label>
                    <select class="form-select" id="kelurahan_id" name="kelurahan_id" required>
                        <option value="">-- Pilih Kelurahan --</option>
                        @foreach($kelurahans as $kelurahan)
                            <option value="{{ $kelurahan->id }}" {{ old('kelurahan_id') == $kelurahan->id ? 'selected' : '' }}>
                                {{ $kelurahan->kelurahan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection