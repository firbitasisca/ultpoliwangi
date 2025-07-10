@extends('layouts.base-client')

@section('title')
    <title>Maklumat Layanan | ULT Poliwangi</title>
@endsection

@section('content')
    <section class="container-fluid section-bg-one">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-1 mb-3 p-3" data-aos="fade-up"
                    data-aos-delay="300">
                    <h1 class="fw-bold">MAKLUMAT LAYANAN</h1>
                    <h4 class="fw-bold text-theme">Politeknik Negeri Banyuwangi &nbsp;
                        <i class="fa-solid fa-location-dot text-danger"></i>
                    </h4>
                    <p class="fw-medium text-justify mt-4">
                        &ensp; <span class="fw-bold">Maklumat Pelayanan Politeknik Negeri Banyuwangi</span> adalah
                        pernyataan tertulis yang memuat
                        komitmen
                        kampus untuk memberikan pelayanan yang berkualitas, cepat, mudah, terjangkau, dan terukur kepada
                        seluruh mahasiswa, dosen, dan staf. Standar pelayanan menjadi pedoman untuk menilai kualitas
                        layanan, termasuk dalam aspek transparansi, akuntabilitas, keterbukaan, dan keadilan.
                        <br><br>
                        &ensp; Civitas akademika berhak mendapatkan layanan yang sesuai dengan standar, seperti kepastian
                        waktu, akses terhadap informasi akademik yang jelas, perlindungan dalam proses administrasi, serta
                        hak untuk mengajukan keluhan jika layanan tidak sesuai harapan. Maklumat ini memastikan kampus
                        melaksanakan prinsip-prinsip tata kelola yang baik, dan seluruh pihak dapat memantau serta mengawasi
                        pelayanan yang diberikan.
                        <br><br>
                        &ensp; Maklumat ini menunjukkan keseriusan Politeknik Negeri Banyuwangi dalam melayani dan mendukung
                        proses
                        belajar mengajar secara profesional dan terbuka.
                    </p>

                    <div class="mt-4">
                        <a target="_blank" href="{{ asset('doc/maklumat-layanan-poliwnagi.pdf') }}"
                            class="btn btn-theme-two px-5 py-3">
                            Lihat & Unduh Maklumat Layanan &nbsp; <i class="fa-regular fa-folder-open"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-2 d-flex" data-aos="zoom-in"
                    data-aos-delay="600">
                    <img src="{{ asset('images/announcement.svg') }}" width="450" class="img-fluid p-5 mx-auto my-auto"
                        alt="">
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
