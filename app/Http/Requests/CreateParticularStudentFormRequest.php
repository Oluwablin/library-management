<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class CreateParticularStudentFormRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ];
    }

    /**
     * Mutate the request object after validation
     *
     * @return void
     */
    protected function passedValidation()
    {
        $this->merge(['password' => bcrypt($this->input('password'))]);
    }

    /**
     * Get the validated data from the request.
     *
     * @param  string|null  $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated(), ['password' => $this->input('password')]);
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
        ];
    }
}
