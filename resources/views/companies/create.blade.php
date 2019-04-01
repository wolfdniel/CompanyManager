@extends('layouts.app')

@section('content')
    <h1>Create company</h1>

    <div>
        <form method="POST" action="{{ route('companies.index') }}">
            {{ csrf_field() }}
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="city">City</label>
                <input type="text" name="city" value="{{ old('city') }}" required>
            </div>

            <div>
                <label for="logo">Logo</label>
                <input type="file" name="logo">
            </div>

            <div>
                <label for="website">Website</label>
                <input type="text" name="website" value="{{ old('website') }}">
            </div>

            <button class="btn">Create</button>
        </form>
    </div>
@endsection