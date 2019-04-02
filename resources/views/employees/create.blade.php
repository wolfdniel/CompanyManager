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
    </body>
@endsection