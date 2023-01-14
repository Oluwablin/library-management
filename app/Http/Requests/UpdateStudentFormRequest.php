<?php

namespace App\Http\Requests;

use App\Models\Library;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateStudentFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['sometimes', 'string', 'max:50'],
            'last_name' => ['sometimes', 'string', 'max:50'],
            'email' => [Rule::unique('users')->ignore($this->id)],
            'library_id' => ['sometimes', 'numeric',
                function ($attribute, $value, $fail) {
                    if (!Library::find($value) instanceof Library) {
                        $fail('Library not found.');
                    }
                }
            ],
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
            'email.unique' => 'Oh sorry, there is an existing account with this email adddress.',
            'library_id.numeric' => 'Library ID must be ID of the library the student belongs to',
        ];
    }
}
