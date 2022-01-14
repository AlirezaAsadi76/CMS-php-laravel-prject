<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateThumbnailRequest extends FormRequest
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
            'name'=>'required|unique:categories'
        ];
    }
    public function messages()
    {
        return [
            'thumbnail.required'=>'Enter thumbnail url',
            'name.required'=>'Enter Name',
            'name.unique'=>'Category already exist'
        ];
    }
}
