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
                <h2 class="fw-bold"><i class="fa-solid fa-file-circle-plus"></i>&ensp; FORMULIR PENGAJUAN SURAT KETERANGAN AKTIF KULIAH</h2>

                <div>
                    <form class="mt-5" action="{{ route('pengajuan.mahasiswa.store_skak') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                    <input type="text"
                                        class="form-control @error('nama_pemohon') is-invalid @enderror"
                                        id="nama_pemohon"
                                        name="nama_pemohon"
                                        value="{{ old('nama_pemohon', session('nama') ?? 'Tidak ada data nama, silahkan login terlebih dahulu') }}"
                                        required>
                                </div>
                                @error('nama_pemohon')
                                <div id="nama_pemohon" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="nomor_identitas" class="form-label">NIM</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                                    <input type="text"
                                        class="form-control @error('nomor_identitas') is-invalid @enderror"
                                        id="nomor_identitas"
                                        name="nomor_identitas"
                                        value="{{ old('nomor_identitas', session('nim') ?? 'Tidak ada data NIM, silahkan login terlebih dahulu') }}"
                                        required>
                                </div>
                                @error('nomor_identitas')
                                <div id="nomor_identitas" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" placeholder="Alamat Email Pemohon" value="{{session('email')}}" required>
                                </div>
                                @error('email')
                                <div id="email" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                    <input type="number" class="form-control @error('nomor_telepon') is-invalid @enderror"
                                        id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon / Nomor WA" required>
                                </div>
                                @error('nomor_telepon')
                                <div id="nomor_telepon" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="semester" class="form-label">Semester</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                    <input type="number" class="form-control @error('semester') is-invalid @enderror"
                                        id="semester" name="semester" placeholder="semester" required>
                                </div>
                                @error('semester')
                                <div id="semester" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="id_layanan">Layanan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-hands-holding"></i></span>
                                    <select class="form-control @error('id_layanan') is-invalid @enderror" id="id_layanan"
                                        name="id_layanan" wire:model="byLayanans" onchange="filterByLayanans(this.value)" required>
                                        <option value="">Pilih Layanan</option>
                                        @foreach ($layanans as $data)
                                        <option value="{{ $data->id }}">{{ $data->divisi->nama_divisi }} -
                                            {{ $data->nama_layanan }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_layanan')
                                <div id="id_layanan" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-laptop-code"></i></span>
                                    <input type="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan"
                                        name="jurusan" placeholder="Jurusan Pemohon" value="{{session('jurusan')}}" required>
                                </div>
                                @error('jurusan')
                                <div id="jurusan" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="id_prodi">Program Studi</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <select class="form-control @error('id_prodi') is-invalid @enderror" id="id_prodi" name="id_prodi" required>
                                        <option value="">Pilih Prodi</option>
                                        @foreach ($prodis as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_prodi')
                                <div id="id_prodi" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="tahun_angkatan" class="form-label">Tahun Angkatan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-user-graduate"></i></span>
                                    <input type="tahun_angkatan" class="form-control @error('tahun_angkatan') is-invalid @enderror" id="tahun_angkatan"
                                        name="tahun_angkatan" placeholder="Tahun Angkatan Pemohon" value="{{session('angkatan')}}" required>
                                </div>
                                @error('tahun_angkatan')
                                <div id="tahun_angkatan" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="tahun" class="form-label">Tahun Akademik</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-user-graduate"></i></span>
                                    <input type="tahun" class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                        name="tahun" placeholder="Tahun Akademik Pemohon" required>
                                </div>
                                @error('tahun')
                                <div id="tahun" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <h3 class="fw-bold mt-5 mb-3"></i>Data Wali</h3>
                            <div class="col-md-6 mb-1">
                                <label for="nama_wali" class="form-label">Nama Wali</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-user-shield"></i></span>
                                    <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali"
                                        name="nama_wali" placeholder="Nama Wali" required>
                                </div>
                                @error('nama_wali')
                                <div id="nama_wali" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-briefcase"></i></span>
                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                                        name="pekerjaan" placeholder="Pekerjaan Wali Pemohon" required>
                                </div>
                                @error('pekerjaan')
                                <div id="pekerjaan" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="nik" class="form-label">NIP/NIPPK/NIK</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-id-badge"></i></span>
                                    <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                        name="nik" placeholder="NIP/NIPPK/NIK Wali Pemohon" required>
                                </div>
                                @error('nik')
                                <div id="nik" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                        name="jabatan" placeholder="Jabatan Wali Pemohon" required>
                                </div>
                                @error('jabatan')
                                <div id="jabatan" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="instansi" class="form-label">Instansi</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                                    <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi"
                                        name="instansi" placeholder="Instansi Wali Pemohon" required>
                                </div>
                                @error('instansi')
                                <div id="instansi" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <h3 class="fw-bold mt-5 mb-3"></i>Alamat Pemohon</h3>
                            <div class="col-md-6 mb-1">
                                <label for="dusun" class="form-label">Dusun/Jalan/Perum</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-map"></i></span>
                                    <input type="text" class="form-control @error('dusun') is-invalid @enderror" id="dusun"
                                        name="dusun" placeholder="Dusun/Jalan/Perum Pemohon" required>
                                </div>
                                @error('dusun')
                                <div id="dusun" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="desa" class="form-label">Desa/Kelurahan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-landmark"></i></span>
                                    <input type="text" class="form-control @error('desa') is-invalid @enderror" id="desa"
                                        name="desa" placeholder="Desa/Kelurahan Wali Pemohon" required>
                                </div>
                                @error('desa')
                                <div id="desa" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                                        name="kecamatan" placeholder="Kecamatan Pemohon" required>
                                </div>
                                @error('kecamatan')
                                <div id="kecamatan" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-city"></i></span>
                                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten"
                                        name="kabupaten" placeholder="Kabupaten Pemohon" required>
                                </div>
                                @error('kabupaten')
                                <div id="kabupaten" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="keperluan_surat" class="form-label">Keperluan Surat</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-message"></i></span>
                                    <input type="text" class="form-control @error('keperluan_surat') is-invalid @enderror" id="keperluan_surat"
                                        name="keperluan_surat" placeholder="Keperluan Layanan Pemohon" required>
                                </div>
                                @error('keperluan_surat')
                                <div id="keperluan_surat" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-theme" type="button">Submit</button>
                            </div>

                            <div class="card mt-5">
                                <div class="card-body p-4">
                                    <div class="card-title fw-bold">
                                        Persyaratan Layanan:
                                    </div>
                                    <ol>
                                        <li>Sudah Herregistrasi Semester Terbaru</li>
                                    </ol>
                                    <span>Waktu Tunggu: 1-2 Hari Kerja</span>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('script')


{{-- Inisiasi datedroppper --}}
<script>
    dateDropper({
        selector: '.date-input',
        expandedDefault: true,
        expandable: true,
        overlay: true,
        showArrowsOnHover: true,
        autoFill: false
    });
</script>

<script>
    // Script to capture selected option from dropdown
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const selectedOptionInput = document.getElementById('selectedOption');
        const searchInput = document.getElementById('searchInput');

        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = item.getAttribute('data-value');
                selectedOptionInput.value = selectedValue;
            });
        });

        searchInput.addEventListener('input', function() {
            const searchValue = searchInput.value.toLowerCase();
            dropdownItems.forEach(item => {
                const itemText = item.textContent.trim().toLowerCase();
                if (itemText.includes(searchValue)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>

<script>
    document.getElementById('layanan').addEventListener('change', function() {
        const layananId = this.value;
        const berkasList = document.getElementById('berkas-list');
        berkasList.innerHTML = '<li>Loading...</li>';

        if (layananId) {
            fetch(`/get-berkas/${layananId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        berkasList.innerHTML = '';
                        data.forEach(berkas => {
                            berkasList.innerHTML += `<li>${berkas.nama_berkas}</li>`;
                        });
                    } else {
                        berkasList.innerHTML = '<li>Tidak ada berkas untuk layanan ini.</li>';
                    }
                });
        } else {
            berkasList.innerHTML = '<li>Silakan pilih layanan terlebih dahulu.</li>';
        }
    });
</script>
@endsection