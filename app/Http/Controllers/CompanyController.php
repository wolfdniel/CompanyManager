<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = DB::table('companies')->paginate(2);
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
        $user = User::find(Auth::id());
        $company->user()->associate($user);
        $company->save();

        /*$user = Auth::find($request->get('id'));
        $company->user()->associate($user);
        $company->save();*/
        return redirect(route('companies.index'));
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }
}
