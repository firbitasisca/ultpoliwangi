@extends('layouts.base-client')

@section('title')
    <title>Unit Layanan Terpadu | ULT Poliwangi</title>
@endsection

@section('content')
    <section class="container-fluid section-bg-one py-5">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-1 mb-3 p-3" data-aos="fade-up"
                    data-aos-delay="300">
                    <h1 class="fw-bold">ULT POLIWANGI</h1>
                    <p class="fw-medium text-justify mt-4">
                        Selamat datang di Aplikasi Unit Layanan Terpadu!

                        Aplikasi ini dirancang untuk memberikan Anda pengalaman yang lebih baik dalam mengajukan dokumen dan
                        melacak kemajuan pengajuan Anda. Kami mengerti bahwa mengajukan dokumen bisa menjadi proses yang
                        kompleks, oleh karena itu kami hadir untuk membantu Anda melalui setiap langkahnya.
                    </p>

                    <div class="mt-5">
                        <a href="#lacak_dokumen" class="btn btn-theme-two px-5 py-3">
                            Lacak Dokumen Saya
                        </a>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-2 d-flex" data-aos="zoom-in"
                    data-aos-delay="600">
                    <img src="{{ asset('images/landing-page.svg') }}" width="450" class="img-fluid p-5 mx-auto my-auto"
                        alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="formulir" class="container-fluid section-bg-two py-5">
        <div class="container py-5">
            <div class="row d-flex pt-5">
                <h3 class="fw-bold mt-3 text-white text-center">Kategori Permohonan Formulir</h3>
            </div>

            <div class="row py-5 d-flex justify-content-around">
                <div class="col-12 col-sm-12 col-md-5 col-lg-3 mb-4 card card-hover card-rounded" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="row d-flex justify-content-center">
                        <a href="{{ route('pengajuan.dosen.page') }}">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="card-body">
                                    <div>
                                        <div class="card-body d-flex">
                                            <img src="{{ asset('images/pemohon-dosen.png') }}" class="img-fluid mx-auto"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <small><a href="{{ route('pengajuan.dosen.page') }}"
                                                    class="tag-menu text-black fw-medium">Dosen</a></small>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-5 col-lg-3 mb-4 card card-hover card-rounded" data-aos="fade-up"
                    data-aos-delay="600">
                    <div class="row d-flex justify-content-center">
                        <a href="{{ route('pages.client.formulir.mahasiswa.pilihan') }}">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="card-body">
                                    <div>
                                        <div class="card-body d-flex">
                                            <img src="{{ asset('images/pemohon-mahasiswa.png') }}" class="img-fluid mx-auto"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <small>
                                                <a href="/mahasiswa/pilihan" class="tag-menu text-black fw-medium">Mahasiswa</a></small>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-5 col-lg-3 mb-4 card card-hover card-rounded" data-aos="fade-up"
                    data-aos-delay="900">
                    <div class="row d-flex justify-content-center">
                        <a href="{{ route('pengajuan.umum.page') }}">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="card-body">
                                    <div>
                                        <div class="card-body d-flex">
                                            <img src="{{ asset('images/pemohon-umum.png') }}" class="img-fluid mx-auto"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <small><a href="{{ route('pengajuan.umum.page') }}"
                                                    class="tag-menu text-black fw-medium">Umum</a></small>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="lacak_dokumen" class="container-fluid section-bg-one py-5">
        <div class="row d-flex pt-5">
            <h3 class="fw-bold mt-3 text-center">Lacak Dokumen</h3>
        </div>

        <div class="container py-5">
            <div class="row py-5 d-flex justify-content-around">
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 mb-5" data-aos="zoom-in" data-aos-delay="600">
                    <div class="d-flex">
                        <img src="{{ asset('images/tracking-ilustrator.svg') }}" class="img-fluid mx-auto my-auto"
                            width="300" alt="">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 mb-5 mt-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-rounded card-hover shadow">
                        <div class="card-body">

                            <form action="{{ route('tracking.pengajuan.search') }}" method="GET" class="p-3">
                                @csrf
                                <label for="kode_tiket" class="form-label fw-bold mb-3">Lacak Dokumen Sekarang !</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="kode_tiket" id="kode_tiket"
                                        placeholder="Masukkan Kode Tiket" required>
                                    <button class="btn btn-theme-paste" type="button" id="pasteButton">Paste</button>
                                </div>

                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-theme">Lacak Status Dokumen</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- coba firbita -->
    <section id="antrean" class="container-fluid section-bg-one py-5">
    <div class="row d-flex pt-5">
        <h3 class="fw-bold mt-3 text-center">Ambil Nomor Antrean</h3>
    </div>

    <div class="container py-5">
        <div class="row py-5 d-flex justify-content-around">
            <!-- Gambar -->
            <div class="col-12 col-sm-12 col-md-6 col-lg-5 mb-5" data-aos="zoom-in" data-aos-delay="600">
                <div class="d-flex">
                    <img src="{{ asset('images/antrean.png') }}" class="img-fluid mx-auto my-auto"
                        width="300" alt="Ilustrasi Ambil Nomor">
                </div>
            </div>

            <!-- Form Ambil Nomor -->
            <div class="col-12 col-sm-12 col-md-6 col-lg-5 mb-5 mt-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-rounded card-hover shadow">
                    <div class="card-body">
                        <form action="{{ route('antrean.ambil') }}" method="POST" class="p-3">
                            @csrf

                            <!-- Nomor Antrean -->
                            <div class="text-center mb-4">
                            <div class="text-white py-2 rounded-top" style="background-color: #0d47a1;">
                                <strong>Nomor Antrean Tersedia</strong>
                            </div>
                            <div class="border border-top-0 rounded-bottom py-4">
                                <span class="display-4 fw-bold">
                                    {{ $nomorTerakhir + 1 }}
                                </span>
                                <input type="hidden" name="nomor_antrean" id="nomor_antrean" value="{{ $nomorTerakhir + 1 }}" required>
                            </div>
                            </div>
                            <!-- Input Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-bold">Masukkan Nama Anda</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
                            </div>

                            <!-- Tombol -->
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="#" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Ambil</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <section id="tentang_kami" class="container-fluid section-bg-two py-5">
        <div class="container py-5">
            <div class="row py-5 d-flex justify-content-around">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-5 d-flex" data-aos="zoom-in" data-aos-delay="600">
                    <img src="{{ asset('images/logo-title-poliwangi.png') }}" class="img-fluid mx-auto my-auto"
                        width="300" alt="">
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <h2 class="fw-bold text-white">Tentang Kami</h2>

                        <p class="text-justify mt-4 text-white">
                            Politeknik Negeri Banyuwangi adalah perguruan tinggi negeri yang terletak di Kabupaten
                            Banyuwangi, Jawa Timur, Indonesia. Berdiri sejak tahun 2014, politeknik ini menawarkan program
                            studi vokasi dan terapan yang berkualitas, sesuai kebutuhan industri dan pasar kerja. Dengan
                            fasilitas modern, termasuk laboratorium dan perpustakaan, politeknik ini berkomitmen untuk
                            menghasilkan tenaga terampil dan profesional yang berdaya saing tinggi. Melalui kemitraan aktif
                            dengan industri, mereka memberikan kesempatan magang dan penempatan kerja bagi mahasiswa.
                            Politeknik Negeri Banyuwangi memiliki visi menjadi politeknik unggulan yang berorientasi pada
                            keunggulan riset, pengabdian pada masyarakat, dan kewirausahaan.
                        </p>

                        <div class="mt-4">
                            <a href="https://poliwangi.ac.id/" target="_blank"
                                class="btn btn-theme-inverse-two px-3 py-3">
                                Lihat Selengkapnya &nbsp; <i class="fa-solid fa-circle-info"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    {{-- AOS initiate --}}
    <script>
        AOS.init();
    </script>

    <script>
        document.getElementById('pasteButton').addEventListener('click', function() {
            navigator.clipboard.readText().then(function(clipboardText) {
                document.getElementById('kode_tiket').value = clipboardText;
            });
        });
    </script>
@endsection
