<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('post')){
            return [
                'name' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required|numeric',
            ];
        } else {
            return [
                'name' => 'required|string',    
                'email' => 'required|string',
                'phone' => 'required|numeric',
            ];
        }
    }
    public function messages(){
        if (request()->isMethod('post')){
            return [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'phone.required' => 'Phone is required',
            ];
    } else {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
        ];
    }
}
}
