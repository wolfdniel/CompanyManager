@extends('layouts.app')

@section('content')
    <body>
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

        <button>Save</button>
    </form>
    </body>
@endsection