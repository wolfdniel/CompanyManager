<?php

namespace App\Http\Requests;


use App\Company;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        /*$company = Company::find($this->route('company'));
        return $company && $this->user()->can('update', $company);*/
        return true;
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
