@extends('layouts.auth')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="w-full mx-auto mt-5 lg:mt-20 xl:mt-20 max-w-2xl bg-white login-box-login bg-box-shadow">
    <div class="flex border-b">
        {{-- <a href="{{ route('reseller.register') }}" class="w-1/2 p-2 md:p-5 border-r bg-gray-50 font-bold text-sm rounded-t-2xl text-center cursor-pointer">Daftar Marketer</a> --}}
        <a href="#" class="w-1/2 p-2 md:p-5 font-bold text-sm rounded-t-2xl text-center cursor-pointer">Daftar Marketer</a>

        {{-- <a href="{{ route('supplier.register') }}" class="w-1/2 p-2 md:p-5 text-sm text-center rounded-t-2xl cursor-pointer">Daftar Product Owner</a> --}}
    </div>
    <!-- marketer -->
    <form id="marketer-register-form" method="POST" action="{{ route('reseller.register.store') }}" enctype="multipart/form-data" class="mx-5 lg:mx-0 xl:mx-0 rounded-lg px-2 lg:px-10 xl:px-20 pt-6 pb-8 mb-4">
        <div class="mb-5">
            <p class="  font-bold text-xl lg:text-3xl xl:text-3xl">Daftar Marketer</p>
        </div>
        @csrf
        <div class="mb-4 login-input">
            <div class="flex">
                <div class="flex flex-col w-full">
                    <input name="username" type="text" placeholder="Username / Nama Akun" class="border-b text-sm placeholder-gray-400 appearance-none w-full py-2 leading-tight @error('username') is-invalid @enderror" value="{{ old('username') }}" pattern="[A-Za-z0-9]{4,20}">
                </div>
                <p class="ml-2 my-auto text-sm">.{{ env('APP_DOMAIN') }}</p>
            </div>
        </div>
        <div class="mb-4 login-input">
            <input name="shop_name" type="text" value="{{ old('shop_name') }}" placeholder="Nama Toko" class="border-b text-sm placeholder-gray-400 appearance-none w-full py-2 leading-tight">
        </div>
        <div class="mb-4 login-input text-sm">
            <select class="categories w-full" name="category_id[]" multiple="multiple" data-placeholder="Pilih kategori toko">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4 login-input">
            <input name="name" type="text" placeholder="Nama Lengkap" class="border-b text-sm placeholder-gray-400 appearance-none w-full py-2 leading-tight" value="{{ old('name') }}">
        </div>
        <div class="mb-4 login-input">
            <input name="email" type="email" value="{{ isset($_GET['email']) ? $_GET['email'] : old('email') }}" placeholder="E-mail" class="border-b text-sm placeholder-gray-400 appearance-none w-full py-2 leading-tight">
        </div>
        <div class="mb-4 login-input flex flex-col">
            <input name="phone" type="tel" placeholder="No.Hp / WhapsApp" class="border-b text-sm placeholder-gray-400 appearance-none w-full py-2 leading-tight" value="{{ old('phone') }}" onkeypress='validateNumeric(event)'>
            <span class="text-xs text-gray-600 mt-1">Contoh: 08123456789 / 628123456789</span>
        </div>
        <div class="mb-4 login-input">
            <input name="address" type="text" placeholder="Alamat Lengkap" class="border-b text-sm placeholder-gray-400 appearance-none w-full py-2 leading-tight" value="{{ old('address') }}">
        </div>
        <div class="mb-4 login-input relative">
            <input name="password" id="input-password-marketer" type="password" placeholder="Kata Sandi" class="border-b text-sm placeholder-gray-400 appearance-none w-full py-2 pr-6 leading-tight input-password">
            <i class="far fa-eye absolute top-0 right-0 mt-2 w-4" id="show-password"></i>
        </div>
        <div class="mb-4 login-input relative">
            <input name="password_confirmation" type="password" placeholder="Konfirmasi Kata Sandi" class="border-b text-sm placeholder-gray-400 appearance-none w-full py-2 pr-6 leading-tight input-password-confirmation">
            <i class="far fa-eye absolute top-0 right-0 mt-2 w-4" id="show-password-confirmation"></i>
        </div>
        <div class="mb-4 login-input">
            <div class="flex text-xs space-x-4">
                <div>
                    <input type="checkbox" name="terms_of_service" id="terms_of_service" value="{{ $tos->id }}">
                    <label for="terms_of_service"> <a class="text-red-tokogampang underline ml-1" href="{{ route('web.agreement.show', ['pages'=>'marketer', 'type' => 'terms_of_service', 'id' => $tos->id ]) }}">Syarat dan ketentuan</a></label>
                </div>
                <div>
                    <input type="checkbox" name="privacy_policy" id="privacy_policy" value="{{ $pp->id }}">
                    <label for="privacy_policy"> <a class="text-red-tokogampang underline ml-1" href="{{ route('web.agreement.show', ['pages'=>'marketer', 'type' => 'privacy_policy', 'id' => $pp->id ]) }}">Kebijakan privasi</a></label>
                </div>
            </div>
        </div>
        <div class="mt-8 mb-2 lg:mb-3 xl:mb-3">
            <div class="w-full lg:flex-1 xl:flex-1 text-right">
                <button class="ml-auto py-1 w-1/2 text-sm text-white px-5 rounded-lg focus:outline-none focus:shadow-outline bg-red-tokogampang form-sbm-btn" type="button">
                    Daftar
                </button>
            </div>
        </div>
    </form>
