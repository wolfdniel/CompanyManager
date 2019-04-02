@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New company') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.index') }}">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ old('logo') }}">

                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

                                <div class="col-md-6">
                                    <input id="website" type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website') }}">

                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




{{--<h1>Edit company</h1>

<div>
    <form method="POST" action="{{ route('companies.update', $company->id) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $company->name }}" required>
        </div>

        <div>
            <label for="city">City</label>
            <input type="text" name="city" value="{{ $company->city }}" required>
        </div>

        <div>
            <label for="logo">Logo</label>
            <input type="file" name="logo" value="{{ $company->logo }}">
        </div>

        <div>
            <label for="website">Website</label>
            <input type="text" name="website" value="{{ $company->website }}">
        </div>

        <button class="btn">Save</button>
    </form>

    <form method="POST" action="{{ route('companies.destroy', $company->id) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <button>Delete</button>
    </form>
</div>--}}
@endsection