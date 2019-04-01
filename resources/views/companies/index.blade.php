@extends('layouts.app')

@section('content')
    <div class="nav-link">
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
    </div>
@endsection