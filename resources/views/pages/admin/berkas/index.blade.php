@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Persyaratan Berkas | ULT Poliwangi</title>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!--end /div-->
                            <h4 class="page-title">Manajemen Persyaratan Berkas</h4>
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
                                        class="mdi mdi-plus-circle-outline mr-2"></i>Tambah Persyaratan Baru</button>
                                <div class="table-responsive">
                                    @php
                                        $no = 1;
                                    @endphp
                                    <table id="datatable" class="table">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th width="10%">No</th>
                                                <th class="text-left">Nama Persyaratan</th>
                                                <th>Jenis Syarat</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>
                                            @foreach ($berkas as $item)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td class="text-left">{{ $item->nama_berkas }}</td>
                                                    <td>{{ $item->jenis_berkas }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.berkas.update', $item->id) }}"
                                                            class="mr-2" data-toggle="modal" data-animation="bounce"
                                                            data-target=".modalUpdate{{ $item->id }}"><i
                                                                class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="{{ route('admin.berkas.destroy', $item->id) }}"><i
                                                                class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr>
                                                <!--end tr-->
                                        </tbody>
                                        @php
                                            $no++;
                                        @endphp

                                        <!--  Modal Update content for the above example -->
                                        <div class="modal fade modalUpdate{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Ubah Persyaratan
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.berkas.update', $item->id) }}"
                                                            method="POST">
                                                            @method('put')
                                                            @csrf

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="update_nama_berkas">Nama
                                                                            Persyaratan</label>
                                                                        <input type="text"
                                                                            class="form-control @error('update_nama_berkas') is-invalid @enderror"
                                                                            id="update_nama_berkas"
                                                                            name="update_nama_berkas"
                                                                            value="{{ $item->nama_berkas }}"
                                                                            placeholder="Masukkan Nama Persyaratan">
                                                                        @error('update_nama_berkas')
                                                                            <div id="update_nama_berkas" class="form-text pb-1">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="update_jenis_berkas">Jenis
                                                                            Syarat</label>
                                                                        <select
                                                                            class="form-control @error('update_jenis_berkas') is-invalid @enderror"
                                                                            id="update_jenis_berkas"
                                                                            name="update_jenis_berkas">
                                                                            <option value="">Pilih Jenis Berkas
                                                                            </option>
                                                                            <option value="Wajib"
                                                                                {{ $item->jenis_berkas == 'Wajib' ? 'selected' : '' }}>
                                                                                Wajib
                                                                            </option>
                                                                            <option value="Tidak Wajib"
                                                                                {{ $item->jenis_berkas == 'Tidak Wajib' ? 'selected' : '' }}>
                                                                                Tidak Wajib
                                                                            </option>
                                                                        </select>
                                                                        @error('update_jenis_berkas')
                                                                            <div id="update_jenis_berkas"
                                                                                class="form-text pb-1">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary">Simpan</button>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                data-dismiss="modal">Batal</button>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        @endforeach
                                    </table>
                                </div>
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

    <!--  Modal content for the above example -->
    <div class="modal fade modalCreate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Persyaratan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.berkas.create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_nama_berkas">Nama Persyaratan</label>
                                    <input type="text"
                                        class="form-control @error('create_nama_berkas') is-invalid @enderror"
                                        id="create_nama_berkas" name="create_nama_berkas"
                                        placeholder="Masukkan Nama Persyaratan">
                                    @error('create_nama_berkas')
                                        <div id="create_nama_berkas" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_jenis_berkas">Jenis Syarat</label>
                                    <select class="form-control @error('create_jenis_berkas') is-invalid @enderror"
                                        id="create_jenis_berkas" name="create_jenis_berkas">
                                        <option value="">Pilih Jenis Berkas</option>
                                        <option value="Wajib">Wajib</option>
                                        <option value="Tidak Wajib">Tidak Wajib</option>
                                    </select>
                                    @error('create_jenis_berkas')
                                        <div id="create_jenis_berkas" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
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
