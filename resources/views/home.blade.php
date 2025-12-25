<x-app-layout title="Home - TEFA SMK Muhammadiyah Pakem">

    {{-- SECTION 1: HERO SLIDER --}}
    <header id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        {{-- Indikator (Titik-titik di bawah) - Opsional biar keren --}}
        <div class="carousel-indicators">
            @foreach ($hero as $index => $slide)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="true"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach ($hero as $index => $slide)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="5000">
                    <img src="{{ asset($slide['image']) }}" class="d-block w-100 hero-img" alt="{{ $slide['title'] }}">

                    {{-- Menghapus bg-dark dan bg-opacity, ganti ke text-start --}}
                    <div class="carousel-caption d-none d-md-block text-start hero-caption-clean">
                        <div class="container"> {{-- Container agar teks sejajar dengan konten navbar/body --}}
                            <h1 class="display-3 fw-bold animated-text">{{ $slide['title'] }}</h1>
                            <p class="fs-5 animated-text delay-1 mb-4">{{ $slide['subtitle'] }}</p>

                            {{-- Ganti btn-warning ke btn-primary atau class custom --}}
                            <a href="#"
                                class="btn btn-tefa-primary btn-lg fw-bold px-4 py-4 animated-text delay-2">
                                Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </header>

    {{-- SECTION 2: PROFIL SINGKAT --}}
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h6 class="txt-primary fw-bold text-uppercase ls-wide">Siapa Kami</h6>
                    <h2 class="fw-bold mb-4 display-6">{{ $profil['title'] }}</h2>
                    <p class="text-muted lead mb-4">{{ $profil['description'] }}</p>
                    <a href="#" class="btn bt-outline-primary rounded-pill px-4">Baca Profil Lengkap <i
                            class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/local/gedung.jpg') }}" class="img-fluid rounded-4 shadow-lg w-100"
                        alt="Profil TEFA">
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION: KATEGORI LAYANAN --}}
    <section class="py-5 bg-light">
        <div class="container py-lg-4">

            {{-- Section Title --}}
            <div class="text-center mb-5 mw-800 mx-auto">
                <h6 class="text-secondary fw-bold text-uppercase ls-wide">Lingkup Layanan</h6>
                <h2 class="fw-bold display-6 mb-3">Solusi Komprehensif TEFA</h2>
                <p class="text-muted">
                    Kami menyediakan produk teknologi tepat guna dan layanan jasa profesional yang dikerjakan oleh siswa
                    berkompeten dengan standar industri.
                </p>
            </div>

            {{-- Grid Cards --}}
            <div class="row g-4">

                {{-- Card 1: Hardware --}}
                <div class="col-md-4">
                    <div class="card-category h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3">
                            <i class="bi bi-cpu fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Hardware & IoT</h4>
                        <p class="text-muted mb-0">
                            Inovasi produk elektronik seperti Smart Lock RFID, Running Text, dan alat otomasi berbasis
                            mikrokontroler terkini.
                        </p>
                    </div>
                </div>

                {{-- Card 2: Creative & Design --}}
                <div class="col-md-4">
                    <div class="card-category h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3">
                            <i class="bi bi-vector-pen fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Desain & Kreatif</h4>
                        <p class="text-muted mb-0">
                            Layanan profesional untuk desain arsitektur bangunan, desain grafis, hingga pengembangan
                            solusi perangkat lunak.
                        </p>
                    </div>
                </div>

                {{-- Card 3: Service --}}
                <div class="col-md-4">
                    <div class="card-category h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3">
                            <i class="bi bi-tools fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Service & Repair</h4>
                        <p class="text-muted mb-0">
                            Pusat perbaikan terpercaya untuk Motor dan Mobil dengan teknisi terlatih dan bergaransi
                            layanan prima.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- SECTION 3: PRODUK & JASA (TABBED) --}}
    {{-- Menggunakan Alpine.js (x-data) untuk handle Tab --}}
    <section class="py-5 bg-light" x-data="{ activeTab: 'produk' }">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold txt-primary ">Produk & Layanan Kami</h2>
                <p class="text-muted">Karya terbaik siswa dan layanan profesional untuk masyarakat</p>
            </div>

            <div class="row g-4" x-data="{ activeTab: 'produk' }">

                {{-- Tombol Tab --}}
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button @click="activeTab = 'produk'"
                        :class="activeTab === 'produk' ? 'bt-primary' : 'bt-outline-primary'"
                        class="btn px-4 rounded-pill">
                        <i class="bi bi-box-seam me-1"></i> Produk
                    </button>
                    <button @click="activeTab = 'jasa'"
                        :class="activeTab === 'jasa' ? 'bt-primary' : 'bt-outline-primary'"
                        class="btn px-4 rounded-pill">
                        <i class="bi bi-tools me-1"></i> Jasa & Servis
                    </button>
                </div>


                {{-- LOOP PRODUK --}}
                @foreach ($produk as $item)
                    {{-- Gunakan x-show langsung di sini --}}
                    <div class="col-md-3 col-sm-6" x-show="activeTab === 'produk'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100">

                        {{-- Panggil Component --}}
                        <x-card-product :item="$item" type="produk" />

                    </div>
                @endforeach

                {{-- LOOP JASA --}}
                @foreach ($jasa as $item)
                    <div class="col-md-3 col-sm-6" x-show="activeTab === 'jasa'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100">

                        {{-- Panggil Component --}}
                        <x-card-product :item="$item" type="jasa" />

                    </div>
                @endforeach

            </div>

            <div class="text-end mt-3">
                <a href="#" class="bt-link-primary text-decoration-none fw-bold">Lihat Semua Produk dan Jasa <i
                        class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </section>

    {{-- SECTION 4: BERITA TERKINI --}}
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold txt-primary ">Berita Terkini</h2>
                <p class="text-muted">Berita terkini tentang SMK Muhammadyah Pakem</p>
            </div>

            <div class="row g-4">
                @foreach ($berita as $news)
                    <div class="col-md-4">
                        <a href="#" class="card h-100 border-0 shadow-sm">
                            <img src="{{ $news['img'] }}" class="card-img-top rounded-top-3 news-image"
                                alt="...">
                            <div class="card-body">
                                <small class="text-muted"><i class="bi bi-calendar-event"></i>
                                    {{ $news['tanggal'] }}</small>
                                <h5 class="card-title fw-bold mt-2 text-truncate">{{ $news['judul'] }}</h5>
                                <p class="card-text text-muted">{{ $news['excerpt'] }}</p>

                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-end mt-3">
                <a href="#" class="bt-link-primary text-decoration-none fw-bold">Lihat Semua Berita <i
                        class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </section>

    {{-- SECTION 5: GALLERY --}}
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold txt-primary ">Gallery Kegiatan</h2>
                <p class="text-muted">Gallery kegiatan TEFA MUPA</p>
            </div>
            <div class="row g-2">
                @foreach ($gallery as $foto)
                    <div class="col-md-3 col-6">
                        <div class="ratio ratio-1x1">
                            <img src="{{ $foto }}" class="img-fluid rounded-3  shadow-sm " alt="Gallery">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-end mt-3">
                <a href="#" class="bt-link-primary text-decoration-none fw-bold">Lihat Semua Gallery <i
                        class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </section>

    @push('morejs')
        <script></script>
    @endpush
</x-app-layout>

{{-- Script tambahan khusus halaman Home untuk efek/style --}}
<style>
    .hover-up {
        transition: transform 0.3s;
    }

    .hover-up:hover {
        transform: translateY(-5px);
    }

    .object-fit-cover {
        object-fit: cover;
    }

    /* Animasi Simpel saat ganti Tab */
    .animate-fade {
        animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
