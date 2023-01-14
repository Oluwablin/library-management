<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ParticularRecordFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = request()->isMethod('put')? 'sometimes' : 'required';

        return [
            'title' => [$rule, 'string', 'max:250'],
            'description' => ['nullable', 'string', 'max:250'],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Please give the Record a title',
            'title.max' => 'Record title must not exceed 250 characters',
            'description.max' => 'Record description must not exceed 250 characters',
        ];
    }
}
