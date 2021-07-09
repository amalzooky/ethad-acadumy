<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrtififRequest extends FormRequest
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

            'pict1' => 'required_without:id|mimes:jpg,jpeg,png',
            'pict2' => 'required_without:id|mimes:jpg,jpeg,png',
            'pict3' => 'required_without:id|mimes:jpg,jpeg,png',
            'logowt' => 'required_without:id|mimes:jpg,jpeg,png',
            'logoero' => 'required_without:id|mimes:jpg,jpeg,png',
            'seg1' => 'required_without:id|mimes:jpg,jpeg,png',
            'seg2' => 'required_without:id|mimes:jpg,jpeg,png',
            'backgrond' => 'required_without:id|mimes:jpg,jpeg,png',
            'pict4' => 'required_without:id|mimes:jpg,jpeg,png',
            'pict5' => 'required_without:id|mimes:jpg,jpeg,png',
            'pict6' => 'required_without:id|mimes:jpg,jpeg,png',
            'cart_stud' => 'required_without:id|mimes:jpg,jpeg,png',
            'student_subj' => 'required|string',
            'name_certificat' => 'required|string',
            'cont_certificate' => 'required|string',
            'namestudent' => 'required|string',

        ];
    }
}
