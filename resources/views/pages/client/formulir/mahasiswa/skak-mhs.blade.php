@extends('layouts.base-client')

@section('title')
<title>Formulir Pengajuan Mahasiswa | ULT Poliwangi</title>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Datedroppper JS --}}
<script src="{{ asset('js-datedropper/datedropper-javascript.js') }}"></script>


@endsection

@section('content')
<section class="container-fluid section-bg-one">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="fw-bold"><i class="fa-solid fa-file-circle-plus"></i>&ensp; FORMULIR PENGAJUAN SURAT KETERANGAN AKTIF KULIAH MAHASISWA</h2>



            </div>
        </div>
    </div>
</section>
@endsection