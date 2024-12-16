@extends('layouts.base')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4 shadow-lg">
            <div class="card-body text-center bg-light">
                <h3 class="fw-bold text-dark">Edit Kamar</h3>
                <p class="text-muted">Perbarui informasi kamar sesuai dengan data yang diinginkan.</p>
            </div>
        </div>
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Kamar - {{ $kamar->nama_kamar }}</h5>
            </div>
            <div class="card-body">
            <form action="{{ route('kamar.update', $kamar->id) }}" method="POST">
                @csrf 
                @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kamar" class="form-label">Nama Kamar</label>
                        <input type="text" name="nama_kamar" class="form-control @error('nama_kamar') is-invalid @enderror" 
                               value="{{ old('nama_kamar', $kamar->nama_kamar) }}" readonly>
                        @error('no_kamar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="mb-3">
                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                    <input type="text" name="tipe_kamar" class="form-control @error('tipe_kamar') is-invalid @enderror" 
                        value="{{ old('tipe_kamar', $kamar->tipe_kamar) }}" readonly>
                    @error('tipe_kamar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" 
                        value="{{ old('harga', $kamar->harga) }}" required>
                </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input type="text" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" 
                               value="{{ old('kapasitas', $kamar->kapasitas) }}" required>
                        @error('kapasitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Update Data Kamar</button>
                    <a href="{{ route('kamar.index') }}" class="btn btn-secondary w-100 mt-3">Kembali ke Daftar Kamar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
