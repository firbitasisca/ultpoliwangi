@extends('layouts.base-client')

@section('title')
    <title>Formulir Survei Kepuasan Pengguna | ULT Poliwangi</title>
@endsection

@section('content')
    <section class="container-fluid section-bg-one">
        <div class="container py-5">
            <div class="row py-3" data-aos="fade-down" data-aos-delay="300">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <h2 class="fw-bold"><i class="fa-regular fa-face-smile-beam"></i>&ensp; SURVEI KEPUASAN PENGGUNA</h2>
                        <small>Terimakasih, Silahkan Salin Kode Berikut untuk Melihat Progress Dokumen.</small>
                    </center>
                </div>
            </div>

            <div class="row d-flex justify-content-center" data-aos="fade-down" data-aos-delay="300">
                <div class="col-12 d-flex mb-4">
                    <button class="btn btn-theme mx-auto" onclick="copyToClipboard()">#{{ $data_pengajuan->kode_tiket }} <i
                            class="far fa-copy"></i></button>
                </div>
                <div class="col-12">
                    <center>
                        <span id="copyAlert"></span>
                    </center>
                </div>
            </div>

            <form action="{{ route('survei.kepuasan.pengguna.create', $data_pengajuan->id) }}" method="POST"
                class="p-3">
                @csrf

                @foreach ($activePertanyaanSurvei as $surveiId => $items)
                    <div class="mb-3 card p-5" data-aos="zoom-in" data-aos-delay="300" data-aos-once="true">
                        <div class="row" data-aos="zoom-in" data-aos-delay="600" data-aos-once="true">
                            <div class="col-12 col-sm-12 col-md-2 col-lg-1 mb-2">
                                <div class="d-flex">
                                    <div class="card-service p-2 mx-auto my-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M2 11C2 5.477 6.477 1 12 1s10 4.477 10 10v5.154C22 17.8 20.58 19 19 19h-3v-8h4a8 8 0 1 0-16 0h4v8H6.063A2 2 0 0 0 8 20.5h1.564c.316-.453.841-.75 1.436-.75h2a1.75 1.75 0 1 1 0 3.5h-2c-.595 0-1.12-.297-1.436-.75H8a4 4 0 0 1-3.986-3.66C2.874 18.463 2 17.446 2 16.155V11Zm4 6v-4H4v3.154c0 .393.37.846 1 .846h1Zm14-4h-2v4h1c.63 0 1-.453 1-.846V13Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-10 col-lg-11 mb-1">
                                <div class="my-auto">
                                    <h3 class="fw-bold question-title pt-1">{{ $items[0]->survei->nama_survei }}</h3>
                                </div>
                            </div>
                        </div>

                        @foreach ($items as $pertanyaan)
                            <div class="row d-flex justify-content-around mt-3" data-aos="fade-up" data-aos-delay="600"
                                data-aos-once="true">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 d-flex">
                                    <h5 for="rating" class="fw-medium my-auto text-justify">
                                        {{ $pertanyaan->pertanyaan->pertanyaan }}
                                    </h5>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                    <div class="mb-2 d-flex">
                                        <div class="rating d-flex justify-content-start py-4 mx-auto">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="px-2">
                                                    <label class="rating-label"
                                                        for="kt_rating_input_{{ $i }}_{{ $surveiId }}_{{ $pertanyaan->id_pertanyaan }}">
                                                        <i class="fa-solid fa-star star-rating question-star"></i>
                                                    </label>

                                                    <input class="rating-input"
                                                        name="question_rating[{{ $surveiId }}][{{ $pertanyaan->id_pertanyaan }}]"
                                                        value="{{ $i }}" type="radio"
                                                        id="kt_rating_input_{{ $i }}_{{ $surveiId }}_{{ $pertanyaan->id_pertanyaan }}"
                                                        data-survei-id="{{ $surveiId }}"
                                                        data-pertanyaan-id="{{ $pertanyaan->id_pertanyaan }}" />
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-end">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-right question-col">
                                        <span
                                            class="reaction-text-content-{{ $surveiId }}-{{ $pertanyaan->id_pertanyaan }}"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <div class="card p-4" data-aos="zoom-in" data-aos-delay="300" data-aos-once="true">
                    <div class="row" data-aos="fade-up" data-aos-delay="600" data-aos-once="true">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold mb-3">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="Masukkan Email Anda" value="{{ $data_pengajuan->email }}">
                            @error('email')
                                <div id="email" class="form-text pb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold mb-3">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                id="nama" placeholder="Nama Lengkap Anda" value="{{ $data_pengajuan->nama_pemohon }}">
                            @error('nama')
                                <div id="nama" class="form-text pb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="saran" class="form-label fw-bold mb-3">Saran</label>
                            <textarea class="form-control @error('saran') is-invalid @enderror" name="saran" id="saran"
                                placeholder="Berikan saran terbaik untuk kami" rows="5"></textarea>
                            @error('saran')
                                <div id="saran" class="form-text pb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-start py-4">
                    <button type="submit" class="btn btn-theme">Submit Survei</button>
                </div>
            </form>

        </div>
    </section>
