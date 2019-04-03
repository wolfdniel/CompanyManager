<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::paginate(5);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        /** @var Company $company */
        $company = Company::create($request->only('name', 'city', 'website'));

        if($request->hasFile('logo')){
            $logo = $request->file('logo')->store('logos');
            $company->logo = $logo;
        }

        $user = Auth::user();
        $company->user()->associate($user);
        $company->save();

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
        $company->update($request->only('name', 'city', 'website'));

        if($request->hasFile('logo')){
            Storage::delete($company->logo);
            $logo = $request->file('logo')->store('logos');
            $company->logo = $logo;
        }

        $user = Auth::user();
        $company->user()->associate($user);
        $company->save();

        return redirect(route('companies.show', $company->id));
    }

    public function destroy(Company $company)
    {
        $this->authorize('update', $company);

        Storage::delete($company->logo);
        $company->delete();
        return redirect(route('companies.index'));
    }
}
