@extends('layouts.app')

@section('content')
<h1>Edit company</h1>

<div>
    <form method="POST" action="{{ route('companies.update', $company->id) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $company->name }}" required>
        </div>

        <div>
            <label for="city">City</label>
            <input type="text" name="city" value="{{ $company->city }}" required>
        </div>

        <div>
            <label for="logo">Logo</label>
            <input type="file" name="logo" value="{{ $company->logo }}">
        </div>

        <div>
            <label for="website">Website</label>
            <input type="text" name="website" value="{{ $company->website }}">
        </div>

        <button class="btn">Save</button>
    </form>

    <form method="POST" action="{{ route('companies.destroy', $company->id) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <button>Delete</button>
    </form>
</div>
@endsection