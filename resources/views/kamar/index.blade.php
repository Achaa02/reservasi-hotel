@extends('layouts.base')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4 shadow-lg">
            <div class="card-body text-center bg-light">
                <h3 class="fw-bold text-dark">Manajemen Daftar Kamar</h3>
                <p class="text-muted">Kelola data kamar hotel Anda dengan mudah dan efisien.</p>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-secondary">Daftar Kamar</h4>
            <a href="{{ route('kamar.create') }}" class="btn btn-dark btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Daftar Kamar
            </a>
        </div>
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white d-flex align-items-center">
                <i class="bi bi-list-ul me-2"></i>
                <h5 class="mb-0">Daftar Kamar</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Kamar</th>
                                <th>Tipe Kamar</th>
                                <th>Harga</th>
                                <th>Kapasitas</th>                               
                                <th>Ketersediaan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($kamars as $kamar)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $kamar->nama_kamar }}</td>
                                    <td>{{ $kamar->tipe_kamar }}</td>
                                    <td>{{ $kamar->harga }}</td>
                                    <td>{{ $kamar->kapasitas }} </td>                                    
                                    <td>
                                        @if($kamar->ketersediaan == 'Tersedia')
                                            <span class="badge bg-success">{{ $kamar->ketersediaan }}</span>
                                        @elseif($kamar->ketersediaan == 'Tidak Tersedia')
                                            <span class="badge bg-danger">{{ $kamar->ketersediaan }}</span>
                                        @elseif($kamar->ketersediaan == 'Sedang Digunakan')
                                            <span class="badge bg-warning">{{ $kamar->ketersediaan }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash-fill"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
