<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- tailwind CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/color.css') }}">
    @stack('styles')
    <link rel="icon" href="{{ url('images/landing/tokogampang-logo-white.svg') }}" type="image/gif">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') }}">

    <!-- Font awesome 5 -->
    <link href="{{ asset('reseller-theme/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ url('images/landing/tokogampang-logo-white.svg') }}" type="image/gif">

    <title>Toko Gampang</title>
    <style>
        html {
            width: 100%;
            height: 100%;
            display: table;
        }

        body {
            width: 100%;
            display: table-cell;
        }

        html,
        body {
            margin: 0px;
            padding: 0px;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            transition: background-color 5000s ease-in-out 0s;
            -webkit-text-fill-color: #323133;
        }

        .iti--separate-dial-code .iti__selected-flag {
            background-color: white;
        }

        /* custom input number */
        input[type="number"] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            /*appearance: textfield;*/
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }

        /*end custom input number button */
        label.error {
            color: #e53e3e;
            font-size: 12px;
        }
    </style>
</head>

<body class="bg-no-repeat h-screen bg-cover" style="background-image: url('{{ url('images/landing/BG_Front_Page_Red.png') }}')">
    <!--content account-->
    <div class="hidden lg:block mt-10 ml-5 -mb-16">
        <a class="kembali hover:shadow-2xl" href="/">
            <svg width="150" height="29.58" viewBox="0 0 145 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="kembali hover:shadow-2xl" d="M1.23223 27.8099C0.255922 28.7862 0.255922 30.3691 1.23223 31.3454L17.1421 47.2553C18.1184 48.2316 19.7014 48.2316 20.6777 47.2553C21.654 46.279 21.654 44.6961 20.6777 43.7198L6.53553 29.5776L20.6777 15.4355C21.654 14.4592 21.654 12.8763 20.6777 11.9C19.7014 10.9237 18.1184 10.9237 17.1421 11.9L1.23223 27.8099ZM153 27.0776L3 27.0776V32.0776L153 32.0776V27.0776Z M60.932 20.367C60.932 21.356 61.714 22.138 62.703 22.138C63.692 22.138 64.474 21.356 64.474 20.367V17.147L66.498 15.261L71.098 21.287C71.489 21.793 71.903 22.138 72.593 22.138C73.628 22.138 74.387 21.402 74.387 20.413C74.387 19.884 74.18 19.516 73.904 19.171L68.959 12.961L73.49 8.729C73.881 8.361 74.134 7.947 74.134 7.395C74.134 6.521 73.49 5.762 72.501 5.762C71.88 5.762 71.443 6.015 71.006 6.452L64.474 12.938V7.533C64.474 6.544 63.692 5.762 62.703 5.762C61.714 5.762 60.932 6.544 60.932 7.533V20.367ZM79.0707 14.87C79.3467 13.283 80.2897 12.248 81.7387 12.248C83.2107 12.248 84.1307 13.306 84.3377 14.87H79.0707ZM86.3617 20.781C86.6147 20.551 86.8217 20.206 86.8217 19.746C86.8217 18.964 86.2467 18.366 85.4647 18.366C85.0967 18.366 84.8667 18.458 84.6137 18.642C83.9007 19.171 83.0957 19.47 82.1297 19.47C80.5657 19.47 79.4617 18.642 79.1167 17.055H86.0397C86.9597 17.055 87.6727 16.388 87.6727 15.376C87.6727 12.823 85.8557 9.442 81.7387 9.442C78.1507 9.442 75.6437 12.34 75.6437 15.859V15.905C75.6437 19.677 78.3807 22.276 82.0837 22.276C83.8777 22.276 85.2807 21.701 86.3617 20.781ZM90.3472 20.39C90.3472 21.356 91.1292 22.138 92.0952 22.138C93.0612 22.138 93.8432 21.356 93.8432 20.39V15.123C93.8432 13.467 94.6482 12.616 95.9592 12.616C97.2702 12.616 98.0062 13.467 98.0062 15.123V20.39C98.0062 21.356 98.7882 22.138 99.7542 22.138C100.72 22.138 101.502 21.356 101.502 20.39V15.123C101.502 13.467 102.307 12.616 103.618 12.616C104.929 12.616 105.665 13.467 105.665 15.123V20.39C105.665 21.356 106.447 22.138 107.413 22.138C108.379 22.138 109.161 21.356 109.161 20.39V13.973C109.161 11.006 107.597 9.442 104.998 9.442C103.319 9.442 102.031 10.132 100.95 11.397C100.306 10.155 99.0872 9.442 97.4772 9.442C95.7062 9.442 94.6482 10.385 93.8432 11.42V11.282C93.8432 10.316 93.0612 9.534 92.0952 9.534C91.1292 9.534 90.3472 10.316 90.3472 11.282V20.39ZM112.202 20.39C112.202 21.356 112.984 22.138 113.95 22.138C114.916 22.138 115.698 21.356 115.698 20.413V20.39C116.526 21.379 117.676 22.23 119.539 22.23C122.46 22.23 125.151 19.976 125.151 15.859V15.813C125.151 11.696 122.414 9.442 119.539 9.442C117.722 9.442 116.549 10.293 115.698 11.443V6.82C115.698 5.854 114.916 5.072 113.95 5.072C112.984 5.072 112.202 5.854 112.202 6.82V20.39ZM118.642 19.263C117.009 19.263 115.652 17.906 115.652 15.859V15.813C115.652 13.766 117.009 12.409 118.642 12.409C120.275 12.409 121.655 13.766 121.655 15.813V15.859C121.655 17.929 120.275 19.263 118.642 19.263ZM131.218 22.23C132.92 22.23 134.093 21.609 134.944 20.666V20.689C134.944 21.425 135.611 22.138 136.623 22.138C137.566 22.138 138.325 21.402 138.325 20.459V14.847C138.325 13.191 137.911 11.834 136.991 10.914C136.117 10.04 134.737 9.534 132.828 9.534C131.195 9.534 129.999 9.764 128.895 10.178C128.343 10.385 127.952 10.914 127.952 11.535C127.952 12.34 128.596 12.961 129.401 12.961C129.562 12.961 129.7 12.938 129.907 12.869C130.574 12.662 131.356 12.524 132.322 12.524C134.07 12.524 134.967 13.329 134.967 14.778V14.985C134.093 14.686 133.196 14.479 131.954 14.479C129.033 14.479 126.986 15.721 126.986 18.412V18.458C126.986 20.896 128.895 22.23 131.218 22.23ZM132.276 19.815C131.149 19.815 130.367 19.263 130.367 18.32V18.274C130.367 17.17 131.287 16.572 132.782 16.572C133.633 16.572 134.415 16.756 135.013 17.032V17.653C135.013 18.918 133.909 19.815 132.276 19.815ZM141.495 20.39C141.495 21.356 142.277 22.138 143.243 22.138C144.209 22.138 144.991 21.356 144.991 20.39V6.82C144.991 5.854 144.209 5.072 143.243 5.072C142.277 5.072 141.495 5.854 141.495 6.82V20.39ZM148.228 6.774C148.228 7.786 149.079 8.43 150.183 8.43C151.287 8.43 152.138 7.786 152.138 6.774V6.728C152.138 5.716 151.287 5.095 150.183 5.095C149.079 5.095 148.228 5.716 148.228 6.728V6.774ZM148.435 20.39C148.435 21.356 149.217 22.138 150.183 22.138C151.149 22.138 151.931 21.356 151.931 20.39V11.282C151.931 10.316 151.149 9.534 150.183 9.534C149.217 9.534 148.435 10.316 148.435 11.282V20.39Z" fill="#ffffff" />
            </svg>
        </a>
    </div>

    @yield('content')

    <!--end content account-->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- validation -->
    <script src="{{ asset('js/store/validate.js') }}"></script>
    <script src="{{ asset('js/helpers.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
        @endif
        @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}")
        @endif
    </script>
    <script>
        $(document).on("click", "#show-password", function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            $('.input-password').attr('type') === 'password' ? $('.input-password').attr('type', 'text') : $('.input-password').attr('type', 'password');
        });
        $(document).on("click", "#show-password-confirmation", function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            $('.input-password-confirmation').attr('type') === 'password' ? $('.input-password-confirmation').attr('type', 'text') : $('.input-password-confirmation').attr('type', 'password');
        });
    </script>
    @stack('scripts')
</body>

</html>
