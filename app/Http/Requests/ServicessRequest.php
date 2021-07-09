<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicessRequest extends FormRequest
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
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'title' => 'required|string|max:200',
            'text' => 'required|string',
            'is_active' => 'required',
        ];
    }
}
