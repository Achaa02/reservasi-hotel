<!--begin::Sidebar-->
<aside class="app-sidebar bg-dark shadow-lg" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand p-3 d-flex align-items-center bg-dark text-white shadow-sm">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link d-flex align-items-center text-decoration-none text-white">
            <!--begin::Brand Image-->
            <img src="{{ asset('foto/hotel.png') }}" alt="Hotel Logo" style="width: 40px;">
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-bold fs-4 text-uppercase">Hotel</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper mt-4">
        <nav>
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" role="menu" data-accordion="false">
                <!-- Menu Header -->
                <li class="nav-header text-uppercase text-light fs-6 fw-semibold mb-2 px-3">Navigation</li>

                <!-- Pelanggan -->
                <li class="nav-item">
                    <a href="{{ url('pelanggan.pelanggan') }}" class="nav-link d-flex align-items-center text-light py-3 px-4 rounded hover-bg-light">
                        <i class="fa-solid fa-table me-3 fs-5 text-warning"></i>
                        <p class="m-0">Pelanggan</p>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="dropdown-divider bg-light opacity-50 my-2 mx-3">

                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center text-light py-3 px-4 rounded hover-bg-light" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars me-3 fs-5 text-success"></i>
                        <p class="m-0">Menu</p>
                    </a>
                    <ul class="dropdown-menu custom-dropdown shadow border-0 mt-2">
                        <!-- Data Kamar -->
                        <li>
                            <a href="{{ url('kamar.index') }}" class="dropdown-item d-flex align-items-center text-white py-2">
                                <i class="fa-solid fa-bed text-primary me-2 fs-5"></i> Data Kamar
                            </a>
                        </li>
                        <!-- Data Reservasi -->
                        <li>
                            <a href="{{ url('reservasi.index') }}" class="dropdown-item d-flex align-items-center text-white py-2">
                                <i class="fa-solid fa-calendar-check text-danger me-2 fs-5"></i> Data Reservasi
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->

<style>
/* Dropdown style */
.custom-dropdown {
    background: linear-gradient(145deg, #1c1c1c, #2a2a2a); /* Gradien untuk dropdown */
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan lembut */
    overflow: hidden;
    border: 1px solid #333; /* Tambahkan border untuk estetika */
}
.custom-dropdown .dropdown-item {
    padding: 12px 20px;
    color: #ddd; /* Warna teks default */
    display: flex;
    align-items: center;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.custom-dropdown .dropdown-item:hover {
    background: linear-gradient(145deg, #444, #555); /* Gradien saat hover */
    color: #fff; /* Teks menjadi putih */
    transform: translateX(5px); /* Efek geser kecil */
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2); /* Bayangan kecil */
}

/* Ikon dalam dropdown */
.custom-dropdown .dropdown-item i {
    font-size: 1.5rem;
    margin-right: 10px;
    transition: transform 0.3s ease;
}
.custom-dropdown .dropdown-item:hover i {
    transform: scale(1.2); /* Membesar sedikit saat hover */
}

/* Divider */
.dropdown-divider {
    height: 1px;
    margin: 8px 15px;
    background: rgba(255, 255, 255, 0.2);
}

</style>
