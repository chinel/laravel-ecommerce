<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|min:2|unique:categories,title',
            'slug' => 'required|min:2|unique:categories,slug',
            'banner' => 'required|image|mimes:jpeg,png,jpg',
            'black_icon' => 'required|image|mimes:jpeg,png,jpg',
            'white_icon' => 'required|image|mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'This category title already exist',
            'slug.unique' => 'This category slug already exist',

        ];
    }
}
