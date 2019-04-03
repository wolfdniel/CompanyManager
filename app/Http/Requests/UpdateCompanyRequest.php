<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        $company = $this->route('company');
        return Auth::user()->can('update', $company);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'city' => ['required', 'min:3', 'max:255'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
            'website' => ['max:255']
        ];
    }
}
