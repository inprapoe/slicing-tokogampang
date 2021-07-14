<?php

/** @var \App\Models\Product $product */ ?>
@extends('supplier.layout')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<style>
    .two-line-ellipsis {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .owl-nav {
        display: flex;
        justify-content: space-between;
        color: #EB3E37;
        font-size: 16px;
        padding: 0 10px;
        margin-top: 4px !important;
    }

    input {
        background-color: rgba(244, 246, 249);
    }

    select,
    select.option {
        background-color: rgba(244, 246, 249);
    }
</style>
@endpush
@section('pixel_metadata')
<meta name="description" content="{{ $product->meta->meta_description }}">
<meta property="og:image" content="{{ asset($product->base_image->path) }}">
<meta property="og:locale" content="en_US">
<meta property="og:site_name" content="Tokogampang : {{ $product->meta->meta_title }}">
<meta property="og:title" content="{{ $product->meta->meta_title }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta name="twitter:image" content="{{ asset($product->base_image->path) }}">
<meta name="twitter:site" content="{{ $product->meta->meta_title }}">
<meta name="twitter:title" content="{{ $product->meta->meta_title }}">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta property="og:description" content="{{ $product->meta->meta_title }}">
@endsection
@section('title')
<title>{{ $product->name }}</title>
@endsection
@section('content')
<div class="main-container px-4 pt-4 md:px-16 md:pt-4" id="content">
    <div class="grid lg:grid-cols-10 xl:grid-cols-12 gap-8 lg:gap-x-12 xl:gap-x-24">
        <div class="lg:col-span-6 xl:col-span-7">
            <div class="flex md:flex-row flex-col mb-8">
                <div class="w-56 h-56 flex-shrink-0 rounded-lg md:mr-6 mx-auto mb-8 md:mb-0">
                    <div class="owl-carousel owl-theme">
                        <div class="relative bg-gray-100 w-56 h-56">
                            @if( !$product->is_in_stock || ($product->qty - @$deducter) <= 0 ) <a href="{{ route('supplier.products.sell', ['slug' => $product->slug]) }}" class="absolute flex justify-center items-center w-full h-full bg-black bg-opacity-25 cursor-default z-10">
                                <p class="text-center lg:text-lg text-white font-semibold">Stock Barang Habis</p>
                                </a>
                                @endif
                                <img class="object-center object-contain w-full h-full" src="{{ asset($product->base_image->path) }}" alt="">
                        </div>
                        @foreach($product->additional_images as $image)
                        <div class="relative bg-gray-100 w-56 h-56">
                            @if( !$product->is_in_stock || ($product->qty - @$deducter) <= 0 ) <a href="{{ route('supplier.products.sell', ['slug' => $product->slug]) }}" class="absolute flex justify-center items-center w-full h-full bg-black bg-opacity-25 cursor-default z-10">
                                <p class="text-center lg:text-lg text-white font-semibold">Stock Barang Habis</p>
                                </a>
                                @endif
                                <img class="object-center object-contain w-full h-full" src="{{ asset($image->path) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full flex flex-col">
                    <div class="font-bold mb-3">
                        <p class="text-xl">{{ $product->supplier->name }}</p>
                    </div>
                    <h1 class="text-2xl font-bold two-line-ellipsis mb-3">{{ $product->name }}</h1>
                    <div class="flex font-bold text-gray-700 items-center mb-3 text-sm md:text-base">
                        <div class="flex flex-shrink-0">
                            <img class="mr-1" src="{{ asset('reseller-theme/images/icons/star-yellow.svg') }}" alt="">
                            <img class="mr-1" src="{{ asset('reseller-theme/images/icons/star-yellow.svg') }}" alt="">
                            <img class="mr-1" src="{{ asset('reseller-theme/images/icons/star-yellow.svg') }}" alt="">
                            <img class="mr-1" src="{{ asset('reseller-theme/images/icons/star-yellow.svg') }}" alt="">
                            <img src="{{ asset('reseller-theme/images/icons/star.svg') }}" alt="">
                        </div>
                        <span class="border-r-2-red-tokogampang w-0 h-4 mx-2"></span>
                        <h3>Stok {{ $product->qty - @$deducter }} Produk</h3>
                        <span class="border-r-2-red-tokogampang w-0 h-4 mx-2"></span>
                        <h3>{{ $countView }}x Dilihat</h3>
                        <span class="border-r-2-red-tokogampang w-0 h-4 mx-2"></span>
                        <h3>{{ $product->weight }} gr</h3>
                    </div>
                    <h2 class="text-xl font-bold mb-3">Rp.{{ idr($product->reseller_price) }},-</h2>
                    @if($product->product_knowledge)
                    <div class="self-end">
                        <a href="{{route('supplier.knowledge.download', $product->id)}}" class="px-8 py-2 bg-red-tokogampang rounded-lg text-white font-bold inline-block">Informasi Produk</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="text-gray-700">
                <h2 class="font-bold mb-3 border-b-2-red-tokogampang inline-block">Deskripsi</h2>
                <p class="text-sm text-justify">
                    {!! $product->description !!}
                </p>
            </div>
        </div>
        <div class="lg:col-span-4 xl:col-span-5">
            <div class="flex justify-between font-bold mb-6">
                <h4 class="border-b-2-red-tokogampang inline-block">Data Penerima</h4>
            </div>
            <form id="buy-now-form" action="" method="post" class="grid gap-6">
                @CSRF
                @method('post')
                <div class="">
                    <input type="text" name="customer_name" class="w-full border border-1 border-gray-400 text-md rounded-md p-1" placeholder="Nama Lengkap" value="" required>
                    @if($errors->has('customer_name'))
                    <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('customer_name') }}
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    @endif
                </div>
                <div class="">
                    <input class="w-full border border-1 border-gray-400 text-md rounded-md p-1" type="email" name="customer_email" placeholder="Alamat E-mail" value="" required>
                    @if($errors->has('customer_email'))
                    <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('customer_email') }}
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    @endif
                </div>
                <div class="">
                    <input name="customer_phone" type="tel" placeholder="No. Hp / Whatsapp" class="border border-1 border-gray-400 text-md rounded-md p-1 placeholder-gray-400 appearance-none w-full" value="" onkeypress="validateNumeric(event)">
                    <span class="text-xs text-gray-600 mt-1">Contoh: 08123456789 / 628123456789</span>
                    @if($errors->has('customer_phone'))
                    <span class="text-red-600 text-xs">{{ $errors->first('customer_phone') }}</span>
                    @endif
                </div>
                <div class="">
                    <input id="qty" type="number" name="qty" class="w-full border border-1 border-gray-400 text-md rounded-md p-1 mb-3" placeholder="Jumlah Barang" value="" min="1" max="{{ $product->qty - @$deducter }}" oninput="setInputMinMax(this, 1, {{ $product->qty - @$deducter }})" required>
                    @if($errors->has('qty'))
                    <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('qty') }}
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    @endif
                </div>
                <div class="flex justify-between font-bold ">
                    <h4 class="border-b-2-red-tokogampang inline-block">Alamat Penerima</h4>
                </div>
                <div class="">
                    <select style="border: solid white !important;" class="w-full p-1 bg-white" id="single-location-search" name="destination_code" required>
                    </select>
                    @if($errors->has('destination_code'))
                    <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('destination_code') }}
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    @endif
                </div>
                <div class="">
                    <input class="w-full border border-1 border-gray-400 text-md rounded-md p-1" name="shipping_zip" type="text" placeholder="Kode Pos" value="" required pattern="\d*" maxlength="5" onkeypress="validateNumeric(event)">
                    @if($errors->has('shipping_zip'))
                    <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('shipping_zip') }}
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    @endif
                </div>
                <div class="">
                    <textarea class="w-full border h-24 align-text-top align-top placeholder border-1 border-gray-400 text-md rounded-md p-1" name="shipping_address" type="text" placeholder="Alamat Lengkap" required></textarea>
                    @if($errors->has('shipping_address'))
                    <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('shipping_address') }}
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    @endif
                </div>
                <div class="">
                    <select id="warehouse" class="w-full border border-1 border-gray-400 text-md rounded-md p-1 bg-white" id="warehouse" name="warehouse_id" required>
                        @include('shared.select-warehouse')
                    </select>
                    @if($errors->has('warehouse_id'))
                    <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('warehouse_id') }}
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    @endif
                </div>
                <div class="w-full border border-1 border-gray-400 text-md rounded-md p-1 bg-white">
                    <select class="bg-white text-sm w-full" name="shipping_method" id="courier">
                        <option value="" selected>Pilih Kurir</option>
                    </select>
                    @if($errors->has('shipping_method'))
                    <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('shipping_method') }}
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    @endif
                </div>
                <div class="flex justify-between font-bold ">
                    <h4 class="border-b-2-red-tokogampang inline-block">Metode Pembayaran</h4>
                </div>
                <label class="space-x-3 flex w-full border border-1 border-gray-400 text-md rounded-md p-1 payment-method">
                    <input class="my-auto" name="payment_method" value="direct_transfer" type="radio">
                    <div class="flex space-x-3">
                        <img class="object-center object-contain w-6 h-6" src="{{ asset('images/cil_bank-1.svg') }}" alt="">
                        <label class="my-auto text-gray-500" for="male">Direct Transfer</label>
                    </div>
                </label>
                <label class="space-x-3 flex w-full border border-1 border-gray-400 text-md rounded-md p-1 payment-method">
                    <input class="my-auto" name="payment_method" value="virtual_account" type="radio">
                    <div class="flex space-x-3">
                        <img class="object-center object-contain w-6 h-6" src="{{ asset('images/cil_bank.svg') }}" alt="">
                        <label class="my-auto text-gray-500" for="male">Virtual Account</label>
                    </div>
                </label>
                <label class="space-x-3 flex w-full border border-1 border-gray-400 text-md rounded-md p-1 payment-method select-cod">
                    <input class="my-auto" name="payment_method" :checked value="cash_on_delivery" type="radio">
                    <div class="flex space-x-3">
                        <img class="object-center object-contain w-6 h-6" src="{{ asset('images/cil_bank-1.svg') }}" alt="">
                        <label class="my-auto text-gray-500" for="female">COD</label>
                    </div>
                </label>
                <div class="">
                    <input class="w-full border border-1 border-gray-400 text-md rounded-md p-1" type="text" placeholder="Kode Voucher">
                    {{-- @if($errors->has('shipping_zip'))--}}
                    <span class="absolute right-0 text-red-700 font-medium text-xs">
                        <i class="fas fa-info-circle ml-2"></i>
                    </span>
                    {{-- @endif--}}
                </div>
                <div class="hidden">
                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="weight" name="weight" value="{{ $product->weight > 0 ? $product->weight : 1000 }}">
                    <input type="hidden" id="price" name="price" value="{{ $product->reseller_price }}">
                    <input type="hidden" id="supplier_id" name="supplier_id" value="{{ $product->supplier->id }}">
                    <input type="hidden" id="origin" name="origin" value="{{ $origin }}">
                    <input type="hidden" id="province_id" name="province_id" value="">
                    <input type="hidden" id="city_id" name="city_id" value="">
                    <input type="hidden" id="shipping_province_id" name="shipping_province_id" value="">
                    <input type="hidden" id="shipping_city_id" name="shipping_city_id" value="">
                    <input type="hidden" id="shipping_subdistrict_id" name="shipping_subdistrict_id" value="">
                    <input type="hidden" id="shipping_method" name="shipping_method" value="">
                    <input type="hidden" id="shipping_cost" name="shipping_cost" value="0">
                    <input type="hidden" id="shipping_service" name="shipping_service" value="">
                    <input type="submit" id="submit-form" class="hidden" />
                    <input type="hidden" id="shipping_province" name="shipping_province" value="">
                    <input type="hidden" id="shipping_city" name="shipping_city" value="">
                    <input type="hidden" id="shipping_subdistrict" name="shipping_subdistrict" value="">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="buy-now fixed bottom-0 left-60 right-0 bg-white" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
    <div class="main-container p-4 md:px-16 ">
        <div class="grid lg:grid-cols-10 xl:grid-cols-12 gap-4 items-center">
            <div class="lg:col-span-6 xl:col-span-8">
                <h1 class="text-xl font-bold two-line-ellipsis">{{ $product->name }}</h1>
            </div>
            <div class="lg:col-span-4 xl:col-span-4 flex justify-between">
                <div class="flex flex-col mr-3 md:mr-0">
                    <h4>Total Harga</h4>
                    <h4 id="total-price" class="text-lg">Rp.{{ idr($product->reseller_price) }},-</h4>
                </div>
                <div>
                    <button id="buy-now-button" class="px-8 py-2 bg-red-tokogampang rounded-lg font-bold text-white" {{ $product->is_in_stock || ($product->qty - @$deducter) <= 0  ? '' : 'disabled' }}>Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    function setInputMinMax(ele, min, max) {
        inputNumber = $(ele).val();
        $(ele).val(inputNumber);
        if (inputNumber > max) {
            $(ele).val(max);
        } else if (parseInt(inputNumber) < parseInt(min)) {
            $(ele).val(min);
        }
    }

    function formatRupiah(angka = 0, prefix = 'Rp.') {
        var format = new Intl.NumberFormat('ID').format(angka);
        return prefix + ' ' + format;
    }
