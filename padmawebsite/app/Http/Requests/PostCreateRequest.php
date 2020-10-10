<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            //

            'title' => 'required',
            'checkBoxArray' => 'required',


        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please fill the tile box',
            'checkBoxArray.required' => 'Please select category',
        ];
    }
}
