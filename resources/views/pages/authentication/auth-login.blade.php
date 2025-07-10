@extends('layouts.auth-template')

@section('title')
    <title>Login | ULT Poliwangi</title>
@endsection

@section('css')
    {{-- chapta google --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
    <!-- Log In page -->
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card card-hover">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                <span class="logo logo-admin"><img src="{{ asset('images/auth-login.png') }}" width="80"
                                        alt="logo" class="auth-logo"></span>
                            </div><!--end auth-logo-box-->

                            <div class="text-center auth-logo-text">
                                <h4 class="mt-0 mb-3 mt-5">Selamat Datang Admin</h4>
                                <p class="text-muted mb-0">Login untuk memulai</p>
                            </div> <!--end auth-logo-text-->


                            <form id="formAuthentication" class="form-horizontal auth-form my-4"
                                action="{{ route('do.login') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <div class="input-group mb-3">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-user"></i>
                                        </span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Masukkan username" autofocus>
                                    </div>
                                    @error('name')
                                        <div class="form-text">{{ $message }}</div>
                                    @enderror
                                </div><!--end form-group-->

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <div class="input-group mb-3">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-lock"></i>
                                        </span>
                                        <input type="password" id="password"
                                            class="form-control  @error('password') is-invalid @enderror" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password">
                                    </div>
                                    @error('password')
                                        <div id="passwordHelp" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div><!--end form-group-->


                                <div class="form-group mb-4 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-round btn-block waves-effect waves-light"
                                            type="submit">Login <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div><!--end col-->
                                </div> <!--end form-group-->

                                <center>
                                    <span>Kembali ke halaman <a href="{{ route('home.page') }}"
                                            class="tag-theme fw-bold">Landing
                                            Page </a></span>
                                </center>
                            </form><!--end form-->
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end auth-page-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- End Log In page -->
@endsection
