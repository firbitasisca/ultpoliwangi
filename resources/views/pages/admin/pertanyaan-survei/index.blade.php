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
                            <h4 class="page-title">Manajemen Pertanyaan Survei</h4>
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

                                <a href="{{ route('admin.pertanyaan.survei.create') }}" type="button"
                                    class="btn btn-primary px-4 mt-0 mb-3"><i
                                        class="mdi mdi-plus-circle-outline mr-2"></i>Tambah Pertanyaan Survei Baru</a>
                                <div class="table-responsive">
                                    @php
                                        $no = 1;
                                    @endphp
                                    <table id="datatable" class="table">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th width="10%">No</th>
                                                <th class="text-left">Nama Survei</th>
                                                <th>Tahun</th>
                                                <th>Status</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>
                                            @foreach ($survei as $item)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td class="text-left">{{ $item->nama_survei }}</td>
                                                    <td>{{ $item->tahun }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>

                                                        <a href="{{ route('admin.pertanyaan.survei.show', $item->id) }}"
                                                            class="mr-2" title="Lihat Pertanyaan">
                                                            <i class="fa-solid fa-eye" style="color: #6b7a94;"></i>
                                                        </a>

                                                        <a href="{{ route('admin.pertanyaan.survei.edit', $item->id) }}"
                                                            class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="{{ route('admin.pertanyaan.survei.delete', $item->id) }}"><i
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
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection
