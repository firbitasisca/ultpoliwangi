@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Layanan | ULT Poliwangi</title>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Manajemen Layanan</h4>
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
                                <button type="button" class="btn btn-primary px-4 mt-0 mb-3" data-toggle="modal"
                                    data-animation="bounce" data-target=".modalCreate"><i
                                        class="mdi mdi-plus-circle-outline mr-2"></i>Tambah Layanan Baru</button>
                                <div class="table-responsive">
                                    @php
                                        $no = 1;
                                    @endphp
                                    <table id="datatable" class="table">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th width="10%">No</th>
                                                <th class="text-left">Nama Divisi</th>
                                                <th class="text-left">Nama Layanan</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>
                                            @foreach ($layanan as $item)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td class="text-left">{{ $item->divisi->nama_divisi }}</td>
                                                    <td class="text-left">{{ $item->nama_layanan }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.layanan.update', $item->id) }}"
                                                            class="mr-2" data-toggle="modal" data-animation="bounce"
                                                            data-target=".modalUpdate{{ $item->id }}"><i
                                                                class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="{{ route('admin.layanan.destroy', $item->id) }}"><i
                                                                class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr>
                                                <!--end tr-->
                                        </tbody>
                                        @php
                                            $no++;
                                        @endphp
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    @foreach ($layanan as $itemdata)
                        <!--  Modal Update content for the above example -->
                        <div class="modal fade modalUpdate{{ $itemdata->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Update
                                            Layanan
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.layanan.update', $itemdata->id) }}" method="POST">
                                            @method('put')
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="update_id_divisi">Nama
                                                            Divisi</label>
                                                        <select
                                                            class="form-control @error('update_id_divisi') is-invalid @enderror"
                                                            id="update_id_divisi" name="update_id_divisi">
                                                            <option value="">Pilih Divisi
                                                            </option>
                                                            @foreach ($divisi as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ $itemdata->id_divisi == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->nama_divisi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('update_id_divisi')
                                                            <div id="update_id_divisi" class="form-text pb-1">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="update_nama_layanan">Nama
                                                            Layanan</label>
                                                        <input type="text"
                                                            class="form-control @error('update_nama_layanan') is-invalid @enderror"
                                                            id="update_nama_layanan" name="update_nama_layanan"
                                                            value="{{ $itemdata->nama_layanan }}"
                                                            placeholder="Masukkan Nama Layanan">
                                                        @error('update_nama_layanan')
                                                            <div id="update_nama_layanan" class="form-text pb-1">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="update_estimasi_layanan">Estimasi
                                                            Layanan</label>
                                                        <input type="number"
                                                            class="form-control @error('update_estimasi_layanan') is-invalid @enderror"
                                                            id="update_estimasi_layanan" name="update_estimasi_layanan"
                                                            placeholder="Jumlah Maksimal Hari Kerja Pelayanan"
                                                            value="{{ $itemdata->estimasi_layanan }}">
                                                        @error('update_estimasi_layanan')
                                                            <div id="update_estimasi_layanan" class="form-text pb-1">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr class="text-nowrap">
                                                                <th>Berkas
                                                                    @error('update_berkas')
                                                                        <div id="berkas" class="text-danger py-1">
                                                                            *pilih minimal satu berkas
                                                                        </div>
                                                                    @else
                                                                        <small>(Mohon Pilih Minimal Satu Berkas)</small>
                                                                    @enderror
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($berkas as $dataitem)
                                                                <tr>
                                                                    <td class="d-flex">
                                                                        <div class="form-check my-auto">
                                                                            @php
                                                                                $isChecked = false;
                                                                            @endphp

                                                                            @foreach ($berkaslayanan as $item)
                                                                                @if ($item->id_layanan == $itemdata->id && $item->id_berkas == $dataitem->id)
                                                                                    @php
                                                                                        $isChecked = true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endforeach

                                                                            <input class="form-check-input" type="checkbox"
                                                                                value="{{ $dataitem->id }}"
                                                                                name="update_berkas[]"
                                                                                id="{{ $dataitem->id }}"
                                                                                @if ($isChecked) checked @endif>

                                                                            <label class="form-check-label"
                                                                                for="{{ $dataitem->id }}">
                                                                                {{ $dataitem->nama_berkas }}
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                data-dismiss="modal">Batal</button>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <!--  Modal content for the above example -->
    <div class="modal fade modalCreate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Layanan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.layanan.create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_id_divisi">Nama Divisi</label>
                                    <select class="form-control @error('create_id_divisi') is-invalid @enderror"
                                        id="create_id_divisi" name="create_id_divisi">
                                        <option value="">Pilih Divisi</option>
                                        @foreach ($divisi as $dataDivisi)
                                            <option value="{{ $dataDivisi->id }}">{{ $dataDivisi->nama_divisi }}</option>
                                        @endforeach
                                    </select>
                                    @error('create_id_divisi')
                                        <div id="create_id_divisi" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_nama_layanan">Nama Layanan</label>
                                    <input type="text"
                                        class="form-control @error('create_nama_layanan') is-invalid @enderror"
                                        id="create_nama_layanan" name="create_nama_layanan"
                                        placeholder="Masukkan Nama Layanan">
                                    @error('create_nama_layanan')
                                        <div id="create_nama_layanan" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_estimasi_layanan">Estimasi Layanan</label>
                                    <input type="number"
                                        class="form-control @error('create_estimasi_layanan') is-invalid @enderror"
                                        id="create_estimasi_layanan" name="create_estimasi_layanan"
                                        placeholder="Jumlah Maksimal Hari Kerja Pelayanan">
                                    @error('create_estimasi_layanan')
                                        <div id="create_estimasi_layanan" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>Berkas

                                                @error('create_berkas')
                                                    <div id="berkas" class="text-danger py-1">
                                                        *pilih minimal satu berkas
                                                    </div>
                                                @else
                                                    <small>(Mohon Pilih Minimal Satu Berkas)</small>
                                                @enderror
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($berkas as $item)
                                            <tr>
                                                <td class="d-flex">
                                                    <div class="form-check my-auto">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $item->id }}" name="create_berkas[]"
                                                            id="{{ $item->id }}">
                                                        <label class="form-check-label" for="{{ $item->id }}">
                                                            {{ $item->nama_berkas }}
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-sm btn-primary" id="sa-success">Tambah</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
