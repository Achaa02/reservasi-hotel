@extends('layouts.base')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4 shadow-lg">
            <div class="card-body text-center bg-light">
                <h3 class="fw-bold text-dark">Tambah Kamar Baru</h3>
                <p class="text-muted">Masukkan detail kamar baru yang akan ditambahkan ke sistem.</p>
            </div>
        </div>
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Kamar Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kamar.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="no_kamar" class="form-label">Nama Kamar</label>
                        <input type="text" name="nama_kamar" class="form-control @error('nama_kamar') is-invalid @enderror" value="{{ old('nama_kamar') }}" required>
                        @error('no_kamar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                        <select name="tipe_kamar" class="form-control @error('tipe_kamar') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih Tipe Kamar</option>
                            <option value="Standar" {{ old('tipe_kamar') == 'Standar' ? 'selected' : '' }}>Standar</option>
                            <option value="Deluxe" {{ old('tipe_kamar') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                            <option value="Suite" {{ old('tipe_kamar') == 'Suite' ? 'selected' : '' }}>Suite</option>
                            <option value="Standar" {{ old('tipe_kamar') == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Deluxe" {{ old('tipe_kamar') == 'Executive' ? 'selected' : '' }}>Executive</option>
                            <option value="Suite" {{ old('tipe_kamar') == 'Presidential' ? 'selected' : '' }}>Presidential</option>
                            <option value="Suite" {{ old('tipe_kamar') == 'Family' ? 'selected' : '' }}>Family</option>
                            <option value="Suite" {{ old('tipe_kamar') == 'Penthouse' ? 'selected' : '' }}>Penthouse</option>
                            <option value="Presidential Suite" {{ old('tipe_kamar') == 'Presidential Suite' ? 'selected' : '' }}>Presidential Suite</option>
                        </select>
                        @error('tipe_kamar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input type="text" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" value="{{ old('kapasitas') }}" required>
                        @error('kapasitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Kamar</button>
                </form>
                <a href="{{ route('kamar.index') }}" class="btn btn-secondary w-100 mt-3">Kembali ke Daftar Kamar</a>
            </div>
        </div>
    </div>
@endsection
