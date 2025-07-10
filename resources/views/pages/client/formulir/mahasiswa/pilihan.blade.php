@extends('layouts.base-client')

@section('title')
    <title>Unit Layanan Terpadu | ULT Poliwangi</title>
@endsection

@section('content')
   
<section id="formulir" class="container-fluid section-bg-two py-5">
        <div class="container py-5">
            <div class="row d-flex pt-5">
                <h3 class="fw-bold mt-3 text-white text-center">Kategori Permohonan Formulir Mahasiswa</h3>
            </div>

            <div class="row py-5 d-flex justify-content-around">
                <div class="col-12 col-sm-12 col-md-5 col-lg-3 mb-4 card card-hover card-rounded" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="row d-flex justify-content-center">
                        <a href="{{ route('pengajuan.mahasiswa.create') }}">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="card-body">
                                    <div>
                                        <div class="card-body d-flex">
                                            <img src="{{ asset('images/surat-mhs.png') }}" class="img-fluid mx-auto"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <small><a href="{{ route('pengajuan.mahasiswa.create') }}"
                                                    class="tag-menu text-black fw-medium">Permohonan Surat</a></small>
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
                        <a href="{{ route('pengajuan.mahasiswa.create_skak') }}">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="card-body">
                                    <div>
                                        <div class="card-body d-flex">
                                            <img src="{{ asset('images/skak-mhs.png') }}" class="img-fluid mx-auto"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <small><a href="{{ route('pengajuan.mahasiswa.create_skak') }}"
                                                    class="tag-menu text-black fw-medium">Surat Keterangan Aktif Kuliah</a></small>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </a>
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
