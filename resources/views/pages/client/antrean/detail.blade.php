@extends('layouts.base-client')

@section('content')

<section id="antrean" class="container-fluid section-bg-one py-5">
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">

            <!-- Gambar -->
            <div class="col-md-7 mb-4 text-center">
                <img src="{{ asset('images/antrean.png') }}" class="img-fluid" width="300" alt="Ilustrasi Ambil Nomor">
            </div>

            <!-- Kotak Nomor & Info -->
            <div class="col-md-5">
                <div class="card shadow-lg border-0">
                    <div class="card-body px-4 py-5">

                        <h5 class="text-center fw-bold mb-4 text-uppercase">Nomor Antrean Tersedia</h5>

                        <div class="bg-light border rounded py-3 text-center mb-4">
                            <span class="display-1 fw-bold text-dark">{{ $antrean->nomor_antrean }}</span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Anda:</label>
                            <div class="form-control text-dark">{{ $antrean->nama }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal:</label>
                            <div class="form-control text-dark">
                                {{ \Carbon\Carbon::parse($antrean->tanggal)->translatedFormat('d F Y') }}
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                        <a href="{{ route('antrean.download', $antrean->id_antrean) }}" class="btn btn-primary px-4">
                            Download
                        </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
