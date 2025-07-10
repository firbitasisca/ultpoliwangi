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
                            <h4 class="page-title">Show Pertanyaan Survei</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="update_nama_berkas">Nama Survei</label>
                                            <input type="text" class="form-control" value="{{ $survei->nama_survei }}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="20%">Pertanyaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($pertanyaansurvei as $item) --}}
                                                @foreach ($pertanyaansurvei as $pertanyaanSurvei)
                                                    <tr>
                                                        <td>{{ $pertanyaanSurvei->pertanyaan->pertanyaan }}</td>
                                                    </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <a href="{{ route('admin.pertanyaan.survei.index') }}"
                                    class="btn btn-sm btn-danger">Kembali</a>

                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div>
    </div>
@endsection
