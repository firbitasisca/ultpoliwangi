@extends('layouts.base-client')

@section('title')
<title>Tracking Pengajuan | ULT Poliwangi</title>
@endsection

@section('css')

@endsection

@section('content')
<section class="container-fluid section-bg-one">
    <div class="container py-5">
        <div class="row">
            <div class="col-sm-12 mb-3">
                <div class="page-title-box">
                    <h5 class="page-title">Daftar Pengajuan Selesai</h4>
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
                                        <th>Jenis Permohon</th>
                                        <th>Nama Layanan</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuan as $data)
                                    <tr class="text-center">
                                        <td>{{ $no }}</td>
                                        <td>{{ $data->jenis_permohonan }}</td>
                                        <td>{{ $data->layanan->nama_layanan }}</td>
                                        <td>{{ $data->tanggal_permohonan }}</td>
                                       <td>
                                    <a href="{{ url('tracking-progress-pengajuan/' . $data->id) }}" class="btn btn-primary">
                                        Lacak Pengajuan
                                    </a>
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
</section>
@endsection

@section('script')
{{-- AOS initiate --}}
<script>
    AOS.init();
</script>
@endsection