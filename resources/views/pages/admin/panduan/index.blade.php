@extends('layouts.base-admin')

@section('title')
    <title>Panduan Pengguna | ULT Poliwangi</title>
@endsection

@php
    function timestampConversion($timestamp)
    {
        $monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
        // Ubah timestamp ke dalam format yang dapat diolah oleh PHP
        $date = strtotime($timestamp);
    
        if ($date === false) {
            return 'Format tanggal tidak valid';
        }
    
        $day = date('j', $date);
        $monthIndex = date('n', $date) - 1; // Kurangi 1 karena indeks bulan dimulai dari 0
        $year = date('Y', $date);
    
        return $day . ' ' . $monthNames[$monthIndex] . ' ' . $year;
    }
    
    function kbToMb($sizeInKB)
    {
        // Konversi ukuran dari KB ke MB
        $sizeInMB = $sizeInKB / 1024;
    
        // Menggunakan format angka dengan 2 desimal
        $formattedSize = number_format($sizeInMB, 2);
    
        return $formattedSize . ' MB';
    }
@endphp

@section('content')
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!--end /div-->
                            <h4 class="page-title">Panduan Pengguna Admin</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Menu Panduan</h4>
                                <div class="files-nav">
                                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                                        <a class="nav-link active" id="files-projects-tab" data-toggle="pill"
                                            href="#files-projects" aria-selected="true">
                                            <i class="em em-file_folder mr-3 text-warning d-inline-block"></i>
                                            <div class="d-inline-block align-self-center">
                                                <h5 class="m-0">Tambah Panduan Baru</h5>
                                            </div>
                                        </a>
                                        <a class="nav-link  align-items-center" id="files-pdf-tab" data-toggle="pill"
                                            href="#files-pdf" aria-selected="false">
                                            <i class="em em-file_folder mr-3 text-warning d-inline-block"></i>
                                            <div class="d-inline-block align-self-center">
                                                <h5 class="m-0">Daftar Panduan</h5>
                                            </div>
                                            <span class="badge badge-success ml-auto">{{ $panduan_count }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->

                    <div class="col-lg-9">
                        <div class="">
                            <div class="tab-content" id="files-tabContent">
                                <div class="tab-pane fade show active" id="files-projects">
                                    {{-- Form Create Panduan --}}
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nama_file">Nama File</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_file') is-invalid @enderror"
                                                                id="nama_file" name="nama_file" value=""
                                                                placeholder="Nama File">
                                                            @error('nama_file')
                                                                <div id="nama_file" class="form-text pb-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="dokumen_file">File Panduan<span
                                                                    class="text-primary">
                                                                    *(Wajib, .pdf only, max
                                                                    20Mb)</span></label>
                                                            <div class="custom-file mb-3">
                                                                <input type="file"
                                                                    class="custom-file-input form-control @error('dokumen_file') is-invalid @enderror"
                                                                    id="dokumen_file" name="dokumen_file"
                                                                    onchange="displayFileName()">
                                                                <label class="custom-file-label" for="dokumen_file"
                                                                    id="fileLabel">Choose
                                                                    file</label>
                                                                @error('dokumen_file')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    id="sa-success">Tambah</button>
                                                <button type="reset" class="btn btn-sm btn-grey"
                                                    id="resetButton">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </div><!--end tab-pane-->

                                <div class="tab-pane fade" id="files-pdf">
                                    <h4 class="mt-0 header-title mb-3">Dokumen Panduan</h4>
                                    <div class="file-box-content">
                                        @if ($panduans->isEmpty())
                                            <span>Berkas Panduan Belum Ditambahkan</span>
                                        @else
                                            @foreach ($panduans as $data)
                                                <div class="file-box" title="{{ $data->nama_file }}">
                                                    <div class="row">
                                                        <div class="col d-flex">
                                                            <a href="{{ route('admin.panduan.destroy', $data->id) }}"
                                                                class="mr-auto my-auto">
                                                                <i
                                                                    class="fa-regular fa-trash-can panduan-text-size text-danger"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col d-flex">
                                                            <a href="{{ Storage::url($data->dokumen_file) }}"
                                                                target="_blank" class="ml-auto my-auto">
                                                                <i
                                                                    class="fa-solid fa-download panduan-text-size text-success"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="text-center py-3">
                                                        <i class="far fa-file-pdf text-primary"></i>
                                                        <h6 class="text-truncate">
                                                            {{ $data->nama_file }}.pdf
                                                        </h6>
                                                        <small
                                                            class="text-muted">{{ timestampConversion($data->created_at) }}
                                                            <br>
                                                            {{ $data->size_file }} MB
                                                        </small>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div><!--end tab-pane-->

                                <div class="tab-pane fade" id="files-hide">
                                    <h4 class="mt-0 header-title mb-3">Hide</h4>
                                </div><!--end tab-pane-->
                            </div> <!--end tab-content-->
                        </div><!--end card-body-->
                    </div><!--end col-->
                </div><!--end row-->

            </div><!-- container -->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
@endsection

@section('script')
    {{-- upload file name --}}
    <script>
        function displayFileName() {
            const input = document.getElementById('dokumen_file');
            const label = document.getElementById('fileLabel');
            const fileName = input.files[0].name;
            label.textContent = fileName;
        }
    </script>

    {{-- reset upload file --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const uploadForm = document.getElementById("uploadForm");
            const resetButton = document.getElementById("resetButton");
            const fileInput = document.getElementById("dokumen_file");
            const fileLabel = document.getElementById("fileLabel");

            resetButton.addEventListener("click", function() {
                // Reset the file input value and label text
                fileInput.value = "";
                fileLabel.textContent = "Choose file";
            });
        });
    </script>
@endsection