@endsection

@section('script')
    {{-- AOS initiate --}}
    <script>
        AOS.init();
    </script>

    {{-- Copy Clipboard --}}
    <script>
        function copyToClipboard() {
            /* Teks yang ingin Anda salin */
            var textToCopy = @json($data_pengajuan->kode_tiket);

            /* Buat elemen textarea sementara untuk menyalin teks */
            var tempTextArea = document.createElement("textarea");
            tempTextArea.value = textToCopy;

            /* Append elemen textarea sementara ke dokumen */
            document.body.appendChild(tempTextArea);

            /* Select teks di dalam elemen textarea sementara */
            tempTextArea.select();
            tempTextArea.setSelectionRange(0, 99999); /* Untuk perangkat mobile */

            /* Salin teks di dalam elemen textarea sementara ke clipboard */
            document.execCommand("copy");

            /* Hapus elemen textarea sementara dari dokumen */
            document.body.removeChild(tempTextArea);

            /* Pesan notifikasi bahwa teks telah berhasil disalin (Anda dapat menyesuaikan bagian ini) */
            const copyAlert = document.getElementById("copyAlert");
            copyAlert.textContent = "✔️ Kode Tiket Berhasil Disalin!";
            setTimeout(function() {
                copyAlert.textContent = "";
            }, 2000); // Menghilangkan pesan setelah 2 detik
        }
    </script>

    {{-- Star Rating Script --}}
    <script>
        const ratingInputs = document.querySelectorAll('.rating-input');

        ratingInputs.forEach(ratingInput => {
            ratingInput.addEventListener('change', () => {
                const currentRating = ratingInput.value;
                const starLabels = ratingInput.parentNode.parentNode.querySelectorAll('.rating-label i');

                starLabels.forEach((starLabel, index) => {
                    if (index < currentRating) {
                        starLabel.classList.add('checked');
                    } else {
                        starLabel.classList.remove('checked');
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ratingInputs = document.querySelectorAll(".rating-input");

            ratingInputs.forEach(input => {
                input.addEventListener("change", function() {
                    const currentRating = this.value;
                    const starLabels = this.parentNode.parentNode.querySelectorAll(
                        '.rating-label i');

                    starLabels.forEach((starLabel, index) => {
                        if (index < currentRating) {
                            starLabel.classList.add('checked');
                        } else {
                            starLabel.classList.remove('checked');
                        }
                    });

                    const surveiId = this.getAttribute("data-survei-id");
                    const pertanyaanId = this.getAttribute("data-pertanyaan-id");
                    let reaction = "";

                    if (currentRating === "1") {
                        reaction = "Sangat Buruk";
                    } else if (currentRating === "2") {
                        reaction = "Buruk";
                    } else if (currentRating === "3") {
                        reaction = "Cukup";
                    } else if (currentRating === "4") {
                        reaction = "Bagus";
                    } else if (currentRating === "5") {
                        reaction = "Sangat Bagus";
                    }

                    const reactionTextContent = document.querySelector(
                        `.reaction-text-content-${surveiId}-${pertanyaanId}`
                    );

                    if (reactionTextContent) {
                        reactionTextContent.textContent = reaction;
                    }
                });
            });
        });
    </script>
@endsection
