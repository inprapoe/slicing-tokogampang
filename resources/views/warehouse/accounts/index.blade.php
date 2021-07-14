@extends('layouts.dashboard-warehouse')
@push('styles')
<style>
    label.error {
        color: #e53e3e;
        font-size: 12px;
    }
</style>
@endpush
@section('content')
<div class="">
    <div class="lg:flex-1 justify-between bg-box-shadow rounded-lg md:p-16 p-4 mx-4 lg:mx-0">
        <div class="flex flex-col lg:flex-row w-full ">
            <div class="w-full mr-8 mb-8">
                <h2 class="  text-2xl text-left font-bold  mb-8 mt-5 lg:mb-5 lg:mt-0  ">My Profile</h2>
                <form id="warehouse-profile-form" action="" class="text-sm" method="POST">
                    @CSRF
                    @method('post')

                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Username</label>
                        <input class="bg-transparent mr-1" type="text" disabled name="username" value="{{ $model->username }}">
                        @if($errors->has('username'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">FullName</label>
                        <input class="bg-transparent mr-1" type="text" disabled name="name" value="{{ $model->name }}">
                        @if($errors->has('name'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">Email</label>
                        <input class="bg-transparent mr-1" disabled type="email" name="email" value="{{ $model->email }}">
                        @if($errors->has('email'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="  font-bold text-md" for="">No. Telp</label>
                        <input name="phone" type="tel" placeholder="No Handphone" class="bg-transparent text-sm placeholder-gray-400 appearance-none w-full py-2 leading-tight" value="{{ $model->phone }}" disabled onkeypress='validateNumeric(event)' maxlength="13" min="10">
                        @if($errors->has('phone'))
                        <span class="text-red-500 text-xs error font-medium">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <button id="submit-button" type="submit" class="hidden"></button>
                </form>
                <div class="w-full flex mt-10 lg:mt-0 gap-2 lg:gap-4">
                    <label id="submit-button-label" class="flex justify-center items-center cursor-pointer text-white text-xs lg:text-sm px-4 md:px-10 text-center bg-green-gradient rounded-md" style="display: none;" for="submit-button">
                        Submit
                    </label>
                    <button id="edit-form" class="cursor-pointer border-gray rounded-md px-4 md:px-8 md:py-1 text-xs lg:text-sm text-center">
                        Edit Profile
                    </button>
                    <a href="{{ route('warehouse.accounts.edit.password') }}" class="flex justify-center items-center cursor-pointer bg-red-tokogampang text-white rounded-md px-4 md:px-8 md:py-1 text-xs lg:text-sm text-center">
                        Change Password
                    </a>
                </div>
            </div>
            <div>
                <h2 class="  text-2xl text-left font-bold  mb-8 lg:mb-5">Warehouse Detail</h2>
                <div class="flex flex-col lg:flex-row text-sm">
                    <div class="">
                        <div class="flex flex-col mb-6">
                            <label class="  font-bold text-md" for="">Name</label>
                            <input class="bg-transparent mr-1" type="text" disabled value="{{ $warehouse->name }}">
                        </div>
                        <div class="flex flex-col mb-6">
                            <label class="  font-bold text-md" for="">Code</label>
                            <input class="bg-transparent mr-1" type="text" disabled value="{{ $warehouse->code }}">
                        </div>
                    </div>
                    <div class="">
                        <div class="flex flex-col mb-6">
                            <label class="  font-bold text-md" for="">Address</label>
                            <input class="bg-transparent mr-1" type="text" disabled value="{{ $warehouse->address }}">
                        </div>
                        <div class="flex flex-col mb-6">
                            <label class="  font-bold text-md" for="">City</label>
                            <input class="bg-transparent mr-1" type="text" disabled value="{{ $warehouse->regency }}">
                        </div>
                    </div>
                    <div class="">
                        <div class="flex flex-col mb-6">
                            <label class="  font-bold text-md" for="">District</label>
                            <input class="bg-transparent mr-1" type="text" disabled value="{{ $warehouse->subdistrict }}">
                        </div>
                        <div class="flex flex-col mb-6">
                            <label class="  font-bold text-md" for="">Province</label>
                            <input class="bg-transparent mr-1" type="text" disabled value="{{ $warehouse->province }}">
                        </div>
                    </div>
                    <div class="">
                        <div class="flex flex-col mb-6">
                            <label class="  font-bold text-md" for="">Postal code</label>
                            <input class="bg-transparent mr-1" type="text" disabled value="{{ $warehouse->postal_code }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="absolute inset-0 bg-gray-500 z-30 bg-opacity-50 flex justify-center items-center -mt-16" id="loading" style="display:none"><i class="fas fa-spinner fa-pulse fa-4x text-white"></i></div>
@endsection

@section('scripts')
<script>
    $(document).on("click", "#edit-form", function() {
        $('#warehouse-profile-form input').prop("disabled", false).css('border-bottom', '0.5px solid #4f4f4f');
        $(this).hide();
        $('#submit-button-label').show();
    });
</script>
<script>
    $('#warehouse-profile-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '{{ route("warehouse.accounts.update") }}',
            data: $(this).serializeArray(),
            dataType: 'json',
            encode: true,
            beforeSend: function() {
                $("#loading").show();
            },
            success: function(data) {
                if (data.success) {
                    toastr.success(data.message);
                    $('#warehouse-profile-form input').prop("disabled", true).css('border-bottom', '0');
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
@endsection