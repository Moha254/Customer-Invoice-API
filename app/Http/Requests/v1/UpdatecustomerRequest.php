<?php

namespace App\Http\Requests\v1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatecustomerRequest extends FormRequest
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
        $method= $this->method();

        if($method == 'PUT'){
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
    else {
        return [
            'name'=> ['sometimes','required'],
            'type'=>['sometimes','required', Rule::in(['I','B','i','b'])],
            'email'=>['sometimes','required', 'email'],
            'address'=>['sometimes','required'],
            'city'=>['sometimes','required'],
            'state'=>['sometimes','required'],
            'postalcode'=>['sometimes','required']
        ];
    }
    }
    public function prepareForValidation()
    {
        if($this->postalcode){
        $this->merge([
            'postal_code' => $this-> postalcode
        ]);
    }
    }
}
