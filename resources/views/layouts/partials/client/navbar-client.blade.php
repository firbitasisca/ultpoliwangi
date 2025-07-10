<div class="container">
    <nav class="navbar navbar-expand-lg fixed-top navbar-theme py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.page') }}#">
                <img src="{{ asset('images/logo-title-poliwangi.png') }}" class="img-fluid" width="45" alt="">
                &nbsp;
                <img src="{{ asset('images/logo-poliwangi.png') }}" class="img-fluid" width="94" alt="">
            </a>

            {{-- button responsive --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex">
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link fw-regular navbar-text-hover" href="{{ route('home.page') }}#">Beranda</a>
                    </li>
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link fw-regular navbar-text-hover"
                            href="{{ route('home.page') }}#formulir">Formulir</a>
                    </li>
                    @if (session('nim') !== null)
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link fw-regular navbar-text-hover"
                            href="{{ url('tracking-progress-pengajuan-mahasiswa') }}#lacak_dokumen">Lacak
                            Dokumen</a>
                    </li>
                    @else
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link fw-regular navbar-text-hover"
                            href="{{ route('home.page') }}#lacak_dokumen">Lacak
                            Dokumen</a>
                    </li>
                    @endif
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link fw-regular navbar-text-hover"
                            href="{{ route('home.page') }}#antrean">Antrean</a>
                    </li>
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link fw-regular navbar-text-hover"
                            href="{{ route('maklumat.pelayanan.poliwangi') }}#lacak_dokumen">Maklumat Layanan</a>
                    </li>
                    {{-- SIPPN Menpan --}}
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link fw-regular navbar-text-hover" href="https://sippn.menpan.go.id/"
                            target="_blank">SIPPN</a>
                    </li>
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link fw-regular navbar-text-hover"
                            href="{{ route('home.page') }}#tentang_kami">Tentang Kami</a>
                    </li>
                    <li class="nav-item my-auto px-2">
                        @auth
                        <a href="{{ route('admin.dashboard.page') }}" class="btn btn-theme px-3 py-2">
                            Dashboard
                        </a>
                        @endauth

                        @guest
                        <a href="{{ route('home.page') }}#formulir" class="btn btn-theme-permohonan px-3 py-2">
                            Ajukan Permohonan
                        </a>
                        @endguest
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>

<script>
    $(document).ready(function() {
        // Deteksi scroll saat halaman dimuat
        if ($(this).scrollTop() > 100) {
            $('.navbar-theme').addClass('scrolled');
        } else {
            $('.navbar-theme').removeClass('scrolled');
        }

        // Deteksi scroll saat halaman di-scroll
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.navbar-theme').addClass('scrolled');
            } else {
                $('.navbar-theme').removeClass('scrolled');
            }
        });
    });
</script>