<?php

namespace App\Http\Requests;


use App\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        $company = Company::find($this->route('company'))->first();
        return Auth::user()->can('update', $company);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:employees'],
            'company_id' => ['exists:companies,id', 'numeric'],
            'phone' => []
        ];
    }
}
