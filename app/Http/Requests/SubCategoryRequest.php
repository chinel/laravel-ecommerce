<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'title' => 'required|min:2|unique:sub_categories,title',
            'slug' => 'required|min:2|unique:sub_categories,slug'
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'This Sub Category title already exist',
            'slug.unique' => 'This Sub Category slug already exist',
        ];
    }
}
