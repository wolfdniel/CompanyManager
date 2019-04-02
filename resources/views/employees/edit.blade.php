@extends('layouts.app')

@section('content')
    <div>
    <form method="post" action="{{ route('employees.update',
    [$employee->company_id, $employee->id]) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $employee->name }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $employee->email }}" required>
        </div>

        <div>
            <label for="phone">Phone number</label>
            <input type="tel" name="phone" value="{{ $employee->phone }}">
        </div>

        <div>
            <label for="company_id">Company</label>
            <select name="company_id">
                @foreach($myCompanies as $myCompany)
                    @if($employee->company_id == $myCompany->id)
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

    <form method="post" action="{{ route('employees.destroy',
    [$employee->company_id, $employee->id]) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <button>Delete</button>
    </form>
    </div>
@endsection