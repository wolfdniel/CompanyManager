<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function create(Company $company)
    {
        $myCompanies = Company::where('user_id', Auth::id())->get();
        return view('employees.create', compact('company', 'myCompanies'));
    }

    public function store(Request $request, Company $company)
    {
        /** @var Company $tmp*/
        //VALIDÁLNI!!!
        $this->authorize('update', $company);

        $employee = Employee::create($request->only('name', 'email', 'phone'));
        $tmp = Company::find($request->get('company_id'));
        $employee->company()->associate($tmp);
        $employee->save();
        return redirect(route('companies.show', $company->id));
    }

    public function edit(Company $company, Employee $employee)
    {
        $myCompanies = Company::where('user_id', Auth::id())->get();
        //itt nem akarom $company-t, de különben stringet kap, Employee típus helyett
        return view('employees.edit', compact('employee','myCompanies'));
    }

    public function update(UpdateEmployeeRequest $request, Company $company,
        Employee $employee)
    {
        /** @var Company $tmp*/
        //VALIDÁLNI!!!
        $this->authorize('update', $company);

        $employee->update($request->only('name', 'email', 'phone'));
        $tmp = Company::find($request->get('company_id'));
        $employee->company()->associate($tmp);
        $employee->save();
        return redirect(route('companies.show', $company->id));
    }

    public function destroy(Company $company, Employee $employee)
    {
        $this->authorize('update', $company);

        $employee->delete();
        return redirect(route('companies.show', $company->id));
    }
}
