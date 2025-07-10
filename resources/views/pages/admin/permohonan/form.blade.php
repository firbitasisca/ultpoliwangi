@extends('layouts.base-admin')

@section('title')
    <title> Ubah Formulir Permohonan | ULT POLIWANGI</title>
@endsection

@section('css')
    {{-- input select range --}}
    <link href="{{ asset('template/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

    @php
        function dateConversion($date)
        {
            $month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $slug = explode('-', $date);
            return $slug[2] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[0];
        }
    @endphp
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Ubah Permohonan</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <form action="{{ $action }}" method="POST">
                                                    @method('put')
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="nama_pemohon"
                                                                    class="col-sm-2 col-form-label">Nama Pemohon</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $permohonan->nama_pemohon }}"
                                                                        id="nama_pemohon" name="nama_pemohon" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="nomor_identitas"
                                                                    class="col-sm-2 col-form-label">NIM / NIK</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="number"
                                                                        value="{{ $permohonan->nomor_identitas }}"
                                                                        id="nomor_identitas" name="nomor_identitas"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="jenis_permohonan"
                                                                    class="col-sm-2 col-form-label">Jenis Pemohon</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $permohonan->jenis_permohonan }}"
                                                                        id="jenis_permohonan" name="jenis_permohonan"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="kode_tiket" class="col-sm-2 col-form-label">Kode
                                                                    Tiket</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $permohonan->kode_tiket }}"
                                                                        id="kode_tiket" name="kode_tiket" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="email"
                                                                    class="col-sm-2 col-form-label text-right">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="email"
                                                                        value="{{ $permohonan->email }}" id="email"
                                                                        name="email" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="nomor_telepon"
                                                                    class="col-sm-2 col-form-label">Nomor Telepon</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="number"
                                                                        value="{{ $permohonan->nomor_telepon }}"
                                                                        id="nomor_telepon" name="nomor_telepon" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="tanggal_permohonan"
                                                                    class="col-sm-2 col-form-label">Tanggal
                                                                    Pengajuan</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        value="{{ dateConversion($permohonan->tanggal_permohonan) }}"
                                                                        id="tanggal_permohonan" name="tanggal_permohonan"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="tanggal_permohonan"
                                                                    class="col-sm-2 col-form-label">Prodi Pemohon</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $permohonan->prodi->nama_prodi }}"
                                                                        id="tanggal_permohonan" name="tanggal_permohonan"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label text-right"
                                                                    for="id_layanan">Nama
                                                                    Layanan</label>
                                                                <div class="col-sm-10">
                                                                    <select
                                                                        class="select2 form-control mb-3 custom-select @error('id_layanan') is-invalid @enderror"
                                                                        style="width: 100%; height: 36px;" id="id_layanan"
                                                                        name="id_layanan" required>
                                                                        <option value="">Pilih Layanan</option>
                                                                        @foreach ($layanan as $namaDivisi => $layananGroup)
                                                                            <optgroup label="{{ $namaDivisi }}">
                                                                                @foreach ($layananGroup as $layanan)
                                                                                    <option value="{{ $layanan->id }}"
                                                                                        {{ $permohonan->id_layanan == $layanan->id ? 'selected' : '' }}>
                                                                                        {{ $layanan->nama_layanan }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                    <a href="{{ route('admin.permohonan.index') }}" type="button"
                                                        class="btn btn-danger">Batal</a>
                                                </form>
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div><!--end col-->
                                </div><!--end row-->

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection

@section('script')
    {{-- input select range --}}
    <script src="{{ asset('template/assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('template/assets/pages/jquery.forms-advanced.js') }}"></script>
@endsection
