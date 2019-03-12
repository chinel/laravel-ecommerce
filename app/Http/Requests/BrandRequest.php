<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'title' => 'required|min:2|unique:brands,title',
            'slug' => 'required|min:2|unique:brands,slug',
            'logo' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }


    public function messages()
    {
        return [
            'title.unique' => 'This brand title already exist',
            'slug.unique' => 'This brand slug already exist',

        ];
    }
}
