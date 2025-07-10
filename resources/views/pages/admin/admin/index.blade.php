@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Admin | ULT Poliwangi</title>
@endsection

@section('content')
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!--end /div-->
                            <h4 class="page-title">Manajemen Admin</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary px-4 mt-0 mb-3" data-toggle="modal"
                                    data-animation="bounce" data-target=".modalCreate"><i
                                        class="mdi mdi-plus-circle-outline mr-2"></i>Tambah User Admin Baru</button>
                                <div class="table-responsive">
                                    @php
                                        $no = 1;
                                    @endphp
                                    <table id="datatable" class="table">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th width="10%">No</th>
                                                <th class="text-left">User Admin</th>
                                                <th class="text-left">Divisi User</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>
                                            @foreach ($admin as $item)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td class="text-left">{{ $item->user->name }}</td>
                                                    <td class="text-left">{{ $item->divisi->nama_divisi }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.admin.update', $item->id) }}"
                                                            class="mr-2" data-toggle="modal" data-animation="bounce"
                                                            data-target=".modalUpdate{{ $item->id }}"><i
                                                                class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="{{ route('admin.admin.destroy', $item->id) }}"><i
                                                                class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr>
                                                <!--end tr-->

                                                @php
                                                    $no++;
                                                @endphp
                                                <!--  Modal Update content for the above example -->
                                                <div class="modal fade modalUpdate{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Update
                                                                    Admin</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.admin.update', $item->id) }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="update_id_user">User
                                                                                    Admin</label>
                                                                                <select
                                                                                    class="form-control @error('update_id_user') is-invalid @enderror"
                                                                                    id="update_id_user"
                                                                                    name="update_id_user" disabled>
                                                                                    <option value="">
                                                                                        Pilih User
                                                                                    </option>
                                                                                    @foreach ($user as $itemuser)
                                                                                        <option value="{{ $itemuser->id }}"
                                                                                            {{ $item->id_user == $itemuser->id ? 'selected' : '' }}>
                                                                                            {{ $itemuser->name }}
                                                                                        </option>
                                                                                    @endforeach

                                                                                </select>
                                                                                @error('update_id_user')
                                                                                    <div id="update_id_user"
                                                                                        class="form-text pb-1">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="update_id_divisi">Divisi</label>
                                                                                <select
                                                                                    class="form-control @error('update_id_divisi') is-invalid @enderror"
                                                                                    id="update_id_divisi"
                                                                                    name="update_id_divisi">
                                                                                    <option value="">
                                                                                        Pilih Divisi
                                                                                    </option>
                                                                                    @foreach ($divisi as $data)
                                                                                        <option value="{{ $data->id }}"
                                                                                            {{ $item->id_divisi == $data->id ? 'selected' : '' }}>
                                                                                            {{ $data->nama_divisi }}
                                                                                        </option>
                                                                                    @endforeach

                                                                                </select>
                                                                                @error('update_id_divisi')
                                                                                    <div id="update_id_divisi"
                                                                                        class="form-text pb-1">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-primary">Simpan</button>
                                                                    <button type="button" class="btn btn-sm btn-danger"
                                                                        data-dismiss="modal">Batal</button>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
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
                <!--end row-->
                <!--end row-->

            </div><!-- container -->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!--  Modal content for the above example -->
    <div class="modal fade modalCreate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah User Admin Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.admin.create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_id_user">User Admin</label>
                                    <select class="form-control @error('create_id_user') is-invalid @enderror"
                                        id="create_id_user" name="create_id_user">
                                        <option value="">Pilih User</option>
                                        @foreach ($user_option as $itemuser)
                                            <option value="{{ $itemuser->id }}">{{ $itemuser->name }}
                                        @endforeach
                                    </select>
                                    @error('create_id_user')
                                        <div id="create_id_user" class="form-text pb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_id_divisi">Divisi</label>
                                    <select class="form-control @error('create_id_divisi') is-invalid @enderror"
                                        id="create_id_divisi" name="create_id_divisi">
                                        <option value=""> Pilih Divisi</option>
                                        @foreach ($divisi as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_divisi }}
                                        @endforeach
                                    </select>
                                    @error('create_id_divisi')
                                        <div id="create_id_divisi" class="form-text pb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                        <button type="submit" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
