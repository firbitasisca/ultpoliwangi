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
                            <h4 class="page-title">Tambah Pertanyaan Survei</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Form Pertanyaan Survei</h4>

                                <form action="{{ route('admin.pertanyaan.survei.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label" for="create_id_survei">Survei</label>
                                            <div class="form-group mb-3">
                                                <select
                                                    class="form-control @error('create_id_survei')
                                                    is-invalid
                                                @enderror"
                                                    id="create_id_survei" name="create_id_survei">
                                                    <option value="">Pilih Survei</option>
                                                    @foreach ($survei_option as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_survei }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('create_id_survei')
                                                    <div id="create_id_survei" class="form-text pb-1">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-nowrap">
                                                        <th>Pertanyaan

                                                            @error('pertanyaan')
                                                                <div id="" class="text-danger py-1">
                                                                    *pilih minimal satu pertanyaan
                                                                </div>
                                                            @else
                                                                <small>(Mohon Pilih Minimal Satu Pertanyaan)</small>
                                                            @enderror
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pertanyaan as $itempertanyaan)
                                                        <tr>
                                                            <td class="d-flex">
                                                                <div class="form-check my-auto">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="{{ $itempertanyaan->id }}"
                                                                        name="pertanyaan[]" id="{{ $itempertanyaan->id }}">
                                                                    <label class="form-check-label"
                                                                        for="{{ $itempertanyaan->id }}">
                                                                        {{ $itempertanyaan->pertanyaan }}
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                    <a href="{{ route('admin.pertanyaan.survei.index') }}"
                                        class="btn btn-sm btn-danger">Batal</a>
                                </form>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div>
    </div>
@endsection
