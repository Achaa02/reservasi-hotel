<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>

<!-- Banner -->
<div class="banner">
    <h1>Selamat Datang di Hotel Santika</h1>
</div>

<!-- Galeri Hotel -->
<div class="container my-5">
    <h2 class="text-center mb-4">Galeri Hotel</h2>
    <div class="row gallery">
        <div class="col-md-4 mb-3">
            <img src="{{ asset('foto/kamar.jpg') }}" alt="Kamar Hotel">
        </div>
        <div class="col-md-4 mb-3">
            <img src="{{ asset('foto/kolam.jpeg') }}" alt="Kolam Renang">
        </div>
        <div class="col-md-4 mb-3">
            <img src="{{ asset('foto/loby.jpg') }}" alt="Lobi Hotel">
        </div>
    </div>
</div>
<!-- Formulir Reservasi -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-container">
                <h2 class="text-center mb-4">Formulir Reservasi</h2>
                <!-- Display success message if exists -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                <form method="POST" action="{{ route('reservasi.store') }}">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>

                    <!-- Tanggal Check-in -->
                    <div class="mb-3">
                        <label for="kamars_id" class="form-label">Tanggal check in</label>
                        <input type="date" class="form-control" id="tanggal_check_in" name="tanggal_check_in" required>
                    </div>

                    <!-- Tanggal Check-out -->
                    <div class="mb-3">
                        <label for="kamars_id" class="form-label">Tanggal check out</label>
                        <input type="date" class="form-control" id="tanggal_check_out" name="tanggal_check_out" required>
                    </div>

                    <!-- Pilih Kamar -->
                    <div class="mb-4">
                        <select class="form-control" id="kamars_id" name="kamars_id" required onchange="updateHarga()">
                            <option value="" selected disabled>Pilih Kamar</option>
                            @foreach ($kamars as $kamar)
                                <option value="{{ $kamar->id }}" data-harga="{{ $kamar->harga }}">{{ $kamar->nama_kamar }} ({{ $kamar->kapasitas }}) - {{ $kamar->ketersediaan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Harga Kamar -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="harga" name="harga" required placeholder="Harga Kamar" readonly>
                    </div>

                    <!-- Jumlah Tamu -->
                    <div class="mb-3">
                        <input type="number" class="form-control" id="jumlah_tamu" name="jumlah_tamu" placeholder="Jumlah Tamu" required>
                    </div>

                    <!-- Permintaan Khusus -->
                    <div class="mb-3">
                        <label for="note" class="form-label">Permintaan Khusus</label>
                        <textarea class="form-control" id="note" name="note" rows="4" placeholder="Permintaan tambahan (opsional)"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" id="submit-btn" class="btn btn-primary btn-lg">Kirim Reservasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateHarga() {
        var selectedOption = document.getElementById('kamars_id').selectedOptions[0];
        var harga = selectedOption.getAttribute('data-harga');
        var ketersediaan = selectedOption.getAttribute('data-ketersediaan'); // Ambil status ketersediaan

        document.getElementById('harga').value = harga;

        // Cek ketersediaan kamar
        if (ketersediaan === 'Sedang Digunakan') {
            // Jika kamar sedang digunakan, tampilkan peringatan dan nonaktifkan tombol kirim
            document.getElementById('kamar-error').style.display = 'block';
            document.getElementById('submit-btn').disabled = true;
        } else {
            // Jika kamar tersedia, sembunyikan peringatan dan aktifkan tombol kirim
            document.getElementById('kamar-error').style.display = 'none';
            document.getElementById('submit-btn').disabled = false;
        }
    }
</script>

<div id="kamar-error" class="alert alert-danger" style="display: none;">
    Kamar ini sedang digunakan. Pilih kamar lain.
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
