<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ChangePasswordRequest.
 */
class ChangePasswordRequest extends FormRequest
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
     * @return array The given data was invalid.
     */
    public function rules()
    {
        return [
            'password_current'      => 'required',
            'password'              => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'password.min'  => 'Password must contains 6 characters.',
            'password.same' => 'Password and Confirm Password must be the same.',
        ];
    }
}