</script>
<script>
    $('#single-location-search').select2({
        placeholder: 'Masukan Kota / Kecamatan',
        minimumInputLength: 3,
        ajax: {
            url: "{{ route('destination') }}",
            dataType: 'json',
            data: function(data) {
                return {
                    searchTerm: data.term
                };
            },
            processResults: function(response) {
                shipping_province = response.province;
                shipping_city = response.city;
                shipping_subdistrict = response.subdistrict;

                return {
                    results: response
                };
            },
            cache: true
        }
    });

    function getAvailableWarehouses(stringParams) {
        $.ajax({
            type: 'GET',
            url: "{{ route('available-warehouses') }}",
            data: stringParams,
            beforeSend: function() {
                $('#warehouse').html('<option value="" disabled="disabled" selected>Memuat Data Warehouse...</option>');
            },
            success: function(html) {
                $("#warehouse").html(html);
            }
        });
    }
    var provinceId = '';
    var cityId = '';
    var qty = '';
    $.ajax({
        url: "{{ url('/province') }}",
        method: 'GET',
        beforeSend: function() {
            $('#province').html('<option value="" disabled="disabled" selected>Memuat Data Provinsi...</option>');
        },
        success: function(data) {
            $("#province").html(data);
            $('#province').prop('disabled', false);

        },
        error: function(data) {

        }
    });

    $('#province').change(function() {
        provinceId = $('#province option:selected').attr('data-id');
        provinceId = $('#province_id').val();
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
                $("#city").html(data);
                $('#city').prop('disabled', false);
            }
        });

        $.ajax({
            type: 'GET',
            url: "{{ url('/province-id') }}",
            data: 'province_id=' + provinceId,
            success: function(data) {
                $("#shipping_province_id").val($(data).val());
            }
        });
        getAvailableWarehouses('province_id=' + provinceId + '&city_id=' + cityId + '&qty=' + qty + '&product_id={{ $product->id }}');
    });

    $('#city').change(function() {
        cityId = $('#city option:selected').attr('data-id');
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

                $("#shipping_city_id").val($(data).val());
            }
        });

        getAvailableWarehouses('province_id=' + provinceId + '&city_id=' + cityId + '&qty=' + qty + '&product_id={{ $product->id }}');

    });

    $('#subdistrict').change(function() {
        var subdistrictId = $('#subdistrict option:selected').attr('data-id');
        var weight = $('input[name=weight]').val();
        var origin = $('input[name=origin]').val();
        var qty = $('input[name=qty]').val();
        var product_id = $('input[name=product_id]').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/cost') }}",
            data: 'origin=' + parseInt(origin) + '&subdistrict_id=' + parseInt(subdistrictId) + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id),
            success: function(data) {
                $("#courier").html(data);
            },
            error: function(data) {

            }
        });

        $.ajax({
            type: 'GET',
            url: "{{ url('/subdistrict-id') }}",
            data: 'subdistrict_id=' + subdistrictId,
            success: function(data) {
                $("#shipping_subdistrict_id").val($(data).val());
            }
        });
    });

    $('#courier').change(function() {
        $("#shipping_method").val($('option:selected', this).data('method'));
        $("#shipping_cost").val($('option:selected', this).data('cost'));
        $("#shipping_service").val($('option:selected', this).data('service'));

        var totalPrice = parseInt($('input[name=qty]').val() * $('input[name=price]').val()) + parseInt($("#shipping_cost").val());
        $('#total-price').text(formatRupiah(totalPrice));
    });

    let cod;
    $('#single-location-search').change(function() {
        destination_code = $('#single-location-search option:selected').val();
        var provinceId = $('#province_id').val();
        var cityId = $('#city_id').val();
        var weight = $('input[name=weight]').val();
        var warehouse_id = $('select[name=warehouse_id]').val();
        var qty = $('input[name=qty]').val();
        var product_id = $('input[name=product_id]').val();
        var payment = $('select[name=payment_method] option:selected').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/data-cost') }}",
            data: 'warehouse_id=' + warehouse_id + '&destination_code=' + destination_code + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id),
            success: function(data) {
                $("#courier").html(data);
                $("#courier").change();
            },
        });

        $.ajax({
            type: 'GET',
            url: "{{ url('/location/destination') }}",
            data: 'destination_code=' + destination_code,
            success: function(data) {
                $("#shipping_province").val(data.province);
                $("#shipping_city").val(data.city);
                $("#shipping_subdistrict").val(data.subdistrict);
                $("#province_id").val(data.province_id);
                $("#city_id").val(data.city_id);

                if (data.cod == 0) {
                    $('.select-cod').css('display', 'none');
                    Swal.fire({
                        html: "Wilayah anda tidak mendukung Layanan COD",
                        showCloseButton: true,
                        showConfirmButton: true,
                        confirmButtonColor: '#EB1C24'
                    }).then(function(event) {
                        parentShareModal.append(shareModal);
                    });
                } else {
                    $('.select-cod').css('display', 'block');
                }
            },
            error: function(data) {
                console.log('error destination');
            }
        });

        getAvailableWarehouses('destination_code=' + (destination_code || '') + '&qty=' + qty + '&product_id={{ $product->id }}');
    });

    $('#warehouse_id').change(function() {
        destination_code = $('#single-location-search option:selected').val();
        var provinceId = $('#province_id').val();
        var cityId = $('#city_id').val();
        var weight = $('input[name=weight]').val();
        var warehouse_id = $('select[name=warehouse_id]').val();
        var qty = $('input[name=qty]').val();
        var product_id = $('input[name=product_id]').val();

        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/data-cost') }}",
            data: 'warehouse_id=' + warehouse_id + '&destination_code=' + destination_code + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id),
            success: function(data) {
                $("#courier").html(data);
            },
        });
    });

    function sendSubdistrict(destination) {
        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/data-cost') }}",
            data: 'origin=' + parseInt(origin) + '&destination_code=' + destination.destination_code + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id),
            success: function(data) {
                $("#courier").html(data);
            },
            error: function(data) {

            }
        });

        $.ajax({
            type: 'GET',
            url: "{{ url('/subdistrict-id') }}",
            data: 'subdistrict_id=' + subdistrictId,
            success: function(data) {
                $("#shipping_subdistrict_id").val($(data).val());
            }
        });
    }

    $('#qty').change(function() {
        var destination_code = $('#single-location-search option:selected').val();
        var provinceId = $('#province_id').val();
        var cityId = $('#city_id').val();
        var weight = $('input[name=weight]').val();
        var origin = $('input[name=origin]').val();
        qty = $('input[name=qty]').val();
        var product_id = $('input[name=product_id]').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/data-cost') }}",
            data: 'origin=' + parseInt(origin) + '&destination_code=' + destination_code + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id),
            beforeSend: function() {
                $('#courier').html('<option value="" disabled="disabled" selected>Memuat Data Ongkir...</option>');
            },
            success: function(data) {
                $("#courier").html(data);
            },
            error: function(data) {

            }
        });
        getAvailableWarehouses('province_id=' + provinceId + '&city_id=' + cityId + '&qty=' + qty + '&product_id={{ $product->id }}');

    });

    $('#qty').on('input change', function() {
        var totalPrice = parseInt($('input[name=qty]').val() * $('input[name=price]').val()) + parseInt($("#shipping_cost").val());
        $('#total-price').text(formatRupiah(totalPrice));
    });

    $('#qty').change();
