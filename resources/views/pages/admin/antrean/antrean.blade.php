@extends('layouts.base-admin')

@section('title')
    <title> Manajemen Pengajuan | ULT Poliwangi</title>
@endsection


@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Panggilan Antrean</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <div class="row">
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div style="min-width: 100px; text-align: center;">
                                <i class="fas fa-users fa-2x text-warning"></i>
                            </div>
                            <div class="ps-3">
                                <h3 class="mb-0">{{$totalAntrean}}</h3>
                                <p class="mb-0">Jumlah Antrean</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div style="min-width: 100px; text-align: center;">
                                <i class="fas fa-user-check fa-2x text-success"></i>
                            </div>
                            <div class="ps-3">
                                <h3 class="mb-0">{{$antreanSekarang->nomor_antrean}}</h3>
                                <p class="mb-0">Antrean Sekarang</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div style="min-width: 100px; text-align: center;">
                                <i class="fas fa-user-plus fa-2x text-info"></i>
                            </div>
                            <div class="ps-3">
                                <h3 class="mb-0">{{$antreanSelanjutnya->nomor_antrean}}</h3>
                                <p class="mb-0">Antrean Selanjutnya</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div style="min-width: 100px; text-align: center;">
                                <i class="fas fa-user fa-2x text-danger"></i>
                            </div>
                            <div class="ps-3">
                                <h3 class="mb-0">{{$sisaAntrean}}</h3>
                                <p class="mb-0">Sisa Antrean</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                                                <th>Nomor Antrean</th>
                                                <th>Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>

                                            @foreach ($antreans as $data)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->nomor_antrean }}</td>
                                                    <td>
                                                        <br>
                                                        <button class="btn btn-success btn-sm rounded-circle" title="Panggil Antrean"
                                                            onclick="panggilAntrean('{{ $data->nomor_antrean }}')">
                                                        <i class="bi bi-mic-fill"></i>
                                                    </button>
                                                    <form action="{{ route('antrean.destroy', $data->nomor_antrean) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus antrean ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm rounded-circle" title="Hapus Data">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                    </form>
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

    <script>
  function panggilAntrean(nomor_antrean) {
    const msg = new SpeechSynthesisUtterance();
    msg.lang = 'id-ID'; // Bahasa Indonesia
    msg.text = `Nomor antrean ${nomor_antrean}, silakan menuju ke pelayanan`;
    window.speechSynthesis.speak(msg);
  }
</script>
@endsection