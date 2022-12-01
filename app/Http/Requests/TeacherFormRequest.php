<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherFormRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
            ],
            'phone' => [
                'required',

            ],
            'qualification' => [
                'required',
                'string',
            ],
            'password' => [
                'required',
                'string',
            ],
            'img' => [
                'nullable',
                'mimes:jpg,jpeg,png',
            ],
        ];
    }
}