</script>
<script>
    $('#buy-now-button').click(function(event) {

        var inputPhone = $('input[name=customer_phone]');
        var inputPhoneVal = inputPhone.val();
        var firstNumber = inputPhoneVal.substr(0, 1);
        var prefixNumber = '62';
        if (firstNumber == '0') {
            var fixNumber = prefixNumber + inputPhoneVal.substr(1, inputPhoneVal.length);
            inputPhone.val(parseInt(fixNumber));
        }

        var formData = {
            'product_id': $('input[name=product_id]').val(),
            'qty': $('input[name=qty]').val(),
            'warehouse_id': $('select[name=warehouse_id]').val(),
            'price': $('input[name=price]').val(),
            'customer_name': $('input[name=customer_name]').val(),
            'customer_email': $('input[name=customer_email]').val(),
            'customer_phone': $('input[name=customer_phone]').val(),
            'supplier_id': $('input[name=supplier_id]').val(),
            'shipping_address': $('textarea[name=shipping_address]').val(),
            'shipping_province': $("#shipping_province").val(),
            'shipping_city': $("#shipping_city").val(),
            'shipping_subdistrict': $("#shipping_subdistrict").val(),
            'destination_code': $("select[name=destination_code]").val(),
            //'shipping_province': $('input[name=shipping_province_id]').val(),
            //'shipping_city': $('input[name=shipping_city_id]').val(),
            //'shipping_subdistrict': $('input[name=shipping_subdistrict_id]').val(),
            'shipping_zip': $('input[name=shipping_zip]').val(),
            'shipping_method': $("input[name=shipping_method]").val(),
            'shipping_cost': $("input[name=shipping_cost]").val(),
            'shipping_service': $("input[name=shipping_service]").val(),
            'payment_method': $('input[name=payment_method]:checked').val()
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '{{ route("supplier.checkout.store") }}',
            data: formData,
            dataType: 'json',
            encode: true,
            beforeSend: function() {
                $('#buy-now-button').attr('disabled', true);
                $('#buy-now-button').css('cursor', 'default');
                $('#buy-now-button').html('<i class="fas fa-sync fa-spin px-12"></i>');
            },
            success: function(data) {

                if (data.success) {
                    window.location = data.url;
                }
                setTimeout(function() {
                    $('#buy-now-button').attr('disabled', false);
                    $('#buy-now-button').css('cursor', 'pointer');
                    $('#buy-now-button').text('Bayar Sekarang');
                }, 200)
            },
            error: function(err) {
                $('input,select,textarea').parent().find('.error').remove();
                $.each(err.responseJSON.errors, function(index, value) {
                    let message = value.toString();
                    let htmlError = `<p class="error text-red-500 text-xs font-medium">${message}</p>`;

                    $(`[name=${index}]`).parent().append(htmlError);
                });
                setTimeout(function() {
                    $('#buy-now-button').attr('disabled', false);
                    $('#buy-now-button').css('cursor', 'pointer');
                    $('#buy-now-button').text('Bayar Sekarang');
                }, 200)
            }

        })
    });
</script>
<script>
    let heightBuyNow = $('.buy-now').height();
    let content = $('#content');
    content.css('padding-bottom', heightBuyNow + 40);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        items: 1,
        nav: true,
        dots: false,
        navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
    });
</script>
@endpush