<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
           'title' => 'required|min:5|unique:products,title',
           'price_type' => 'required',
            'overview' => 'required',
            'description' => 'required|min:30',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg',
            'other_image1' => 'image|mimes:jpeg,png,jpg',
            'other_image2' => 'image|mimes:jpeg,png,jpg',
            'other_image3' => 'image|mimes:jpeg,png,jpg',
            'category' => 'required',
            'subcategory' => 'required'


        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'This product title already exist',

        ];
    }
}
