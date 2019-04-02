<?php

namespace App\Http\Requests;

use App\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $company = Company::find($this->route('company'))->first();
        return Auth::user()->can('update', $company);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'city' => ['required', 'min:3', 'max:255'],
            'logo' => ['max:255'],
            'website' => ['max:255']
        ];
    }
}
