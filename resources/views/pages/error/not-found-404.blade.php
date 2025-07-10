<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-title-poliwangi.png') }}" />

    <title>404 Not Found | ULT Poliwangi</title>

    {{-- Font awesome icon cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- Aos style --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-6">
                <div class="card card-rounded">
                    <div class="card-image" data-aos="zoom-in" data-aos-delay="600">
                        <center>
                            <img src="{{ asset('images/404-not-found.png') }}" class="img-fluid" width="500"
                                alt="">
                        </center>
                    </div>
                    <div class="card-title text-center mt-3" data-aos="fade-up" data-aos-delay="300">
                        <h2>Oops Halaman Tidak Ditemukan</h2>
                    </div>
                    <div class="card-body d-flex justify-content-center" data-aos="fade-up" data-aos-delay="300">
                        @auth
                            <a href="{{ route('admin.dashboard.page') }}" class="btn btn-theme py-3 px-3">
                                <i class="fa-solid fa-circle-chevron-left"></i> &ensp; Kembali ke Dashboard
                            </a>
                        @endauth

                        @guest
                            <a href="{{ route('home.page') }}" class="btn btn-theme py-3 px-3">
                                <i class="fa-solid fa-circle-chevron-left"></i> &ensp; Kembali ke Landing Page
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    {{-- Script js AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- AOS initiate --}}
    <script>
        AOS.init();
    </script>
</body>

</html>