</div>

<!-- <div class="w-full mx-auto mt-5 lg:mt-20 xl:mt-20 max-w-xl hidden"></div> -->
@endsection
@push('scripts')
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '973040769922999');

    $(".form-sbm-btn").on('click', function(event) {
        var inputPhone = $("input[name='phone']");
        var inputPhoneVal = inputPhone.val();
        var firstNumber = inputPhoneVal.substr(0, 1);
        var prefixNumber = '62';
        if (firstNumber == '0') {
            var fixNumber = prefixNumber + inputPhoneVal.substr(1, inputPhoneVal.length);
            inputPhone.val(parseInt(fixNumber));
        }
        $('#marketer-register-form').submit();
    });

    $('#marketer-register-form').on('submit', function(e) {
        e.preventDefault();
        formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $('#marketer-register-form').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(href) {
                fbq('track', 'CompleteRegistration');
                setTimeout(function() {
                    window.location.href = href;
                }, 1000);
            },
            error: function(err) {
                $('input,select,textarea').parent().find('.error').remove();
                $.each(err.responseJSON.errors, function(index, value) {
                    let message = value.toString();
                    let htmlError = `<p class="error text-red-500 text-xs font-medium mt-1">${message}</p>`;
                    $(`[name=${index}]`).parent().append(htmlError);
                });
            }
        });
    })
</script>
<script>
    $.ajax({
        url: "{{ url('/province') }}",
        method: 'GET',
        beforeSend: function() {
            $('#province').html('<option value="" disabled="disabled" selected>Memuat Data Provinsi...</option>');
        },
        success: function(data) {
            $("#province").html(data);
            $('#province').prop('disabled', false);
            console.log(data);
        },
        error: function(data) {
            console.log(data);
        }
    });

    $('#province').change(function() {
        var provinceId = $('#province option:selected').attr('data-id');
        $('#city').prop('disabled', true);
        $('#subdistrict').prop('disabled', true);
        $.ajax({
            type: 'GET',
            url: "{{ url('/city') }}",
            data: 'province_id=' + provinceId,
            beforeSend: function() {
                $('#city').html('<option value="" disabled="disabled" selected>Memuat Data Kota...</option>');
            },
            success: function(data) {
                $('#city').prop('selectedIndex', 0);
                $('#subdistrict').prop('selectedIndex', 0);
                $("#city").html(data);
                $('#city').prop('disabled', false);
            }
        });

        $.ajax({
            type: 'GET',
            url: "{{ url('/province-id') }}",
            data: 'province_id=' + provinceId,
            success: function(data) {
                $("#province_id").html(data);
            }
        });
    });

    $('#city').change(function() {
        var cityId = $('#city option:selected').attr('data-id');
        $('#subdistrict').prop('disabled', true);
        $.ajax({
            type: 'GET',
            url: "{{ url('/subdistrict') }}",
            data: 'city_id=' + cityId,
            beforeSend: function() {
                $('#subdistrict').html('<option value="" disabled="disabled" selected>Memuat Data Kecamatan...</option>');
            },
            success: function(data) {
                $("#subdistrict").html(data);
                $('#subdistrict').prop('disabled', false);
            }
        });

        $.ajax({
            type: 'GET',
            url: "{{ url('/city-id') }}",
            data: 'city_id=' + cityId,
            success: function(data) {
                $("#city_id").html(data);
            }
        });
    });

    $('#subdistrict').change(function() {
        var subdistrictId = $('#subdistrict option:selected').attr('data-id');
        $.ajax({
            type: 'GET',
            url: "{{ url('/cost') }}",
            data: 'subdistrict_id=' + subdistrictId,
            success: function(data) {
                $("#courier").html(data);
            }
        });

        $.ajax({
            type: 'GET',
            url: "{{ url('/subdistrict-id') }}",
            data: 'subdistrict_id=' + subdistrictId,
            success: function(data) {
                $("#subdistrict_id").html(data);
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.categories').select2();
    });
</script>
@endpush