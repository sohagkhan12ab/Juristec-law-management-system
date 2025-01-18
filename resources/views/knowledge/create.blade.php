@extends('layouts.app')

@section('page-title', __('Create Knowledge'))

@section('action-button')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('knowledge') }}">{{ __('Knowledge') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create') }}</li>
@endsection

@section('content')
    <div class="col-12">
        <div class="card shadow-none rounded-0 border-bottom">
            <div class="card-body">
                <div class="row">
                    <div class="float-end">
                        <a href="#" data-size="md" data-ajax-popup-over="true"
                            data-url="{{ route('generate', ['knowledge']) }}" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="{{ __('Generate') }}"
                            data-title="{{ __('Generate content with AI') }}" class="btn btn-primary btn-sm float-end">
                            <i class="fas fa-robot"></i>
                            {{ __('Generate with AI') }}
                        </a>
                    </div>
                </div>

                <form method="post" class="needs-validation" action="{{ route('knowledge.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">{{ __('Title') }}</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" placeholder="{{ __('Title of the Knowledge') }}" name="title"
                                    class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    value="{{ old('title') }}" autofocus>
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">{{ __('Category') }}</label>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-select" name="category">
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">{{ __('Description') }}</label>
                            <div class="col-sm-12 col-md-12">
                                <textarea name="description" class="form-control summernote {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Enter Description') }}">{{ old('description') }}</textarea>
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label"></label>
                            <div class="col-sm-12 col-md-12 text-end">
                                <button
                                    class="btn btn-primary btn-block btn-submit"><span>{{ __('Add') }}</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
    <script src="{{ asset('css/summernote/summernote-bs4.js') }}"></script>
    <script>
        $('.summernote').summernote({
            dialogsInBody: !0,
            minHeight: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough']],
                ['list', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'unlink']],
            ]
        });
    </script>
@endpush
