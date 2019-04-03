@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Company info') }}
                        <div>
                            @can('update', $company)
                                <a href="{{ route('companies.edit', $company->id) }}">Edit company</a>
                                <a href="{{ route('employees.create', $company->id) }}">New employee</a>
                            @endcan
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <table>
                                @foreach($company->toArray() as $key => $attribute)
                                    @if($attribute !== null)
                                        <tr>
                                            <th>{{ ucfirst($key . ':') }}</th>
                                            <td>{{ $attribute }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>

                        <br>

                        <div>
                            <table>
                                <tr>
                                    <th>Employees</th>
                                </tr>
                                @foreach($company->employees as $employee)
                                    <tr>
                                        <td>
                                            @can('update', $company)
                                                <a href="{{ route('employees.edit',[$company->id, $employee->id]) }}">
                                                    {{ ucfirst($employee->name) }}
                                                </a>
                                            @endcan
                                            @cannot('update', $company)
                                                {{ ucfirst($employee->name) }}
                                            @endcannot
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>


                    </div>

                    {{--<div class="card-body">
                        <div class="pagination-sm">
                            {{ $companies->links() }}
                        </div>
                    </div>--}}

                </div>
            </div>
        </div>
    </div>
    </div>




   {{-- <h1>Company info</h1>

    @can('update', $company)
    <a href="{{ route('companies.edit', $company->id) }}">Edit company</a>
    <br>
    <a href="{{ route('employees.create', $company->id) }}">New employee</a>
    @endcan

    <br>

    <div>
        <table>
            @foreach($company->toArray() as $key => $attribute)
                @if($attribute !== null)
                    <tr>
                        <th>{{ ucfirst($key . ':') }}</th>
                        <td>{{ $attribute }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>

    <br>

    <div>
        <table>
            <tr>
                <th>Employees</th>
            </tr>
            @foreach($company->employees as $employee)
            <tr>
                <td>
                    @can('update', $company)
                        <a href="{{ route('employees.edit',[$company->id, $employee->id]) }}">
                            {{ ucfirst($employee->name) }}
                        </a>
                    @endcan
                    @cannot('update', $company)
                        {{ ucfirst($employee->name) }}
                    @endcannot
                </td>
            </tr>
            @endforeach
        </table>
    </div>--}}
@endsection