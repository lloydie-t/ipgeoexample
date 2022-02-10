<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lloyd Geo IP </title>

    <!-- Fonts -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flag-icons.min.css') }}" rel="stylesheet">
</head>

<body class="text-center">
    <div class="container">
        <main class="form-geoip">
            <form>
                @csrf
                <img class="mb-4" src="{{ asset('img/LT_cari.jpg') }}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 fw-normal">Lloyd's IP Geolocator</h1>

                <div class="form-floating">
                    <input type="text" class="form-control border" id="ip_address" name="ip_address"
                        value="{{$ip_address}}" placeholder="{{$ip_address}}">
                    <label for="ip_address">Enter IP address</label>
                </div>
                <div class="text-danger d-none" id="error"> There was an error</div>
                <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Get Location</button>
            </form>
            <div id="flag-loading" class="mt-2 d-none">
                <span class="spinner-border spinner-border-sm" role="status"></span>
                <span>Getting Location</span>
            </div>
            <div id="flag-result" class="mt-2 d-none">
                <span id="flag-image" class="fi fi-gb"></span>
                <span>This IP address (<span id="ip_result"></span>) is located in <span id="ip_country"></span></span>
            </div>
        </main>
    </div>
</body>
<script src="{{ asset('js/geoip.js') }}"></script>

</html>
