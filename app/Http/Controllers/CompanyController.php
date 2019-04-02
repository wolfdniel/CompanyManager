<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(2);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        /** @var Company $company */
        $company = Company::create($request->only('name', 'city', 'logo', 'website'));
        $user = Auth::user();
        $company->user()->associate($user);
        $company->save();

        $this->authorize('update', $company);
        return redirect(route('companies.index'));
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        /** @var Company $company */
        $company->update($request->only('name', 'city', 'logo', 'website'));
        $user = Auth::user();
        $company->user()->associate($user);
        $company->save();

        $this->authorize('update', $company);
        return redirect(route('companies.show', $company->id));
    }

    public function destroy(Company $company)
    {
        $company->delete();
        $this->authorize('update', $company);

        return redirect(route('companies.index'));
    }
}
