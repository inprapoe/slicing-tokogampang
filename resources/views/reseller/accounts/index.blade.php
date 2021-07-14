@extends('layouts.reseller')
@push('styles')
<style>
    #photo:hover #change-photo {
        display: block !important;
    }

    @media (max-width:768px) {
        .rekening-list {
            font-size: x-small;
        }
    }

    @media (min-width:768px) {
        .rekening-list {
            font-size: medium;
        }
    }

    #container-photo:hover #update-photo {
        display: flex !important;
    }

    label.error {
        color: #e53e3e;
        font-size: 12px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="lg:flex lg:py-24 pb-12 lg:px-10">
    @include('reseller.banks.sidebar')
    <div class="lg:flex-1 justify-between bg-box-shadow rounded-lg md:p-16 p-4 mx-4 lg:mx-0">
        <div class="flex flex-col-reverse lg:flex-row w-full">
            <div class="w-full flex-1">
                <h2 class="  text-2xl text-left font-bold  mb-8 mt-5 lg:mb-5 lg:mt-0  ">Profile Saya</h2>
                <form id="reseller-profile-form" action="{{ route('reseller.accounts.update') }}" class="text-sm" method="POST">
                    @CSRF
                    @method('post')
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Nama Toko</label>
                        <input class="bg-transparent mr-1" type="text" disabled name="shop_name" value="{{ $reseller->shop_name }}">
                        @if($errors->has('shop_name'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('shop_name') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Username</label>
                        <input class="bg-transparent mr-1" type="text" disabled name="username" value="{{ $reseller->username }}">
                        @if($errors->has('username'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Nama Lengkap</label>
                        <input class="bg-transparent mr-1" type="text" disabled name="name" value="{{ $model->name }}">
                        @if($errors->has('name'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Email</label>
                        <input class="bg-transparent mr-1" disabled type="email" name="email" value="{{ $reseller->email }}">
                        @if($errors->has('email'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">No. Telp</label>
                        <input name="phone" type="tel" placeholder="No Handphone" class="bg-transparent text-sm placeholder-gray-400 appearance-none w-full py-2 leading-tight" value="{{ $reseller->user->phone }}" disabled onkeypress='validateNumeric(event)' maxlength="13" min="10">
                        @if($errors->has('phone'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <button id="submit-button" type="submit" class="hidden"></button>
                </form>
                <div class="w-full flex mt-10 lg:mt-0 gap-2 lg:gap-4">
                    <label id="submit-button-label" class="flex justify-center items-center cursor-pointer text-white text-xs lg:text-sm px-4 md:px-10 text-center bg-green-gradient rounded-md" style="display: none;" for="submit-button">
                        Simpan
                    </label>
                    <button id="edit-form" class="cursor-pointer border-gray rounded-md px-4 md:px-8 md:py-1 text-xs lg:text-sm text-center">
                        Edit Profile
                    </button>
                    <a href="{{ route('reseller.accounts.edit.password') }}" class="flex justify-center items-center cursor-pointer text-white rounded-md px-4 md:px-8 md:py-1 text-xs lg:text-sm text-center" style="background-color:{{ $reseller->customStore->theme_color }}">
                        Ubah Password
                    </a>
                </div>

                <div class="text-sm h-full mt-16">
                    <h2 class="  text-2xl text-left font-bold  mb-8 mt-5 lg:mb-5 lg:mt-0">Kategori Toko Saya</h2>
                    <form action="{{ route('reseller.accounts.update.category') }}" method="POST">
                        @method('post')
                        @CSRF
                        <select class="categories w-full" name="category_id[]" multiple="multiple" data-placeholder="Pilih kategori toko">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id,  $reseller->categoriesId()) ?  'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="mt-4">
                            <button class="text-white rounded-md px-4 md:px-8 md:py-1 text-xs lg:text-sm" style="background-color:{{ $reseller->customStore->theme_color }}">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col justify-between w-full lg:w-1/2">
                <div id="container-photo" class="relative rounded-lg mx-auto flex-shrink-0 overflow-hidden">
                    <img class="object-center object-cover profile-photo rounded-lg w-64 h-64 mx-auto" src="{{ asset($reseller->getPhoto()) }}" alt="Foto Profile">
                    <form id="update-photo" class="cursor-pointer rounded-lg absolute top-0 bottom-0 right-0 left-0 bg-black bg-opacity-25 justify-center items-center hidden" action="" method="post" enctype="multipart/form-data">
                        @CSRF
                        @method('post')
                        <label for="input-photo" class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                            <img class="cursor-pointer w-32 absolute" src="{{ asset('reseller-theme/images/icons/camera1.svg') }}" alt="">
                        </label>
                        <input type="file" name="photo" id="input-photo" class="rounded-lg cursor-pointer h-full opacity-0">
                    </form>
                    <div id="loader-photo" class="rounded-lg  absolute top-0 bottom-0 right-0 left-0 bg-black bg-opacity-25  justify-center items-center hidden">
                        <i class="fas fa-spinner fa-pulse text-white text-6xl"></i>
                    </div>
                </div>
                @if($errors->has('photo'))
                <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
                @endif
            </div>
        </div>

        <div class="flex flex-col-reverse lg:flex-row w-full mt-20">
            <div class="w-full flex-1">
                <h2 class="  text-2xl text-left font-bold  mb-8 mt-5 lg:mb-5 lg:mt-0">Sosial Media Saya</h2>
                <form id="reseller-sosmed-form" action="{{ route('reseller.accounts.updateSosmed') }}" class="text-sm" method="POST">
                    @CSRF
                    @method('post')
                    <div class="flex flex-col mb-6">
                        <label class="font-bold text-md" for="">Facebook</label>
                        <input class="bg-transparent mr-1" type="text" disabled name="facebook" value="{{ $reseller->facebook_url ? $reseller->facebook_url : '-' }}" placeholder="https://www.facebook.com/nama-toko-anda">
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Twitter</label>
                        <input class="bg-transparent mr-1" type="text" disabled name="twitter" value="{{ $reseller->twitter_url ? $reseller->twitter_url : '-' }}" placeholder="https://www.twitter.com/nama-toko-anda">
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Instagram</label>
                        <input class="bg-transparent mr-1" type="text" disabled name="instagram" value="{{ $reseller->instagram_url ? $reseller->instagram_url : '-' }}" placeholder="https://www.instagram.com/nama-toko-anda">
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Tiktok</label>
                        <input class="bg-transparent mr-1" disabled type="text" name="tiktok" value="{{ $reseller->tiktok_url ? $reseller->tiktok_url : '-' }}" placeholder="https://www.tiktok.com/nama-toko-anda">
                    </div>
                    <button id="submit-sosmed-button" type="submit" class="hidden text-white rounded-md px-4 md:px-8 md:py-1 text-xs lg:text-sm" style="background-color:{{ $reseller->customStore->theme_color }}">Simpan</button>
                </form>
                <div class="w-full flex mt-10 lg:mt-0 gap-2 lg:gap-4">
                    <button id="edit-sosmed-form" class="cursor-pointer border-gray rounded-md px-4 md:px-8 md:py-1 text-xs lg:text-sm text-center">
                        Edit Sosial Media
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="absolute inset-0 bg-gray-500 z-30 bg-opacity-50 flex justify-center items-center -mt-16" id="loading" style="display:none"><i class="fas fa-spinner fa-pulse fa-4x text-white"></i></div>
@endsection

@push('scripts')
<script>
    $(document).on("click", "#edit-form", function() {
        $('#reseller-profile-form input').prop("disabled", false).css('border-bottom', '0.5px solid #4f4f4f');
        $(this).hide();
        $('#submit-button-label').show();
    });

    $(document).on("click", "#edit-sosmed-form", function() {
        $('#reseller-sosmed-form input').prop("disabled", false).css('border-bottom', '0.5px solid #4f4f4f');
        $(this).hide();
        $('#submit-sosmed-button').removeClass('hidden');
        let facebook = $('input[name=facebook]')
        let twitter = $('input[name=twitter]')
        let instagram = $('input[name=instagram]')
        let tiktok = $('input[name=tiktok]')

        if(facebook.val() === '-') {
            facebook.val('')
        }

        if(twitter.val() === '-') {
            twitter.val('')
        }

        if(instagram.val() === '-') {
            instagram.val('')
        }

        if(tiktok.val() === '-') {
            tiktok.val('')
        }
    });
</script>
<script>
    $('#reseller-profile-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '{{ route("reseller.accounts.update") }}',
            data: $(this).serializeArray(),
            dataType: 'json',
            encode: true,
            beforeSend: function() {
                $("#loading").show();
            },
            success: function(data) {
                if (data.success) {
                    toastr.success(data.message);
                    $('#reseller-profile-form input').prop("disabled", true).css('border-bottom', '0');
                    $("#edit-form").show();
                    $('#submit-button-label').hide();
                    $("#loading").hide();
                }
            },
            error: function(err) {
                $('input,select').parent().find('.error').remove();
                $.each(err.responseJSON.errors, function(index, value) {
                    let message = value.toString();
                    let htmlError = `<span class="text-red-500 text-xs font-medium error">${message}</span>`;
                    $(`input[name=${index}]`).parent().append(htmlError);
                    $("#loading").hide();
                });
            }
        });
    });
</script>
<script>
    $('#input-photo').on('change', function() {
        let fd = new FormData();
        let files = this.files[0];

        if (files != undefined) {
            fd.append('photo', files);
            fd.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route("reseller.accounts.update.photo") }}',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $("#loader-photo").addClass('flex').removeClass('hidden');
                },
                success: function(response) {
                    let photo = response.data;
                    setTimeout(function() {
                        $("#loader-photo").addClass("hidden");
                        $("#loader-photo").removeClass("flex");
                        $('.profile-photo').attr('src', '{{ url("/") }}' + '/' + photo);
                    }, 500);
                },
                error: function(response) {
                    console.log(response);
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        toastr.warning(value, key);
                    });
                    $("#loader-photo").addClass("hidden");
                    $("#loader-photo").removeClass("flex");
                }
            });
        }
    });
</script>
<!-- validation -->
<script src="{{ asset('js/store/validate.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.categories').select2();
    });
</script>
@endpush

