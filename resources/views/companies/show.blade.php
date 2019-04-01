@extends('layouts.app')

@section('content')
    <h1>{{ ctype_upper($company->name) }}</h1>

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
            <tr>
                @foreach($company->employee() as $employee)
                    <td>
                        $employee->name;
                    </td>
                @endforeach
            </tr>
        </table>
    </div>

    <a href=""></a>
@endsection