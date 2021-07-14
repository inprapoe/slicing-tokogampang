<?php

/** @var \App\Models\Product $product */ ?>
@extends('layouts.reseller')
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
        color: {{ $reseller->customStore->theme_color }};
        font-size: 16px;
        padding: 0 10px;
        margin-top: 4px !important;
    }

    .payment-method {
        cursor: pointer;
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
<div class="main-container p-4 pb-16 md:p-16" id="content">
    <div class="grid lg:grid-cols-10 xl:grid-cols-12 gap-8 lg:gap-x-12 xl:gap-x-24">
        <div class="lg:col-span-6 xl:col-span-7">
            <div class="flex md:flex-row flex-col mb-8">
                <div class="w-56 h-56 flex-shrink-0 rounded-lg md:mr-6 mx-auto mb-8 md:mb-0">
                    <div class="owl-carousel owl-theme">
                        <div class="relative bg-gray-100 w-56 h-56">
                            @if( !$product->is_in_stock || ($product->qty - @$deducter) <= 0 ) <a href="{{ route('reseller.products.show', ['slug' => $product->slug]) }}" class="absolute flex justify-center items-center w-full h-full bg-black bg-opacity-25 cursor-default z-10">
                                <p class="text-center lg:text-lg text-white font-semibold">Stock Barang
                                    Habis</p>
                                </a>
                                @endif
                                <img class="object-center object-contain w-full h-full" src="{{ asset($product->base_image->path) }}" alt="">
                        </div>
                        @foreach($product->additional_images as $image)
                        <div class="relative bg-gray-100 w-56 h-56">
                            @if( !$product->is_in_stock || ($product->qty - @$deducter) <= 0 ) <a href="{{ route('reseller.products.show', ['slug' => $product->slug]) }}" class="absolute flex justify-center items-center w-full h-full bg-black bg-opacity-25 cursor-default z-10">
                                <p class="text-center lg:text-lg text-white font-semibold">Stock Barang
                                    Habis</p>
                                </a>
                                @endif
                                <img class="object-center object-contain w-full h-full" src="{{ asset($image->path) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full flex flex-col">
                    <h1 class="text-2xl font-bold two-line-ellipsis mb-3">{{ $product->name }}</h1>
                    <div class="flex font-bold text-gray-700 items-center mb-3 text-sm md:text-base">
                        <div class="flex flex-shrink-0">
                            <img class="mr-1" src="{{ asset('reseller-theme/images/icons/star-yellow.svg') }}" alt="">
                            <img class="mr-1" src="{{ asset('reseller-theme/images/icons/star-yellow.svg') }}" alt="">
                            <img class="mr-1" src="{{ asset('reseller-theme/images/icons/star-yellow.svg') }}" alt="">
                            <img class="mr-1" src="{{ asset('reseller-theme/images/icons/star-yellow.svg') }}" alt="">
                            <img src="{{ asset('reseller-theme/images/icons/star.svg') }}" alt="">
                        </div>
                        <span class="border-r-2 w-0 h-4 mx-2" style="border-color:{{ $reseller->customStore->theme_color }}"></span>
                        <h3>Stok {{ $product->qty - @$deducter }} Produk</h3>
                        <span class="border-r-2 w-0 h-4 mx-2" style="border-color:{{ $reseller->customStore->theme_color }}"></span>
                        <h3>{{ $countView }}x Dilihat</h3>
                        <span class="border-r-2 w-0 h-4 mx-2" style="border-color:{{ $reseller->customStore->theme_color }}"></span>
                        <h3>{{ $product->weight }} gr</h3>
                    </div>
                    <h2 class="text-xl font-bold mb-3">Rp.{{ idr($product->reseller_price) }},-</h2>
                    <div class="flex flex-wrap -m-1">
                        @if (!empty(@$productBookmark->landing_id))
                        <a href="{{ route('reseller.products.show.landing.page', ['slug' => $product->slug]) }}" target="_blank"><button class="px-4 py-1.5 self-end text-white rounded-md font-semibold text-sm m-1" style="background-color: {{ $reseller->customStore->theme_color }};">Informasi Produk</button></a>
                        @endif
                        @if (!empty($product->product_knowledge))
                        <a href="{{ route('supplier.products.knowledge.download', ['id' => $product->id]) }}"><button class="px-4 py-1.5 self-end text-white rounded-md font-semibold text-sm m-1" style="background-color: {{ $reseller->customStore->theme_color }};">Download Product Knowledge</button></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-gray-700">
                <h2 class="font-bold mb-3 border-b-2 inline-block" style="border-color:{{ $reseller->customStore->theme_color }}">Deskripsi</h2>
                <p class="text-sm text-justify">
                    {!! $product->description !!}
                </p>
            </div>
        </div>
        <div class="lg:col-span-4 xl:col-span-5">
            <div class="hidden lg:flex flex-row mb-10 justify-between">
                <h2 class="text-3xl font-bold mb-3">Rp.{{ idr($product->reseller_price) }},-</h2>
                {{--<div class="flex border-1-red-tokogampang px-5 justify-between space-x-10">
                    <i class="text-red-tokogampang my-auto fas fa-plus"></i>
                    <p class="my-auto font-bold">1</p>
                    <i class="text-red-tokogampang my-auto fas fa-minus"></i>
                </div>--}}
            </div>
            <form id="buy-now-form" action="" method="post" class="grid gap-6">
                @CSRF
                @method('post')
                <div class="grid gap-6" id="data-penerima">
                    <div class="flex justify-between font-bold">
                        <h4 class="border-b-2 inline-block" style="border-color:{{ $reseller->customStore->theme_color }}">Data Penerima</h4>
                    </div>
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
                </div>
                <div class="grid gap-6 hidden" id="alamat-penerima">
                    <div class="flex justify-between font-bold ">
                        <h4 class="border-b-2 inline-block" style="border-color:{{ $reseller->customStore->theme_color }}">Alamat Penerima</h4>
                    </div>
                    <div class="">
                        <select style="border: solid white !important;" class="w-full p-1 bg-white" id="single-location-search" name="destination_code" required></select>
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
                    @if($product->fulfillment_type !== \App\Models\Product::INHOUSE)
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
                    @endif
                </div>
                <div class="grid gap-6 hidden" id="metode-pembayaran">
                    <div class="flex justify-between font-bold ">
                        <h4 class="border-b-2 inline-block" style="border-color:{{ $reseller->customStore->theme_color }}">Metode Pembayaran</h4>
                    </div>
                    <label class="space-x-3 flex w-full border border-1 border-gray-400 text-md rounded-md p-1 payment-method">
                        <input class="my-auto" name="payment_method" value="direct_transfer" type="radio" checked>
                        <div class="flex space-x-3">
                            <svg class="object-center object-contain w-6 h-6" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="11.5" fill="{{ $reseller->customStore->theme_color }}" />
                                <path d="M11.5182 4L5 7.13841V8.77118H18.5V7.12975L11.5182 4ZM17.6 7.87118H5.9V7.70395L11.5318 4.99236L17.6 7.71261V7.87118Z" fill="white" />
                                <path d="M5.8999 15.071H17.5999V15.971H5.8999V15.071Z" fill="white" />
                                <path d="M5 16.6462H18.5V17.5462H5V16.6462Z" fill="white" />
                                <path d="M6.125 9.67114H7.025V14.1711H6.125V9.67114Z" fill="white" />
                                <path d="M16.4751 9.67114H17.3751V14.1711H16.4751V9.67114Z" fill="white" />
                                <path d="M13.7754 9.67114H14.6754V14.1711H13.7754V9.67114Z" fill="white" />
                                <path d="M8.8252 9.67114H9.7252V14.1711H8.8252V9.67114Z" fill="white" />
                                <path d="M11.3003 9.67114H12.2003V14.1711H11.3003V9.67114Z" fill="white" />
                            </svg>
                            <label class="my-auto text-gray-500">Direct Transfer</label>
                        </div>
                    </label>
                    <label class="space-x-3 flex w-full border border-1 border-gray-400 text-md rounded-md p-1 payment-method">
                        <input class="my-auto" name="payment_method" value="virtual_account" type="radio">
                        <div class="flex space-x-3">
                            <svg class="object-center object-contain w-6 h-6" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="11.5" fill="{{ $reseller->customStore->theme_color }}" />
                                <path d="M11.5182 4L5 7.13841V8.77118H18.5V7.12975L11.5182 4ZM17.6 7.87118H5.9V7.70395L11.5318 4.99236L17.6 7.71261V7.87118Z" fill="white" />
                                <path d="M5.8999 15.071H17.5999V15.971H5.8999V15.071Z" fill="white" />
                                <path d="M5 16.6462H18.5V17.5462H5V16.6462Z" fill="white" />
                                <path d="M6.125 9.67114H7.025V14.1711H6.125V9.67114Z" fill="white" />
                                <path d="M16.4751 9.67114H17.3751V14.1711H16.4751V9.67114Z" fill="white" />
                                <path d="M13.7754 9.67114H14.6754V14.1711H13.7754V9.67114Z" fill="white" />
                                <path d="M8.8252 9.67114H9.7252V14.1711H8.8252V9.67114Z" fill="white" />
                                <path d="M11.3003 9.67114H12.2003V14.1711H11.3003V9.67114Z" fill="white" />
                            </svg>
                            <label class="my-auto text-gray-500">Virtual Account</label>
                        </div>
                    </label>
                    <label class="space-x-3 flex w-full border border-1 border-gray-400 text-md rounded-md p-1 payment-method select-cod">
                        <input class="my-auto" name="payment_method" :checked value="cash_on_delivery" type="radio">
                        <div class="flex space-x-3">
                            <svg class="object-center object-contain w-6 h-6" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="11.5" fill="{{ $reseller->customStore->theme_color }}" />
                                <path d="M5.125 11.5H11.5V12.5625H5.125V11.5Z" fill="white" />
                                <path d="M4.0625 8.84375H9.375V9.90625H4.0625V8.84375Z" fill="white" />
                                <path d="M18.8946 11.8219L17.3009 8.10319C17.26 8.0076 17.1919 7.92614 17.1051 7.86891C17.0183 7.81167 16.9166 7.78119 16.8126 7.78125H15.2189V6.71875C15.2189 6.57785 15.1629 6.44273 15.0633 6.3431C14.9637 6.24347 14.8285 6.1875 14.6876 6.1875H6.18765V7.25H14.1564V13.9204C13.9143 14.0609 13.7025 14.248 13.5331 14.4709C13.3636 14.6937 13.24 14.9479 13.1693 15.2188H9.83096C9.70166 14.718 9.39415 14.2815 8.96608 13.9912C8.53801 13.701 8.01877 13.5768 7.50568 13.6419C6.99259 13.7071 6.52088 13.9572 6.17898 14.3453C5.83707 14.7333 5.64844 15.2328 5.64844 15.75C5.64844 16.2672 5.83707 16.7667 6.17898 17.1547C6.52088 17.5428 6.99259 17.7929 7.50568 17.8581C8.01877 17.9232 8.53801 17.799 8.96608 17.5088C9.39415 17.2185 9.70166 16.782 9.83096 16.2812H13.1693C13.2849 16.7372 13.5492 17.1416 13.9204 17.4304C14.2916 17.7193 14.7485 17.8761 15.2189 17.8761C15.6893 17.8761 16.1462 17.7193 16.5174 17.4304C16.8886 17.1416 17.1529 16.7372 17.2685 16.2812H18.4064C18.5473 16.2812 18.6824 16.2253 18.782 16.1257C18.8817 16.026 18.9376 15.8909 18.9376 15.75V12.0312C18.9377 11.9593 18.923 11.8881 18.8946 11.8219ZM7.7814 16.8125C7.57125 16.8125 7.36583 16.7502 7.1911 16.6334C7.01638 16.5167 6.88019 16.3507 6.79978 16.1566C6.71936 15.9625 6.69832 15.7488 6.73931 15.5427C6.78031 15.3366 6.8815 15.1473 7.0301 14.9987C7.17869 14.8501 7.36801 14.7489 7.57411 14.7079C7.78022 14.6669 7.99385 14.688 8.188 14.7684C8.38214 14.8488 8.54808 14.985 8.66483 15.1597C8.78158 15.3344 8.8439 15.5399 8.8439 15.75C8.84362 16.0317 8.73158 16.3018 8.53239 16.501C8.33319 16.7002 8.0631 16.8122 7.7814 16.8125ZM15.2189 8.84375H16.462L17.601 11.5H15.2189V8.84375ZM15.2189 16.8125C15.0088 16.8125 14.8033 16.7502 14.6286 16.6334C14.4539 16.5167 14.3177 16.3507 14.2373 16.1566C14.1569 15.9625 14.1358 15.7488 14.1768 15.5427C14.2178 15.3366 14.319 15.1473 14.4676 14.9987C14.6162 14.8501 14.8055 14.7489 15.0116 14.7079C15.2177 14.6669 15.4314 14.688 15.6255 14.7684C15.8196 14.8488 15.9856 14.985 16.1023 15.1597C16.2191 15.3344 16.2814 15.5399 16.2814 15.75C16.2811 16.0317 16.1691 16.3018 15.9699 16.501C15.7707 16.7002 15.5006 16.8122 15.2189 16.8125ZM17.8751 15.2188H17.2685C17.1514 14.7637 16.8867 14.3603 16.5158 14.0719C16.1449 13.7835 15.6888 13.6263 15.2189 13.625V12.5625H17.8751V15.2188Z" fill="white" />
                            </svg>
                            <label class="my-auto text-gray-500">COD</label>
                        </div>
                    </label>
                    <label class="my-auto text-gray-500 info-cod" style="margin: 0; padding: 0; font-size: 10px">
                        Biaya COD sebesar {{ $fee->value ?? 0}}% dari Total Pembelian<br>
                        Nilai COD minimal sebesar Rp {{number_format($min->value ?? 0, 2, ",", ".")}}<br>
                        Nilai COD maksimal sebesar Rp {{number_format(@$max->value ?? 0, 2, ",", ".")}}
                    </label>
                    <label class="space-x-3 flex w-full border border-1 border-gray-400 text-md rounded-md p-1 payment-method select-cod">
                        <div class="flex space-x-3">
                            <label class="my-auto text-gray-500" id="cod-fee"></label>
                        </div>
                    </label>
                    <div class="w-full border border-1 border-gray-400 text-md rounded-md p-1 bg-white">
                        <select class="bg-white text-sm w-full" name="shipping_method" id="courier">
                            <option value="" selected>- Pilih Kurir -</option>
                        </select>
                        @if($errors->has('shipping_method'))
                        <span class="absolute right-0 text-red-700 font-medium text-xs">{{ $errors->first('shipping_method') }}
                            <i class="fas fa-info-circle ml-2"></i>
                        </span>
                        @endif
                    </div>
                    <div class="">
                        <input class="border border-1 border-gray-400 text-md rounded-md p-1" style="text-transform: uppercase" name="voucher_code" type="text" placeholder="Kode Voucher / Potongan Harga">
                        <button type="button" id="use-voucher" onclick="useVoucher(this)" class="px-8 py-1.5 rounded-lg font-bold text-white" style="background-color:{{ $reseller->customStore->theme_color }}">Gunakan</button><br />
                        <span class="text-red-700 font-medium text-xs error-voucher-code" style="display: none">
                            <i class="fas fa-info-circle ml-2">Tidak valid</i>
                        </span>
                        <span class="text-red-700 font-medium text-xs min-voucher-code" style="display: none">
                            <i class="fas fa-info-circle ml-2">total harga kurang dari diskon</i>
                        </span>
                        <span class="text-green-700 font-medium text-xs success-voucher-code" style="display: none">
                            <i class="fas fa-check-circle ml-2">valid</i>
                        </span>
                    </div>
                </div>
                <div>
                    <i id="discount-result"></i>
                </div>

                <div class="hidden">
                    <input type="hidden" id="cod_fee" name="cod_fee" value="{{ $fee->value ?? 0 }}">
                    <input type="hidden" id="cod_max" name="cod_max" value="{{ $max->value ?? 0 }}">
                    <input type="hidden" id="cod_min" name="cod_min" value="{{ $min->value ?? 0 }}">
                    <input type="hidden" id="product_id" name="product_id" value="{{ @$product->id }}">
                    <input type="hidden" id="voucher_discount" name="voucher_discount" value=0 />
                    <input type="hidden" id="category_id" name="category_id" value="{{ $product->category_id }}">
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
                    <input type="hidden" id="shipping_province" name="shipping_province" value="">
                    <input type="hidden" id="shipping_city" name="shipping_city" value="">
                    <input type="hidden" id="shipping_subdistrict" name="shipping_subdistrict" value="">
                    <input type="hidden" id="fulfillment_type" name="fulfillment_type" value="{{ $product->fulfillment_type }}">
                    <input type="submit" id="submit-form" class="hidden" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="buy-now fixed bottom-0 left-0 right-0 bg-white" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
    <div class="main-container p-4 md:px-16">
        <div class="grid lg:grid-cols-10 xl:grid-cols-12 gap-4 items-center">
            <div class="lg:col-span-6 xl:col-span-8">
                <div class="flex flex-row mr-3 md:mr-0 justify-between">
                    <h1 class="text-xl font-bold two-line-ellipsis">{{ $product->name }}</h1>
                    {{--<div class="flex lg:hidden flex-row">
                        <div class="flex border-1-red-tokogampang px-5 justify-between space-x-5">
                            <i class="text-red-tokogampang my-auto fas fa-plus"></i>
                            <p class="my-auto font-bold">1</p>
                            <i class="text-red-tokogampang my-auto fas fa-minus"></i>
                        </div>
                    </div>--}}
                </div>
            </div>
            <div class="lg:col-span-4 xl:col-span-4 flex justify-between">
                <div class="flex flex-col mr-3 md:mr-0">
                    <h4>Total Harga</h4>
                    <h4 id="total-price" class="text-lg">Rp.{{ idr($product->reseller_price) }},-</h4>
                </div>
                <div>
                    <button id="buy-now-button" class="px-8 py-2 rounded-lg font-bold text-white" style="background-color:{{ $reseller->customStore->theme_color }}" {{ $product->is_in_stock || ($product->qty - @$deducter) <= 0  ? '' : 'disabled' }}>
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! @$product->supplier->facebook_messanger_scripts !!}
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
        let format = new Intl.NumberFormat('ID').format(angka);
        return prefix + ' ' + format;
    }
