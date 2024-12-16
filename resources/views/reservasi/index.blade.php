@extends('Layouts.Base')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4 shadow-lg">
            <div class="card-body text-center bg-light">
                <h3 class="fw-bold text-dark">Manajemen Daftar Reservasi</h3>
                <p class="text-muted">Kelola data reservasi hotel Anda dengan mudah dan efisien.</p>
            </div>
        </div>
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white d-flex align-items-center">
                <i class="bi bi-list-ul me-2"></i>
                <h5 class="mb-0">Daftar Reservasi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Tamu</th>
                                <th>Email</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Nama Kamar</th>
                                <th>Ketersediaan</th>
                                <th>Jumlah Tamu</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($reservasis as $reservasi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $reservasi->nama }}</td>
                        <td>{{ $reservasi->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservasi->tanggal_check_in)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservasi->tanggal_check_out)->format('d M Y') }}</td>
                        <td>{{ $reservasi->kamar->nama_kamar }}</td>
                    <td>
                        @if($reservasi->ketersediaan == 'Tersedia')
                            <span class="badge bg-success">Tersedia</span>
                        @elseif($reservasi->ketersediaan == 'Sedang Digunakan')
                            <span class="badge bg-warning text-dark">Sedang Digunakan</span>
                        @else
                            <span class="badge bg-warning">Sedang Digunakan</span>
                        @endif
                    </td>
                    <td>{{ $reservasi->jumlah_tamu }} orang</td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteReservasi(event, {{ $reservasi->id }})">
                    <i class="bi bi-trash-fill"></i> Hapus
                </button>
            </td>
                </tr>
                @empty
            <tr>
                <td colspan="9" class="text-center">Tidak ada data reservasi</td>
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

<style>
    .table {
    white-space: nowrap;
}

</style>

<script>
    // Fungsi untuk menangani penghapusan data
function deleteReservasi(event, id) {
    event.preventDefault();
    
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        // Mengirim permintaan hapus menggunakan Fetch API
        fetch('/reservasi/' + id, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            // Jika berhasil, hapus baris dari tabel
            if (data.success) {
                const row = event.target.closest('tr');
                row.remove();

                // Tampilkan notifikasi di halaman
                const alertDiv = document.createElement('div');
                alertDiv.classList.add('alert', 'alert-success', 'alert-dismissible', 'fade', 'show');
                alertDiv.setAttribute('role', 'alert');
                alertDiv.innerHTML = data.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                
                // Menambahkan notifikasi ke body atau div tertentu
                document.body.prepend(alertDiv);
            } else {
                alert('Gagal menghapus data');
            }
        })
        .catch(error => {
            alert('Terjadi kesalahan');
        });
    }
}
</script>

