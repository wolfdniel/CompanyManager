@extends('layouts.app')

@section('content')
    <body>
        <form method="post" action="{{ route('employees.index', $company->id) }}"> {{--kell még az id--}}
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

            <button>Save</button>
        </form>
    </body>
@endsection