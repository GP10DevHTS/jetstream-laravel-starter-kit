<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTestRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('add test request');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'patient_id' => 'required',
            'test_service_id' => 'required',
            'spacemen_id' => '',
            'result_id' => '',
        ];
    }

    public function messages(): array
    {
        return [
            'patient_id.required' => 'The name field is required.',
            'test_service_id.required' => 'The test service field is required.',
        ];
    }
}
