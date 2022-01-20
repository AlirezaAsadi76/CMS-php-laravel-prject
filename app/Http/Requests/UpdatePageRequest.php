<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'thumbnail'=>'required',
            'title'=>'required',
            'details'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'thumbnail.required'=>'Enter thumbnail url',
            'title.required'=>'Enter title',
            'details.required'=>'Enter details',

        ];
    }
}
