@extends('admin.layout')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css">
@endsection

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Agreement</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('agreements.index') }}">Agreement</a></li>
                <li class="breadcrumb-item active">Tambah Baru</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Agreement Baru</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('agreements.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}">
                                @if($errors->has('title'))
                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pages</label>
                            <div class="col-sm-10">
                                <select class="form-control {{ $errors->has('pages') ? ' is-invalid' : '' }}" name="pages" id="pages">
                                    <option value="product_owner" {{ old('pages') == 'product_owner' ? 'selected' : '' }}>Product Owner</option>
                                    <option value="marketer" {{ old('pages') == 'marketer' ? 'selected' : '' }}>Marketer</option>
                                </select>
                                @if($errors->has('pages'))
                                <div class="invalid-feedback">{{ $errors->first('pages') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="type">
                                    <option value="privacy_policy" {{ old('type') == 'policy' ? 'selected' : '' }}>Privacy Policy</option>
                                    <option value="terms_of_service" {{ old('type') == 'terms' ? 'selected' : '' }}>Terms Of Service</option>
                                    <option value="mou" {{ old('type') == 'mou' ? 'selected' : '' }}>MoU</option>
                                </select>
                                @if($errors->has('type'))
                                <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Text</label>
                            <div class="col-sm-10 {{ $errors->has('text') ? ' custom-is-invalid' : '' }}">
                                <textarea class="summernote" name="text">{{ old('text') }}</textarea>
                                @if($errors->has('text'))
                                <div class="custom-invalid-feedback" style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('text') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Attachment</label>
                            <div class="col-sm-10">
                                <input type="file" name="attachment" value="{{ old('attachment') }}">
                                @if($errors->has('attachment'))
                                <div class="custom-invalid-feedback" style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('attachment') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                                <a href="{{ route('agreements.index') }}" class="btn btn-default">Batal</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

<script>
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol']],
            ['view', ['fullscreen', 'help']],
        ]
    });
</script>
<script>
    let lookup = {
        'product_owner': {!! $productOwnerType !!},
        'marketer': {!! $marketerOwnerType !!}
    };
    
    $('select[name=pages]').on('change', function() {
        let selectValue = $(this).val();

        $('select[name=type] option').attr('disabled', false);

        $('select[name=type] option').map(function(){
            lookup[selectValue].includes($(this).val()) ?  $(this).attr('disabled', true) : '';
        });
    });

    $('select[name=pages]').change();
</script>
@endsection