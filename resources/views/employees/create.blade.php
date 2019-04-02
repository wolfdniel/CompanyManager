@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New employee') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.index', $company->id) }}">
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
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                                <div class="col-md-4">
                                    <select name="company_id" class="custom-select" required>
                                        @foreach($myCompanies as $myCompany)
                                            @if($myCompany->id == $company->id)
                                                <option value="{{ $myCompany->id }}" selected>
                                                    {{ $myCompany->name }}
                                                </option>
                                            @else
                                                <option value="{{ $myCompany->id }}">
                                                    {{ $myCompany->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<body>
        <form method="post" action="{{ route('employees.index', $company->id) }}">
            {{ csrf_field() }}
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>
            
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            
            <div>
                <label for="phone">Phone number</label>
                <input type="tel" name="phone" value="{{ old('phone') }}">
            </div>

            <div>
                <label for="company_id">Company</label>
                <select name="company_id" required>
                    @foreach($myCompanies as $myCompany)
                        @if($myCompany->id == $company->id)
                            <option value="{{ $myCompany->id }}" selected>
                                {{ $myCompany->name }}
                            </option>
                        @else
                            <option value="{{ $myCompany->id }}">
                                {{ $myCompany->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button>Save</button>
        </form>
    </body>--}}
@endsection