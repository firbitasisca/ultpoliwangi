<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-title-poliwangi.png') }}" />

    @yield('title')

    {{-- Font awesome icon cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- Aos style --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #notification {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            max-width: 500px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        #okBtn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        #okBtn:hover {
            background-color: #45a049;
        }
    </style>
    @if(session('success'))
    <div id="overlay">
        <div id="notification">
            <p>{{ session('success') }}</p>
            <button id="okBtn">OK</button>
        </div>
    </div>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const okBtn = document.getElementById("okBtn");
            if (okBtn) {
                okBtn.addEventListener("click", function() {
                    document.getElementById("overlay").style.display = "none";
                });
            }
        });
    </script>
    @yield('css')
</head>

<body id="bodyHome">
    {{-- sweet alert pop up --}}
    @include('sweetalert::alert')

    {{-- navbar --}}
    @include('layouts.partials.client.navbar-client')

    <div class="mt-5 pt-3">
        {{-- content --}}
        @yield('content')
    </div>

    {{-- footer --}}
    @include('layouts.partials.client.footer-client')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    {{-- Script js AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    @yield('script')
</body>

</html>