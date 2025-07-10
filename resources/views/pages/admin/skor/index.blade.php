@extends('layouts.base-admin')

@section('title')
    <title> Daftar Ulasan | ULT Poliwangi</title>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Daftar Ulasan</h4>
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
                                                <th>Layanan Pengajuan</th>
                                                <th>Survei</th>
                                                <th>Pertanyaan</th>
                                                <th>Rating</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>

                                            @foreach ($skors as $data)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $data->pengajuan->nama_pemohon }}</td>
                                                    <td>{{ $data->pengajuan->layanan->nama_layanan }}</td>
                                                    <td>{{ $data->pertanyaan_survei->survei->nama_survei }}</td>
                                                    <td class="text-left">
                                                        {{ $data->pertanyaan_survei->pertanyaan->pertanyaan }}</td>
                                                    <td>
                                                        <i class="fa-solid fa-star text-warning"></i> &ensp;
                                                        {{ $data->skor }}
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
