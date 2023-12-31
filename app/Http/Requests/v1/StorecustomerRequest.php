<?php

namespace App\Http\Requests\v1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorecustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> ['required'],
            'type'=>['required', Rule::in(['I','B','i','b'])],
            'email'=>['required', 'email'],
            'address'=>['required'],
            'city'=>['required'],
            'state'=>['required'],
            'postalcode'=>['required']
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'postal_code' => $this-> postalcode
        ]);
    }
}
