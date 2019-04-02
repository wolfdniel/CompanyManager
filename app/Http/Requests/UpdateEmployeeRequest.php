<?php

namespace App\Http\Requests;

use App\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'email' => ['required', 'email',
                Rule::unique('employees')->ignore($this->route('employee'))],
            'company_id' => ['exists:companies,id', 'numeric'],
            'phone' => ['numeric']
        ];
    }
}