</script>
<script>
    $('#data-penerima :input').on('input change', function() {
        let i = 0
        $('#data-penerima :input').each(function(index, val) {
            if (val.value) {
                ++i;
            }
        })
        i == $('#data-penerima :input').length ? $('#alamat-penerima').removeClass('hidden') : '';
    });
    $('#alamat-penerima :input').on('input change', function() {
        let i = 0
        $('#alamat-penerima :input').each(function(index, val) {
            if (val.value) {
                ++i;
            }
        })
        i == $('#alamat-penerima :input').length ? $('#metode-pembayaran').removeClass('hidden') : '';
    });
</script>
<script>
    $('#single-location-search').select2({
        placeholder: 'Masukan Kota / Kecamatan ',
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
        if (qty) {
            $.ajax({
                type: 'GET',
                url: "{{ route('available-warehouses') }}",
                data: stringParams,
                beforeSend: function() {
                    $('#warehouse').html('<option value="" disabled="disabled" selected>Memuat Lokasi...</option>');
                },
                success: function(html) {
                    $("#warehouse").html(html);
                }
            });
        }
    }
    let qty = '';
    let destination_code = '';
    let discount = 0;
    let voucherType = '';
    let voucherNominal = 0;
    $('#courier').change(function() {
        let payment = $('input[name=payment_method]:checked').val();
        let cod = 0;
        if (payment === "cash_on_delivery") {
            cod = parseInt($('input[name=cod_fee]').val());
        }
        $("#shipping_method").val($('option:selected', this).data('method'));
        $("#shipping_cost").val($('option:selected', this).data('cost'));
        $("#shipping_service").val($('option:selected', this).data('service'));
        let voucherDiscount = (voucherType == 'NOMINAL') ? parseInt(discount) : 0;
        voucherDiscount = (voucherType == 'PERCENTAGE') ? parseInt(voucherNominal) / 100 * parseInt($('input[name=qty]').val()) * parseInt($('input[name=price]').val()) : 0;
        let totalFee = parseInt($('input[name=qty]').val()) * parseInt($('input[name=price]').val());
        let codFee = cod / 100 * totalFee;
        let totalPrice = codFee + totalFee + parseInt($("#shipping_cost").val()) - voucherDiscount;
        $('#cod-fee').text("Biaya COD : " + formatRupiah(codFee || 0));
        $('#total-price').text(formatRupiah(totalPrice || 0));
    });
    let cod;
    $('#single-location-search').change(function() {
        destination_code = $('#single-location-search option:selected').val();
        let provinceId = $('#province_id').val();
        let cityId = $('#city_id').val();
        let weight = $('input[name=weight]').val();
        let warehouse_id = $('select[name=warehouse_id]').val();
        let qty = $('input[name=qty]').val();
        let product_id = $('input[name=product_id]').val();
        let payment = $('input[name=payment_method]:checked').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/data-cost') }}",
            data: 'warehouse_id=' + warehouse_id + '&destination_code=' + destination_code + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id) + "&payment_method=" + payment,
            beforeSend: function() {
                $("#courier").html('<option value="" selected>- Pilih Kurir -</option>');
            },
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
                    $('.select-cod').hide();
                    $('.info-cod').hide();
                    Swal.fire({
                        html: "Wilayah anda tidak mendukung Layanan COD",
                        showCloseButton: true,
                        showConfirmButton: true,
                        confirmButtonColor: '#EB1C24'
                    }).then(function(event) {
                        parentShareModal.append(shareModal);
                    });
                } else {
                    $('.select-cod').show();
                    $('.info-cod').show();
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
        let provinceId = $('#province_id').val();
        let cityId = $('#city_id').val();
        let weight = $('input[name=weight]').val();
        let warehouse_id = $('select[name=warehouse_id]').val();
        let qty = $('input[name=qty]').val();
        let product_id = $('input[name=product_id]').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/data-cost') }}",
            data: 'warehouse_id=' + warehouse_id + '&destination_code=' + destination_code + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id) + "&payment_method=" + payment,
            beforeSend: function() {
                $("#courier").html('<option value="" selected>- Pilih Kurir -</option>');
            },
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
            error: function(data) {}
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
        destination_code = $('#single-location-search option:selected').val();
        let provinceId = $('#province_id').val();
        let cityId = $('#city_id').val();
        let weight = $('input[name=weight]').val();
        let origin = $('input[name=origin]').val();
        qty = $('input[name=qty]').val();
        let product_id = $('input[name=product_id]').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/data-cost') }}",
            data: 'origin=' + parseInt(origin) + '&destination_code=' + destination_code + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id),
            beforeSend: function() {
                $('#courier').html('<option value="" disabled="disabled" selected> - Pilih Ongkir -</option>');
            },
            success: function(data) {
                $("#courier").html(data);
            },
            error: function(data) {}
        });
        getAvailableWarehouses('destination_code=' + (destination_code || '') + '&qty=' + qty + '&product_id={{ $product->id }}');
    });
    $('#qty').on('input change', function() {
        let payment = $('input[name=payment_method]:checked').val();
        let cod = 0;
        if (payment === "cash_on_delivery") {
            cod = parseInt($('input[name=cod_fee]').val());
        }
        let voucherDiscount = (voucherType == 'NOMINAL') ? parseInt(discount) : 0;
        voucherDiscount = (voucherType == 'PERCENTAGE') ? parseInt(voucherNominal) / 100 * parseInt($('input[name=qty]').val()) * parseInt($('input[name=price]').val()) : 0;
        let totalFee = parseInt($('input[name=qty]').val()) * parseInt($('input[name=price]').val());
        let codFee = cod / 100 * totalFee;
        let totalPrice = codFee + totalFee + parseInt($("#shipping_cost").val()) - voucherDiscount;
        $('#cod-fee').text("Biaya COD : " + formatRupiah(codFee || 0));
        $('#total-price').text(formatRupiah(totalPrice || 0));
        if (voucherType) {
            $('#discount-result').text('Anda telah berhemat ' + formatRupiah(voucherDiscount) + '!');
        }
    });
    $('#qty').change();
    $('input[name=payment_method]').change(function() {
        destination_code = $('#single-location-search option:selected').val();
        let provinceId = $('#province_id').val();
        let cityId = $('#city_id').val();
        let weight = $('input[name=weight]').val();
        let warehouse_id = $('select[name=warehouse_id]').val();
        let qty = $('input[name=qty]').val();
        let product_id = $('input[name=product_id]').val();
        let payment = $('input[name=payment_method]:checked').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/shipment/data-cost') }}",
            data: 'warehouse_id=' + warehouse_id + '&destination_code=' + destination_code + "&weight=" + parseInt(weight) + "&qty=" + parseInt(qty) + "&product_id=" + parseInt(product_id) + "&payment_method=" + payment,
            beforeSend: function() {
                $("#courier").html('<option value="" selected>- Pilih Kurir -</option>');
            },
            success: function(data) {
                $("#courier").html(data);
                $("#courier").change();
            },
        });
    });
