<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(Company $company)
    {
        return view('employees.create', compact('company'));
    }

    public function store(Request $request, Company $company)
    {
        //VALIDÁLNI!!!
        $employee = Employee::create($request->only('name', 'email', 'phone'));
        $employee->company()->associate($company);
        $employee->save();

        return redirect(route('companies.show', $company->id));
    }

    public function edit(Company $company, Employee $employee)
    {
        //itt nem akarom $company-t, de különben stringet kap, Employee típus helyett
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Company $company, Employee $employee)
    {
        //VALIDÁLNI!!!
        $employee->update($request->only('name', 'email', 'phone'));
        return redirect(route('companies.show',
            [$company->id, $employee->id]));
    }

    public function destroy()
    {
        //
    }
}
