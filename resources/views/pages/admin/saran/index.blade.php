@extends('layouts.base-admin')

@section('title')
    <title> Daftar Saran | ULT Poliwangi</title>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Daftar Saran</h4>
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
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jenis Permohonan</th>
                                                <th>Saran</th>
                                                <th>Kode Layanan</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>

                                            @foreach ($sarans as $data)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->pengajuan->jenis_permohonan }}</td>
                                                    <td>
                                                        @if (($data->saran == null) | ($data->saran == ''))
                                                            Tidak Ada Saran
                                                        @else
                                                            {{ $data->saran }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $data->pengajuan->kode_tiket }}</td>
                                                    <td class="d-flex">
                                                        <div class="mx-auto my-auto">
                                                            <a href="{{ route('admin.ulasan.index', $data->id) }}"
                                                                title="Lihat Skor">
                                                                <i class="fas fa-magnifying-glass text-info font-16"></i>
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
@endsection
