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
                            <h4 class="page-title">Update Pertanyaan Survei</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Form Update Pertanyaan Survei</h4>
                                <form action="{{ $action }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label" for="update_id_survei">Survei</label>
                                            <div class="form-group mb-3">
                                                <select class="form-control" disabled>
                                                    <option value="">Pilih Survei</option>
                                                    <option value="{{ $survei->id }}"
                                                        {{ $pertanyaansurvei->contains('id_survei', $survei->id) ? 'selected' : '' }}>
                                                        {{ $survei->nama_survei }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-nowrap">
                                                        <th>Pertanyaan
                                                            @error('pertanyaan')
                                                                <div class="text-danger py-1">
                                                                    *pilih minimal satu pertanyaan
                                                                </div>
                                                            @else
                                                                <small><span>(Mohon Pilih Minimal Satu
                                                                        Pertanyaan)</span></small>
                                                            @enderror
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pertanyaan as $itempertanyaan)
                                                        <tr>
                                                            <td class="d-flex">
                                                                <div class="form-check my-auto">
                                                                    @php
                                                                        $isChecked = $pertanyaansurvei->contains('id_pertanyaan', $itempertanyaan->id);
                                                                    @endphp
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="{{ $itempertanyaan->id }}"
                                                                        name="pertanyaan[]" id="{{ $itempertanyaan->id }}"
                                                                        {{ $isChecked ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="{{ $itempertanyaan->id }}">
                                                                        {{ $itempertanyaan->pertanyaan }}
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
