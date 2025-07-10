@extends('layouts.base-client')

@section('title')
<title>Tracking Pengajuan | ULT Poliwangi</title>
@endsection

@section('css')
@php
function dateConversion($date)
{
$month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$slug = explode('-', $date);
return $slug[2] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[0];
}

function tambahEstimasiHariKerja($tanggal, $estimasiHari)
{
$tanggalObj = new DateTime($tanggal);

for ($i = 1; $i <= $estimasiHari; $i++) {
    $tanggalObj->modify('+1 day');

    // Loop untuk mengabaikan hari Sabtu dan Minggu
    while ($tanggalObj->format('N') >= 6) {
    $tanggalObj->modify('+1 day');
    }
    }

    return $tanggalObj->format('Y-m-d');
    }
    @endphp
    @endsection

    @section('content')
    <section class="container-fluid section-bg-one">
        <div class="container py-5">
            <div class="row pt-5 pb-4" data-aos="fade-down" data-aos-delay="300">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <h2 class="fw-bold"><i class="fa-solid fa-file-shield"></i>&ensp; DETAIL PELACAKAN DOKUMEN PENGAJUAN
                    </h2>
                </div>
            </div>

            <div class="row d-flex justify-content-around">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="card">
                        <div class="card-header fw-medium text-center">
                            Detail Informasi Dokumen Pengajuan
                        </div>
                        <div class="card-body">

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            Detail Profil Pemohon
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{-- Detail Profil Pemohon --}}
                                            <h5 class="card-title">Nama Pemohon</h5>
                                            <p class="card-text">{{ $pengajuan->nama_pemohon }}</p>

                                            <h5 class="card-title">NIM atau Nomor KTP</h5>
                                            <p class="card-text">{{ $pengajuan->nomor_identitas }}</p>

                                            <h5 class="card-title">Program Studi</h5>
                                            <p class="card-text">
                                                @if ($pengajuan->id_prodi == null)
                                                Tidak Ada Prodi
                                                @else
                                                {{ $pengajuan->prodi->nama_prodi }}
                                                @endif
                                            </p>

                                            <h5 class="card-title">Email</h5>
                                            <p class="card-text">{{ $pengajuan->email }}</p>

                                            <h5 class="card-title">No Telepon</h5>
                                            <p class="card-text">{{ $pengajuan->nomor_telepon }}</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            Detail Permohonan
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{-- Detail Permohonan --}}
                                            <h5 class="card-title">Jenis Permohonan</h5>
                                            <p class="card-text">{{ $pengajuan->jenis_permohonan }}</p>

                                            <h5 class="card-title">Layanan</h5>
                                            <p class="card-text">{{ $pengajuan->layanan->nama_layanan }}</p>

                                            <h5 class="card-title">Divisi Penanggungjawab</h5>
                                            <p class="card-text">{{ $pengajuan->layanan->divisi->nama_divisi }}</p>

                                            <h5 class="card-title">Tanggal Permohonan</h5>
                                            <p class="card-text">{{ dateConversion($pengajuan->tanggal_permohonan) }}</p>

                                            <h5 class="card-title">Pengambilan Dokumen</h5>
                                            <p class="card-text">
                                                {{ dateConversion(tambahEstimasiHariKerja($pengajuan->tanggal_permohonan, $pengajuan->layanan->estimasi_layanan)) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4" data-aos="zoom-in" data-aos-delay="900">
                    <div class="card p-4 d-flex">
                        <div class="card-body">
                            <div class="slimscroll hospital-dash-activity">
                                <div class="activity">

                                    @if ($document_submitted->isNotEmpty())
                                    <i class="mdi-set fa-solid fa-file-lines icon-purple"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Formulir Pengajuan Berhasil Terkirim</h6>
                                            </div>
                                            @foreach ($document_submitted as $data)
                                            <h6 class="text-muted mt-3">
                                                {{ $data->pesan }}
                                            </h6>
                                            <div>
                                                <span
                                                    class="badge badge-soft-secondary">{{ dateConversion($data->tanggal) }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    @if ($pengajuan->submission_confirmed == 'No')
                                    <i class="mdi-set fa-solid fa-spinner icon-info"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Dokumen Masih Dalam Tahap Persetujuan</h6>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    @elseif ($pengajuan->submission_confirmed == 'Decline')
                                    <i class="mdi-set fa-solid fa-ban text-danger"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Dokumen Ditolak oleh Pihak ULT</h6>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    @elseif ($pengajuan->submission_confirmed == 'Accept')
                                    <i class="mdi-set fa-solid fa-thumbs-up icon-success"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Dokumen Telah Disetujui</h6>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($document_on_progress->isNotEmpty())
                                    <i class="mdi-set fa-solid fa-file-arrow-up icon-warning"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Dokumen Diproses</h6>
                                            </div>
                                            @foreach ($document_on_progress as $data)
                                            <h6 class="text-muted mt-3">
                                                {{ $data->pesan }}
                                            </h6>
                                            <div>
                                                <span
                                                    class="badge badge-soft-secondary">{{ dateConversion($data->tanggal) }}</span>

                                                @if (!$data->file_dokumen == null || !$data->file_dokumen == '')
                                                <a href="{{url($data->file_dokumen) }}"
                                                    class="badge badge-soft-secondary tag-menu"
                                                    target="_blank">Lihat
                                                    Dokumen</a>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    @if ($document_done->isNotEmpty())
                                    <i class="mdi-set fa-solid fa-file-circle-check icon-success"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Dokumen Selesai</h6>
                                            </div>
                                            @foreach ($document_done as $data)
                                            <h6 class="text-muted mt-3">
                                                {{ $data->pesan }}
                                            </h6>
                                            <div>
                                                <span
                                                    class="badge badge-soft-secondary">{{ dateConversion($data->tanggal) }}</span>

                                                @if (!$data->file_dokumen == null || !$data->file_dokumen == '')
                                                <a href="{{ url($data->file_dokumen) }}"
                                                    class="badge badge-soft-secondary tag-menu"
                                                    target="_blank">Lihat
                                                    Dokumen</a>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    @if ($pengajuan->submission_confirmed == 'Decline')
                                    <i class="mdi-set fa-solid fa-square-xmark icon-info"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Pengajuan Dokumen Dibatalkan</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    @if ($document_done->isNotEmpty())
                                    <i class="mdi-set fa-solid fa-square-check icon-primary"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Dokumen Siap Diambil</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <i class="mdi-set fa-solid fa-square-xmark icon-info"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="m-0 fw-bold">Dokumen Belum Siap Diambil</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif

                                </div><!--end activity-->
                            </div>
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
    @endsection