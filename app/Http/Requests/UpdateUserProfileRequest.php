<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileRequest extends FormRequest
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
        $id = Auth::user()->id;
        $rules = User::$rules;
        $rules['name'] = 'required';
        $rules['email'] = 'required|email|unique:users,email,'.$id.'|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/';

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return User::$messages;
    }
}
