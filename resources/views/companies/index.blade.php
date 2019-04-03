@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Companies') }}
                        <div>
                            <a href="{{ route('companies.create') }}">New</a>
                        </div>
                    </div>

                        <div class="card-body">

                            <div class="card-columns">
                                <ul>
                                    @foreach($companies as $company)
                                        <li>
                                            <a class="card-link" href="{{ route('companies.show', $company->id) }}">
                                                {{ $company->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="pagination-sm">
                                {{ $companies->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    {{--<div class="nav-link">
        <a href="{{ route('companies.create') }}">New</a>
    </div>

    <div>
        <ul>
            @foreach($companies as $company)
                <li>
                    <a href="{{ route('companies.show', $company->id) }}">
                        {{ $company->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="pagination-sm">
        {{ $companies->links() }}
    </div>--}}
@endsection