</script>
<script>
    $('#buy-now-button').click(function(event) {
        let inputPhone = $('input[name=customer_phone]');
        let inputPhoneVal = inputPhone.val();
        let firstNumber = inputPhoneVal.substr(0, 1);
        let prefixNumber = '62';
        if (firstNumber == '0') {
            let fixNumber = prefixNumber + inputPhoneVal.substr(1, inputPhoneVal.length);
            inputPhone.val(parseInt(fixNumber));
        }
        let formData = {
            'product_id': $('input[name=product_id]').val(),
            'category_id': $('input[name=category_id]').val(),
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
            'shipping_zip': $('input[name=shipping_zip]').val(),
            'shipping_method': $("input[name=shipping_method]").val(),
            'shipping_cost': $("input[name=shipping_cost]").val(),
            'shipping_service': $("input[name=shipping_service]").val(),
            'payment_method': $('input[name=payment_method]:checked').val(),
            'voucher_code': $('input[name=voucher_code]').val()
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '{{ route("reseller.checkout.store") }}',
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

    function useVoucher(e) {
        $.ajax({
            type: 'POST',
            url: '{{ route("reseller.checkout.use-voucher",) }}',
            data: {
                _token: "{{ csrf_token() }}",
                voucher_code: $('input[name=voucher_code]').val(),
                price: $('input[name=price]').val(),
                qty: $('input[name=qty]').val(),
                product_id: '{{ $product->id }}',
                category_id: '{{ $product->category_id }}'
            },
            dataType: 'json',
            encode: true,
            beforeSend: function() {
                $('#use-voucher').attr('disabled', true);
                $('#use-voucher').css('cursor', 'default');
                $('#use-voucher').html('<i class="fas fa-sync fa-spin px-12"></i>');
                $('#buy-now-button').attr('disabled', true);
                $('#buy-now-button').css('cursor', 'default');
                $('#buy-now-button').html('<i class="fas fa-sync fa-spin px-12"></i>');
                $('#discount-result').text('');
                $('input[name=voucher_discount]').val(0);
                $('.success-voucher-code').hide();
                $('.error-voucher-code').hide();
                $('.min-voucher-code').hide();
                $('#discount-result').text('');
                discount = 0;
                voucherType = '';
                voucherNominal = 0;
            },
            success: function(data) {
                setTimeout(function() {
                    let totalPrice = parseInt($('input[name=qty]').val() * $('input[name=price]').val()) + parseInt($("#shipping_cost").val());
                    discount = data.discount;
                    voucherType = data.voucher_type;
                    voucherNominal = data.voucher_nominal;
                    if (totalPrice >= discount) {
                        $('.success-voucher-code').show();
                        $('.error-voucher-code').hide();
                        $('.min-voucher-code').hide();
                        $('#total-price').text(formatRupiah(totalPrice - data.discount));
                        $('input[name=voucher_discount]').val(data.discount);
                        $('#discount-result').text('Anda telah berhemat ' + formatRupiah(data.discount) + '!');
                    } else {
                        discount = 0;
                        voucherType = '';
                        voucherNominal = 0;
                        $('input[name=voucher_code]').val(null);
                        $('.min-voucher-code').show();
                    }
                    $('#buy-now-button').attr('disabled', false);
                    $('#buy-now-button').css('cursor', 'pointer');
                    $('#buy-now-button').text('Bayar Sekarang');
                    $('#use-voucher').attr('disabled', false);
                    $('#use-voucher').css('cursor', 'pointer');
                    $('#use-voucher').html('Gunakan');
                }, 200)
            },
            error: function(err) {
                setTimeout(function() {
                    $('#buy-now-button').attr('disabled', false);
                    $('#buy-now-button').css('cursor', 'pointer');
                    $('#buy-now-button').text('Bayar Sekarang');
                    $('#use-voucher').attr('disabled', false);
                    $('#use-voucher').css('cursor', 'pointer');
                    $('#use-voucher').html('Gunakan');
                    $('.error-voucher-code').show();
                    $('.success-voucher-code').hide();
                }, 200)
            }
        })
    }
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

@section('pixel_scripts')
@include('shared.pixel_scripts', ['reseller' => @$reseller, 'product' => $product, 'target_page' => 'CHECKOUT'])
@endsection