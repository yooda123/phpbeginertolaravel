<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            //
            'your_name' => 'required|string|max:20',
            'title' => 'required|string|max:50',
            'email' => 'required|email|unique:users|max:255',
            'url' => 'nullable|url',
            'gender' => 'required|regex:/[0-1]/',
            'age' => 'required|regex:/[1-6]/',
            'contact' => 'required|string|max:200',
            'caution' => 'required|accepted',
        ];
    }
}
