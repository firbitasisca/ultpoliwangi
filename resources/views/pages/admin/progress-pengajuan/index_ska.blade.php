@extends('layouts.base-admin')

@section('title')
<title> Manajemen Progres Pengajuan | ULT POLIWANGI</title>
@endsection

@section('css')
{{-- Datedroppper JS --}}
<script src="{{ asset('js-datedropper/datedropper-javascript.js') }}"></script>
@endsection



@section('content')
<div class="page-wrapper">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <!--end /div-->
                        <h4 class="page-title">Progress Pengajuan</h4>
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
                                    class="mdi mdi-plus-circle-outline mr-2"></i>Tambah
                                Progress Pengajuan</button>

                            <div class="table-responsive">
                                @php
                                $no = 1;
                                @endphp
                                <table id="datatable" class="table">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th width="10%">No</th>
                                            <th>Nama Pemohon</th>
                                            <th>Pesan</th>
                                            <th>File Berkas</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        <!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($progress_pengajuans as $data)
                                        <tr class="text-center">
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->pengajuan->nama_pemohon }}</td>
                                            <td>{{ $data->pesan }}</td>
                                            <td>
                                                @if ($data->file_dokumen == null || $data->file_dokumen == '')
                                                Tidak Ada File
                                                @else
                                                {{-- Jika ada file --}}
                                                <a href="{{ url($data->file_dokumen) }}"
                                                    target="_blank" class="btn btn-theme">Lihat File</a>
                                                @endif
                                            </td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>

                                                <a href="{{ route('admin.progress.pengajuan.delete', $data->id_pengajuan) }}"
                                                    class="mr-2" data-toggle="modal" data-animation="bounce"
                                                    data-target=".modalUpdate{{ $data->id_pengajuan }}"><i
                                                        class="fas fa-edit text-info font-16"></i></a>

                                                <a href="{{ route('admin.progress.pengajuan.delete', $data->id) }}"
                                                    class="ml-2"><i
                                                        class="fas fa-trash-alt text-danger font-16"></i></a>

                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        @php
                                        $no++;
                                        @endphp


                                        @endforeach
                                    </tbody>
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
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah
                    Progress Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.progress.pengajuan.create.ska', $pengajuan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="create_pesan">Pesan</label>
                                <input type="text" class="form-control @error('create_pesan') is-invalid @enderror"
                                    id="create_pesan" name="create_pesan" placeholder="Masukkan Deskripsi Pesan">
                                @error('create_pesan')
                                <div id="create_pesan" class="form-text pb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label" for="create_status">Status</label>
                            <div class="form-group mb-3">
                                <select class="form-control @error('create_status') is-invalid @enderror"
                                    id="create_status" name="create_status">
                                    <option value="">Pilih Status</option>
                                    <option value="Dokumen Diproses">Dokumen Diproses</option>
                                    <option value="Dokumen Selesai">Dokumen Selesai</option>
                                </select>
                                @error('create_status')
                                <div id="create_status" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

     @foreach ($progress_pengajuans as $data)
<!--  Modal content for the above example -->
<div class="modal fade modalUpdate{{ $data->id_pengajuan }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Ubah Nomor Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.progress.pengajuan.create.no_surat', $data->id_pengajuan) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nomor_surat">Nomor Surat</label>
                                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                    id="nomor_surat" name="nomor_surat" placeholder="Masukkan Nomor Surat">
                                @error('nomor_surat')
                                <div id="nomor_surat" class="form-text pb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label" for="create_status">Status</label>
                            <div class="form-group mb-3">
                                <select class="form-control @error('create_status') is-invalid @enderror"
                                    id="create_status" name="create_status">
                                    <option value="">Pilih Status</option>
                                    <option value="Dokumen Diproses">Dokumen Diproses</option>
                                    <option value="Dokumen Selesai">Dokumen Selesai</option>
                                </select>
                                @error('create_status')
                                <div id="create_status" class="form-text pb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
   @endforeach
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
    function displayFileName() {
        const input = document.getElementById('file_dokumen');
        const label = document.getElementById('fileLabel');
        const fileName = input.files[0].name;
        label.textContent = fileName;
    }
</script>
@endsection