@extends('layouts.base-admin')

@section('title')
    <title>Manajemen User | ULT Poliwangi</title>
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
                            <h4 class="page-title">Manajemen User</h4>
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
                                        class="mdi mdi-plus-circle-outline mr-2"></i>Tambah User Baru</button>
                                <div class="table-responsive">
                                    @php
                                        $no = 1;
                                    @endphp
                                    <table id="datatable" class="table">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th width="10%">No</th>
                                                <th class="text-left">Username User</th>
                                                <th class="text-left">Email User</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>
                                            @foreach ($user as $item)
                                                <tr class="text-center">
                                                    <td>{{ $no }}</td>
                                                    <td class="text-left">{{ $item->name }}</td>
                                                    <td class="text-left">{{ $item->email }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.user.update', $item->id) }}" class="mr-2"
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".modalUpdate{{ $item->id }}"><i
                                                                class="fas fa-edit text-info font-16"></i></a>
                                                        <a href="{{ route('admin.user.destroy', $item->id) }}"><i
                                                                class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr>
                                                <!--end tr-->

                                                @php
                                                    $no++;
                                                @endphp

                                                {{-- Modal Update --}}
                                                <div class="modal fade modalUpdate{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Ubah
                                                                    User</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.user.update', $item->id) }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="update_name">Nama</label>
                                                                                <input type="text"
                                                                                    class="form-control @error('update_name') is-invalid @enderror"
                                                                                    id="update_name" name="update_name"
                                                                                    value="{{ $item->name }}"
                                                                                    placeholder="Nama User">
                                                                                @error('update_name')
                                                                                    <div id="update_name"
                                                                                        class="form-text pb-1">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="update_email">Email</label>
                                                                                <input type="email"
                                                                                    class="form-control @error('update_email') is-invalid @enderror"
                                                                                    id="update_email" name="update_email"
                                                                                    value="{{ $item->email }}"
                                                                                    placeholder="Alamat Email">
                                                                                @error('update_email')
                                                                                    <div id="update_email"
                                                                                        class="form-text pb-1">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="update_password">Password</label>
                                                                                <input type="password"
                                                                                    class="form-control @error('update_password') is-invalid @enderror"
                                                                                    id="update_password"
                                                                                    name="update_password" value=""
                                                                                    placeholder="Password Baru">
                                                                                @error('update_password')
                                                                                    <div id="update_password"
                                                                                        class="form-text pb-1">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="update_password_confirmation">Password
                                                                                    Confirmation</label>
                                                                                <input type="password"
                                                                                    class="form-control @error('update_password_confirmation') is-invalid @enderror"
                                                                                    id="update_password_confirmation"
                                                                                    name="update_password_confirmation"
                                                                                    value=""
                                                                                    placeholder="Konfirmasi Password Baru">
                                                                                @error('update_password_confirmation')
                                                                                    <div id="update_password_confirmation"
                                                                                        class="form-text pb-1">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                                        id="sa-success">Simpan</button>
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
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.user.create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_name">Nama</label>
                                    <input type="text" class="form-control @error('create_name') is-invalid @enderror"
                                        id="create_name" name="create_name" value="" placeholder="Nama User">
                                    @error('create_name')
                                        <div id="create_name" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_email">Email</label>
                                    <input type="email" class="form-control @error('create_email') is-invalid @enderror"
                                        id="create_email" name="create_email" value="" placeholder="Alamat Email">
                                    @error('create_email')
                                        <div id="create_email" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_password">Password</label>
                                    <input type="password"
                                        class="form-control @error('create_password') is-invalid @enderror"
                                        id="create_password" name="create_password" value=""
                                        placeholder="Password Baru">
                                    @error('create_password')
                                        <div id="create_password" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="create_password_confirmation">Password Confirmation</label>
                                    <input type="password"
                                        class="form-control @error('create_password_confirmation') is-invalid @enderror"
                                        id="create_password_confirmation" name="create_password_confirmation"
                                        value="" placeholder="Konfirmasi Password">
                                    @error('create_password_confirmation')
                                        <div id="create_password_confirmation" class="form-text pb-1">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary" id="sa-success">Tambah</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--  Modal Update content for the above example -->
@endsection
