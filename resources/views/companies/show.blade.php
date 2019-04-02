@extends('layouts.app')

@section('content')
    <h1>{{ ctype_upper($company->name) }}</h1>
    <a href="{{ route('companies.edit', $company->id) }}">Edit company</a>
    <br>
    <a href="{{ route('employees.create', $company->id) }}">New employee</a>

    <div>
        <ul>
            <li>{{ $company->name }}</li>
            <li>{{ $company->city }}</li>
            <li>{{ $company->website }}</li>
        </ul>
    </div>

    <div>
        <table>
            <tr>
                <th>Employees</th>
            </tr>
            @foreach($company->employees as $employee)
            <tr>
                <td>
                    <a href="{{ route('employees.edit',[$company->id, $employee->id]) }}">
                        {{ $employee->name }}
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection