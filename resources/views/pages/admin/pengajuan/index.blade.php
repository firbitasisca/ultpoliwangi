@extends('layouts.base-admin')

@section('title')
    <title> Manajemen Pengajuan | ULT Poliwangi</title>
@endsection

@php
    function dateConversion($date)
    {
        $month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $slug = explode('-', $date);
        return $slug[2] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[0];
    }
@endphp

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Manajemen Pengajuan</h4>
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
                                <div class="table-responsive">
                                    @php
                                        $no = 1;
                                    @endphp
                                    <table id="datatable" class="table">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Pemohon</th>
                                                <th>NIM/NIK</th>
                                                <th>Prodi</th>
                                                <th>Email</th>
                                                <th>Jenis Permohon</th>
                                                <th>Nama Layanan</th>
                                                <th>Tanggal</th>
                                                <th>No.Telepon</th>
                                                <th>Kodetiket</th>
                                                <th>Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>

                                            @foreach ($pengajuans as $data)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $data->nama_pemohon }}</td>
                                                    <td>{{ $data->nomor_identitas }}</td>
                                                    <td>
                                                        @if ($data->id_prodi == null)
                                                            Tidak Ada Prodi
                                                        @else
                                                            {{ $data->prodi->nama_prodi }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->jenis_permohonan }}</td>
                                                    <td>{{ $data->layanan->nama_layanan }}</td>
                                                    <td>{{ dateConversion($data->tanggal_permohonan) }}</td>
                                                    <td>{{ $data->nomor_telepon }}</td>
                                                    <td>{{ $data->kode_tiket }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('admin.progress.pengajuan.index', $data->id) }}"
                                                                title="Track Pengajuan" class="mx-1">
                                                                <i class="fas fa-magnifying-glass text-info font-16"></i>
                                                            </a>
                                                            <a href="{{ route('admin.pengajuan.destroy', $data->id) }}"
                                                                title="Hapus Pengajuan" class="mx-1">
                                                                <i class="fas fa-trash-alt text-danger font-16"></i>
                                                            </a>
                                                        </div>
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

    <!--  Modal Update content for the above example -->
    <div class="modal fade modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Progress Pengajuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama Pemohon</label>
                                    <input type="text" class="form-control" id="nama_pemohon" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Jenis Pemohon</label>
                                    <input type="text" class="form-control" id="jenis_permohonan" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input class="form-control" type="date" value="" id="tangal_permohonan">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user">Layanan</label>
                                    <select class="form-control">
                                        <option>Pilih Layanan</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Item">Status</label>
                                    <select class="form-control">
                                        <option>Pilih Status</option>
                                        <option>Terkirim</option>
                                        <option>Prosess</option>
                                        <option>Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Kode Tiket</label>
                                    <input type="text" class="form-control" id="kode_tiket  " required="">
                                </div>
                            </div>


                        </div>

                        <button type="button" class="btn btn-sm btn-primary">Save</button>
                        <button type="button" class="btn btn-sm btn-danger">Cancel</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
